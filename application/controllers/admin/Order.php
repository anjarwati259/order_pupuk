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
}