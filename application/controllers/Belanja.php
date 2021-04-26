<?php 
/**
 * 
 */
class Belanja extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('pelanggan_model');
		$this->load->model('order_model');
		//load helper random string
		$this->load->helper('string');
		//proteksi halaman
		$this->simple_login->ceklogin();
	}
	//halaman belanja
	public function index()
	{ 
		$keranjang = $this->cart->contents();
		$data = array(	'title'		=> 'Keranjang Belanja',
						'keranjang' => $keranjang,
						'isi'		=> 'belanja/list'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}
	//tambahkan ke keranjang belanja
	public function add()
	{
		$kode_produk = $this->input->post('id');
		$produk = $this->produk_model->listing_produk($kode_produk);
		if($this->input->post('qty') > $produk->stok ){
			$this->session->set_flashdata('sukses','Belanja Anda melebihi stok');
			 redirect($this->input->post('redirect_page'),'refresh');
		}else{
		//ambil data dari form
		$id 			= $this->input->post('id');
		$qty 			= $this->input->post('qty');
		$price 			= $this->input->post('price');
		$name 			= $this->input->post('name');
		$redirect_page 	= $this->input->post('redirect_page');
		//proses memasukkan ke keranjang belanja
		$data = array(	'id'	=> $id,
						'qty'	=> $qty,
						'price'	=> $price,
						'name'	=> $name
						);
		$this->cart->insert($data);
		//redirect page
		 redirect($redirect_page,'refresh');
	}
	}

	//update cart
	public function update_cart($rowid)
	{
		//jika ada data rowid
		if($rowid)
		{
			$data = array(	'rowid'		=>$rowid,
							'qty'		=>$this->input->post('qty')
							);
			$this->cart->update($data);
			$this->session->set_flashdata('sukses','Data keranjang telah diupdate');
			redirect(base_url('belanja'),'refresh');
		}else{
			//jika ga ada row id
			redirect(base_url('belanja'),'refresh');
		}
	}

	//hapus semua isi keranjang belanja
	public function hapus($rowid='')
	{
		if($rowid){
			//hapus per item
			$this->cart->remove($rowid);
			$this->session->set_flashdata('sukses','Data keranjang belanja telah dihapus');
			redirect(base_url('belanja'), 'refresh');
		}else{
			//hapus all
			$this->cart->destroy();
			$this->session->set_flashdata('sukses','Data keranjang belanja telah dihapus');
			redirect(base_url('belanja'), 'refresh');
		}
		
	}
	//checkout
	public function checkout()
	{
		//cek sudah loggin atau belum, jika belum restrasi sekaligus login

		//kondisi sudah login
		if($this->session->userdata('username')){
			$id_user				= $this->session->userdata('id_user');
			$nama_user 	= $this->session->userdata('nama_user');
			$pelanggan 	= $this->pelanggan_model->sudah_login($id_user, $nama_user);

			$keranjang 	= $this->cart->contents();

			//validation 
		$valid = $this-> form_validation;

		$valid->set_rules('nama_pelanggan', 'Nama Lengkap','required',
				array(	'required' 		=> '%s harus diisi'));

		$valid->set_rules('no_hp', 'Nomor Telephon','required',
				array(	'required' 		=> '%s harus diisi'));

		$valid->set_rules('alamat', 'Alamat','required',
				array(	'required' 		=> '%s harus diisi'));

		if($valid->run()===FALSE){
			//end validation

			$data = array(	'title'			=> 'Checkout',
							'keranjang'		=> $keranjang,
							'pelanggan'		=> $pelanggan,
							'isi'			=> 'belanja/checkout'
							);
			$this->load->view('layout/wrapper', $data, FALSE);
			//masuk database
			}else{
			//masuk database
			$i = $this->input;
			$kode_transaksi = $i->post('kode_transaksi');
			$data = array(	'id_pelanggan'		=> $pelanggan->id_pelanggan,
							'id_user'			=> $id_user,
							'id_rekening'		=> $this->input->post('rekening'),
							'nama_pelanggan'	=> $i->post('nama_pelanggan'),
							'no_hp'				=> $i->post('no_hp'),
							'alamat'			=> $i->post('alamat'),
							'kode_transaksi'	=> $i->post('kode_transaksi'), 
							'tanggal_transaksi'	=> $i->post('tanggal_transaksi'),
							'total_bayar'		=> $i->post('total'),
							'total_transaksi'	=> $i->post('total_transaksi'),
							'total_item'		=> $i->post('total_item'),
							'expedisi'			=> $i->post('expedisi'),
							'ongkir'			=> $i->post('ongkir'),
							'status_bayar'		=> 0,
						);
			$this->order_model->tambah($data);
			//proses masuk ke tabel transaksi
			foreach ($keranjang as $keranjang) {
				$sub_total	= $keranjang['price'] * $keranjang['qty'];

				$data = array(	'id_pelanggan'		=> $pelanggan->id_pelanggan,
								'kode_transaksi'	=> $i->post('kode_transaksi'),
								'id_produk'			=> $keranjang['id'],
								'harga'				=> $keranjang['price'],
								'jml_beli'			=> $keranjang['qty'],
								'total_harga'		=> $sub_total,
								'tanggal_transaksi'	=> $i->post('tanggal_transaksi')
								);
				$this->order_model->tambah_order($data);
			}
			//end proses masuk ke tabel transaksi
			//hapus keranjang
			$this->cart->destroy();
			$this->session->set_flashdata('sukses','Checkout berhasil');
			redirect(base_url('order/detail/'.$kode_transaksi), 'refresh');
		}
		//end masuk database
			//end database
		}else{
			//kalau belum, maka harus registrasi
			$this->session->set_flashdata('sukses','Silahkan Login atau Registrasi Terlebih Dahulu');
			redirect(base_url('registrasi'),'refresh');
		}
	}
	//sukses checkout
	public function sukses()
	{
		$data = array(	'title'		=> 'Belanja Berhasil',
						'isi'		=> 'belanja/sukses'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}
	
}