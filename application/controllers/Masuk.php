<?php 
/**
 * 
 */
class Masuk extends CI_Controller
{
	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}
	//login distributor
	public function index()
	{
		//validasi
		$this->form_validation->set_rules('username','Username','required',
				array(	'required'	=> '%s harus diisi'));
		$this->form_validation->set_rules('password','Password','required',
				array(	'required'	=> '%s harus diisi'));

		if($this->form_validation->run())
		{
			$username 	= $this->input->post('username');
			$password 	= $this->input->post('password');
			//proses ke simple login
			$this->simple_login->login_pelanggan($username,$password);
		}
		//end validasi

		$this->load->view('masuk/login');
	}
	public function logout()
	{
		//ambil fungsi logout di simple_distributor yang sudah diset di autoload
		$this->simple_login->logout_pelanggan();
	}
}