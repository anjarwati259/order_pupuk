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
		$menunggu 	= $this->order_model->listing_admin(2);
		$order 	= $this->order_model->listing_admin(0);
		$data = array(	'title'			=> 'Data Pesanan',
						'menunggu'		=> $menunggu,
						'order'			=> $order,
						'isi'			=> 'admin/order/list'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	//list menunggu
	public function menunggu()
	{ 
		$menunggu 	= $this->order_model->listing_admin(2);
		$data = array(	'title'			=> 'Data Pesanan',
						'menunggu'		=> $menunggu,
						'isi'			=> 'admin/order/menunggu'
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
			$data = array(	'kode_transaksi'	=> $kode_transaksi,
							'no_resi'			=> $this->input->post('no_resi'),
							'status_bayar'		=> 5
						);
			$this->order_model->update_status($data);
			$this->session->set_flashdata('sukses','Status Telah Diubah');
			redirect(base_url('admin/order/listkirim'), 'refresh');
	}
	public function listkirim()
	{
		$dikirim 	= $this->order_model->listing_admin(5);
		$data = array(	'title'			=> 'Data Pesanan',
						'dikirim'		=> $dikirim,
						'isi'			=> 'admin/order/dikirim'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);	
	}
	public function selesai()
	{
		$selesai 	= $this->order_model->listing_admin(6);
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
		$user = $this->input->post("username");
		$carts =  $this->cart->contents();
		if(!empty($carts) && is_array($carts)){
			$data['kode_transaksi'] = $this->input->post('kode_transaksi');
			$data['id_pelanggan'] = $this->input->post('id_pelanggan');
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
		}
		$this->cart->destroy();
	}

}