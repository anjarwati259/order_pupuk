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
		$this->load->model('dashboard_model');
	}
	public function index(){
		$produk 	= $this->produk_model->home();

		$data = array(	'title'		=> 'Pupuk Kilat - PT AGI',
						'produk'	=> $produk,
						'isi'		=> 'home/list'
						); 
		$this->load->view('layout/wrapper', $data, FALSE);
	}
	public function dashboard(){
		$order = $this->dashboard_model->order();
		$proses = $this->dashboard_model->order_proses();
		$data = array(	'title'		=> 'Dashboard Pelanggan',
						'order'		=> $order,
						'proses'	=> $proses,
						'isi'		=> 'pelanggan/dashboard/list'
						);
		$this->load->view('pelanggan/layout/wrapper', $data, FALSE);
	}
}