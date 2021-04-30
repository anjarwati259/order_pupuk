<?php 
/**
 * 
 */
class Order extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('order_model');
		$this->load->model('pembayaran_model');
		$this->load->model('pelanggan_model');
		$this->load->model('produk_model');
		//load helper random string
		$this->load->helper('string');
		//proteksi halaman
		$this->simple_login->cek_login();
	}
	//halaman list order
	public function index()
	{ 
		$order 	= $this->order_model->listing_admin(0);
		$data = array(	'title'			=> 'Data Pesanan',
						'order'			=> $order,
						'konfirmasi'	=> $order,
						'isi'			=> 'admin/order/list'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	//list sudah bayar
	public function sudah_bayar()
	{ 
		$order 	= $this->order_model->Alllisting();
		$sudah_bayar 	= $this->order_model->listing_admin(1);
		$data = array(	'title'			=> 'Data Pesanan',
						'sudah_bayar'	=> $sudah_bayar,
						'order'			=> $order,
						'isi'			=> 'admin/order/dikemas'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//detail 
	public function detail($kode_transaksi)
	{
		//ambil data login id_distributor dari session
		$detail_order 	= $this->order_model->kode_transaksi($kode_transaksi);
		$transaksi 		= $this->order_model->kode_order($kode_transaksi);
		$bayar 			= $this->pembayaran_model->detail($kode_transaksi);

		$data = array(	'title'				=> 'Order #' . $kode_transaksi,
						'detail_order'		=> $detail_order,
						'bayar'				=> $bayar,
						'transaksi'			=> $transaksi,
						'isi'				=> 'admin/order/detail_order'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	//tambah no resi 
	public function dikirim($kode_transaksi)
	{
		$valid = $this-> form_validation;

		$valid->set_rules('no_resi', 'No Resi','required',
				array(	'required' 		=> '%s harus diisi'
						));
		if($valid->run()===FALSE){
			$this->session->set_flashdata('sukses','No resi belum diisi');
			redirect(base_url('admin/order/sudah_bayar'), 'refresh');
		}else{
			
			$data = array(	'kode_transaksi'	=> $kode_transaksi,
							'no_resi'			=> $this->input->post('no_resi'),
							'status_bayar'		=> 2
						);
			$this->order_model->update_status($data);
			$this->session->set_flashdata('sukses','Status Telah Diubah');
			redirect(base_url('admin/order/listkirim'), 'refresh');
		}
	}
	public function diterima($kode_transaksi)
	{
			$data = array(	'kode_transaksi'	=> $kode_transaksi,
							'status_bayar'		=> 3
						);
			$this->order_model->update_status($data);
			$this->session->set_flashdata('sukses','Status Telah Diubah');
			redirect(base_url('admin/order/selesai'), 'refresh');
	}
	public function listkirim()
	{
		$dikirim 	= $this->order_model->listing_admin(2);
		$data = array(	'title'			=> 'Data Pesanan',
						'dikirim'		=> $dikirim,
						'isi'			=> 'admin/order/dikirim'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);	
	}
	public function selesai()
	{
		$selesai 	= $this->order_model->listing_admin(3);
		$data = array(	'title'			=> 'Data Pesanan',
						'selesai'		=> $selesai,
						'isi'			=> 'admin/order/selesai'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);	
	}
	public function tambah_order()
	{
		// destry cart
		$this->cart->destroy();

		$kode_transaksi = date('dmY').strtoupper(random_string('alnum',8));
		$pelanggan 		= $this->pelanggan_model->alllisting();
		$produk 		= $this->produk_model->listing();
		
		$data = array(	'title'				=> 'Tambah Order',
						'kode_transaksi'	=> $kode_transaksi,
						'pelanggan'			=> $pelanggan,
						'produk'			=> $produk,
						'isi'				=> 'admin/order/tambah_order'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	public function check_product($kode_produk){
		$produk = $this->produk_model->get_by_produk($kode_produk);
		echo json_encode($produk);
	} 
	public function add_item(){
		$id_produk = $this->input->post('id_produk');
		$quantity = $this->input->post('quantity');
		$sale_price = $this->input->post('sale_price');

		$get_product_detail =  $this->produk_model->detail_by_id($id_produk);
		if($get_product_detail){
			$data = array(
				'id'      => $id_produk,
				'qty'     => $quantity,
				'price'   => $sale_price,
				'name'    => $get_product_detail[0]['nama_produk']
			);
			$this->cart->insert($data);
			echo json_encode(array('status' => 'ok',
							'data' => $this->cart->contents() ,
							'total_item' => $this->cart->total_items(),
							'total_price' => $this->cart->total()
						)
				);
		}else{
			echo json_encode(array('status' => 'error'));
		}

	}
	public function delete_item($rowid){
		if($this->cart->remove($rowid)) {
			echo number_format($this->cart->total());
		}else{
			echo "false";
		}
	}

	public function add_process(){
		$this->form_validation->set_rules('kode_transaksi', 'kode_transaksi', 'required');

		$carts =  $this->cart->contents();
		if($this->_check_qty($carts)){
			echo json_encode(array('status' => 'limit'));
			exit;
		}

		$user = $this->session->userdata('id_user');
		// $carts =  $this->cart->contents();

		//grand total
		$subtotal = $this->cart->total();
		$ongkir = $this->input->post('ongkir');
		$total_bayar = $subtotal + $ongkir;
		if(!empty($carts) && is_array($carts)){
			$data['kode_transaksi'] = $this->input->post('kode_transaksi');
			$data['id_pelanggan'] = $this->input->post('id_pelanggan');
			$data['id_user'] = $user;
			$data['nama_pelanggan'] = $this->input->post('nama_pelanggan');
			$data['alamat'] = $this->input->post('alamat');
			$data['provinsi'] = $this->input->post('provinsi');
			$data['kabupaten'] = $this->input->post('kabupaten');
			$data['kecamatan'] = $this->input->post('kecamatan');
			$data['expedisi'] = $this->input->post('ekspedisi');
			$data['ongkir'] = $ongkir;
			$data['no_hp'] = $this->input->post('no_hp');
			$data['total_bayar'] = $total_bayar;
			$data['total_transaksi'] = $this->cart->total();
			$data['status_bayar'] = '0';
			$data['tanggal_transaksi'] = $this->input->post('tanggal_transaksi');
			$data['total_item'] = $this->cart->total_items();
			$data['metode_pembayaran'] = $this->input->post('metode_pembayaran');

			$this->order_model->tambah($data);
			if($data['kode_transaksi']){
				$this->_insert_purchase_data($data['kode_transaksi'],$carts);
			}
			echo json_encode(array('status' => 'ok'));
		}else{
			echo json_encode(array('status' => 'error'));
		}
	}
	private function _insert_purchase_data($kode_transaksi,$carts){
		foreach($carts as $key => $cart){
			$purchase_data = array(
				'kode_transaksi' => $kode_transaksi,
				'id_produk' => $cart['id'],
				//'id_pelanggan' => $cart['category_id'],
				'jml_beli' => $cart['qty'],
				'harga' => $cart['price'],
				'total_harga' => $cart['subtotal']
			);
			$this->order_model->tambah_order($purchase_data);

			$this->produk_model->update_qty_min($cart['id'],array('stok' => $cart['qty']));
		}
		$this->cart->destroy();
	}
	private function _check_qty($carts){
		$status = false;
		foreach($carts as $key => $cart){
			$product = $this->produk_model->get_by_id($cart['id']);
			if($cart['qty'] >= $product[0]['stok']){
				$status = true;
				break;
			}
		}
		return $status;
	}

	public function konfirmasi($kode_transaksi){

		$data = array(	'kode_transaksi'	=> $kode_transaksi,
						'id_rekening'		=> $this->input->post('id_rekening'),
						'status_bayar'		=> 1
						);
		$this->order_model->update_status($data);

		//insert pembayaran
		$data = array(	'kode_transaksi'	=> $kode_transaksi,
						'nama_bank'			=> $this->input->post('nama_bank'),
						'id_rekening'		=> $this->input->post('id_rekening'),
						'tanggal_bayar'		=> $this->input->post('tanggal_bayar'),
						'jumlah_bayar'		=> $this->input->post('total_bayar')
						);
		$this->pembayaran_model->bayar($data);
		$this->session->set_flashdata('sukses','Status Telah Diubah');
		redirect(base_url('admin/order/sudah_bayar'), 'refresh');
	}

}