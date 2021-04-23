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
		//proteksi halaman
		$this->simple_login->cek_login();
		$this->load->model('komoditi_model');
		$this->load->model('wilayah_model');
	}
	public function index(){
		$data = array('title' => 'Admin',
						'isi' => 'admin/dashboard/list' );
		$this->load->view('admin/layout/wrapper',$data, FALSE);
	}
	public function setting(){
		$valid = $this-> form_validation;
		$valid->set_rules('nama_toko', 'Nama Toko','required',
				array(	'required' 		=> '%s harus diisi',
						));

		if($valid->run()===FALSE){
			$data = array('title' => 'Admin',
						'setting' =>$this->wilayah_model->data_setting(),
						'isi' => 'admin/dashboard/setting' );
			$this->load->view('admin/layout/wrapper',$data, FALSE);
		}else{
			$i 	= $this->input;
			$data = array(	'id'		=> 1,
							'lokasi'	=> $i->post('kota'),
							'nama_toko'	=> $i->post('nama_toko'),
							'alamat_toko'=> $i->post('alamat_toko'),
							'no_telp'	=> $i->post('no_telp')
						);
			$this->wilayah_model->edit($data);
			$this->session->set_flashdata('sukses','Lokasi telah diubah');
			redirect(base_url('admin/dashboard/setting'), 'refresh');
		}
		
	}
}