<?php 
/**
 * 
 */
//load model
class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index(){
		$data = array('title' => 'Dashboard Admin',
						'isi' => 'admin/dashboard/list' );
		$this->load->view('admin/layout/wrapper',$data, FALSE);
		// $this->load->view('admin/layout/content');
	}
}