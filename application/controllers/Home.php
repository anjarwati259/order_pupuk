<?php 
/**
 * 
 */
//load model
class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
	}
	public function index(){
		$produk 	= $this->produk_model->home();

		$data = array(	'title'		=> 'Pupuk Kilat - PT AGI',
						'produk'	=> $produk,
						'isi'		=> 'home/list'
						); 
		$this->load->view('layout/wrapper', $data, FALSE);
	}
}