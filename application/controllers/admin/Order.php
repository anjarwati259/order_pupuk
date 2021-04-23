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
		//load helper random string
		$this->load->helper('string');
		//proteksi halaman
		$this->simple_login->ceklogin();
	}
	//halaman belanja
	public function index()
	{ 
		$order 	= $this->order_model->listing_admin(0);
		$menunggu 	= $this->order_model->listing_admin(2);
		$sudah_bayar 	= $this->order_model->listing_admin(1);
		$data = array(	'title'			=> 'Data Pesanan',
						'order'			=> $order,
						'menunggu'		=> $menunggu,
						'sudah_bayar' 	=> $sudah_bayar,
						'isi'			=> 'admin/order/list'
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
}