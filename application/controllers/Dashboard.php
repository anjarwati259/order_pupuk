<?php 
/**
 * 
 */
class Dashboard extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_model');
		//proteksi halaman
		$this->simple_login->cek_login();
	}
	public function order(){
		
	}
}