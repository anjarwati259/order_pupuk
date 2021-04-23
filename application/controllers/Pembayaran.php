<?php 
/**
 * 
 */
class Pembayaran extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('order_model');
		//load helper random string
		$this->load->helper('string');
		//proteksi halaman
		$this->simple_login->ceklogin();
	}
	//halaman belanja
	public function index()
	{ 
		$data = array(	'title'		=> 'Pembayaran',
						'isi'		=> 'pelanggan/bayar/list'
						);
		$this->load->view('pelanggan/layout/wrapper', $data, FALSE);
	}
	//halaman belanja
	public function bayar($kode_transaksi)
	{ 
		//validation
		$valid = $this-> form_validation;

		$valid->set_rules('nama_pelanggan', 'Nama Pelanggan','required',
				array(	'required' 		=> '%s harus diisi'
						));
		$valid->set_rules('alamat', 'Alamat','required',
				array(	'required' 		=> '%s harus diisi'
						));
		$valid->set_rules('no_hp', 'No. Telp','required',
				array(	'required' 		=> '%s harus diisi',
						));
		$valid->set_rules('pembelian_awal', 'Pembelian Awal','required',
				array(	'required' 		=> '%s harus diisi',
						));

		if($valid->run()===FALSE){
			$detail_order 	= $this->order_model->kode_transaksi($kode_transaksi);
			$data = array(	'title'		=> 'Konfirmasi Pembayaran',
							'detail_order' => $detail_order,
							'isi'		=> 'pelanggan/bayar/pembayaran'
							);
			$this->load->view('pelanggan/layout/wrapper', $data, FALSE);
		}
		
	}
}