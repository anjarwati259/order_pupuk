<?php 
/**
 * 
 */
class Pdf extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('pelanggan_model');
		$this->load->model('order_model');
		$this->load->model('pembayaran_model');
		//load helper random string
		$this->load->helper('string');
		//proteksi halaman
		$this->simple_login->cek_login();
	}

	public function pdf($kode_transaksi)
	{
		$this->load->library('mypdf');
		$detail_order 	= $this->order_model->kode_transaksi($kode_transaksi);
		$transaksi 		= $this->order_model->kode_order($kode_transaksi);
		$bayar 			= $this->pembayaran_model->detail($kode_transaksi);
		$data = array(
						'detail_order'		=> $detail_order,
						'transaksi'			=> $transaksi,
						'bayar'				=> $bayar
					);
		$this->mypdf->generate('pdf/bukti',$data);
	}
}