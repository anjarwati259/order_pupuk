<?php 
/**
 * 
 */
//load model
class Rekening extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('rekening_model');
		//proteksi halaman
		$this->simple_login->cek_login();
	}
	public function index(){
		$rekening = $this->rekening_model->listing();

		$data = array(	'title'		=> 'Data Rekening',
						'rekening'		=> $rekening,
						'isi'		=> 'admin/rekening/list'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	//tambah data distributor
	public function tambah()
	{
		$rekening = $this->rekening_model->listing();
		//validation
		$valid = $this-> form_validation;

		$valid->set_rules('nama_bank', 'Nama Bank','required',
				array(	'required' 		=> '%s harus diisi'
						));
		$valid->set_rules('no_rekening', 'No Rekening','required',
				array(	'required' 		=> '%s harus diisi'
						));
		$valid->set_rules('nama_pemilik', 'Nama Pemilik','required',
				array(	'required' 		=> '%s harus diisi',
						));

		if($valid->run()===FALSE){
			//end validation
			$data = array(	'title'		=> 'Tambah Data Pelanggan',
							'rekening'	=> $rekening,
							'isi'		=> 'admin/rekening/list'
						);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else{
			$i 	= $this->input;
			$data = array(	'nama_bank'		=> $i->post('nama_bank'),
							'no_rekening'	=> $i->post('no_rekening'),
							'nama_pemilik'	=> $i->post('nama_pemilik')
						);
			$this->rekening_model->tambah($data);
			$this->session->set_flashdata('sukses','Data telah ditambah');
			redirect(base_url('admin/rekening'), 'refresh');
		}
	}
	//edit distributor
	public function edit($id_rekening){

		$rekening = $this->rekening_model->detail($id_rekening);
		//validation
		$valid = $this-> form_validation;

		$valid->set_rules('nama_bank', 'Nama Bank','required',
				array(	'required' 		=> '%s harus diisi'
						));
		$valid->set_rules('no_rekening', 'No Rekening','required',
				array(	'required' 		=> '%s harus diisi'
						));
		$valid->set_rules('nama_pemilik', 'Nama Pemilik','required',
				array(	'required' 		=> '%s harus diisi',
						));


		if($valid->run()===FALSE){
			//end validation

			$data = array(	'title'		=> 'Edit Pelanggan',
							'rekening'	=> $rekening,
							'isi'		=> 'admin/rekening/edit'
						);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else{
			$i = $this->input;
			$data = array(	'id_rekening'	=> $id_rekening,
							'nama_bank'		=> $i->post('nama_bank'),
							'no_rekening'	=> $i->post('no_rekening'),
							'nama_pemilik'	=> $i->post('nama_pemilik')
						);
			$this->rekening_model->edit($data);
			$this->session->set_flashdata('sukses','Data telah diedit');
			redirect(base_url('admin/rekening'), 'refresh');
		}
	}
	//delete
	public function delete($id_rekening){
		$data = array('id_rekening' => $id_rekening);
		$this->rekening_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/rekening'), 'refresh');
	}

}