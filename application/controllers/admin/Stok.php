<?php 
/**
 * 
 */
//load model
class Stok extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		//proteksi halaman
		$this->simple_login->cek_login();
	}
	public function index(){
		$data = array(	'title' => 'Data Stok',
						'isi' => 'admin/produk/stok' );
		$this->load->view('admin/layout/wrapper',$data, FALSE);
	}
}