<?php 
/**
 * 
 */
//load model
class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		//proteksi halaman
		$this->simple_login->cek_login();
	}
	public function index(){
		$user = $this->user_model->listing();

		$data = array(	'title'		=> 'Data Pengguna',
						'user'		=> $user,
						'isi'		=> 'admin/user/list'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
}