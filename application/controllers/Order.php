<?php 
/**
 * 
 */
class Order extends CI_Controller
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
		if($this->session->userdata('hak_akses')=='Customer'){
			$id_user	= $this->session->userdata('id_user');
			$order 			= $this->order_model->listing($id_user);
			$data = array(	'title'		=> 'Order Saya',
							'order'		=> $order,
						'isi'		=> 'pelanggan/customer/order'
						);
		$this->load->view('pelanggan/layout/wrapper', $data, FALSE);
		}
	}
	//detail 
	public function detail($kode_transaksi)
	{
		//ambil data login id_distributor dari session
		$id_user 		= $this->session->userdata('id_user');
		$detail_order 	= $this->order_model->kode_transaksi($kode_transaksi);
		$transaksi 		= $this->order_model->kode_order($kode_transaksi);
		$bayar 			= $this->order_model->kode_bayar($kode_transaksi);

		//pastikan bahwa distributor hanya mengakses data transaksinya
		if($detail_order->id_user != $id_user){
			$this->session->set_flashdata('warning', 'Anda mencoba mengakses data transaksi orang lain');
			redirect(base_url('masuk'));
		}
		$data = array(	'title'				=> 'Order #' . $kode_transaksi,
						'detail_order'		=> $detail_order,
						'bayar'				=> $bayar,
						'transaksi'			=> $transaksi,
						'isi'				=> 'pelanggan/customer/detail_order'
					);
		$this->load->view('pelanggan/layout/wrapper', $data, FALSE);
	} 
}