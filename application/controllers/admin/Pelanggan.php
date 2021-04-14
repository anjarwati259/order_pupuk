<?php 
/**
 * 
 */
//load model
class Pelanggan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('pelanggan_model');
		$this->load->model('komoditi_model');
		$this->load->model('wilayah_model');
		//proteksi halaman
		$this->simple_login->cek_login();
	}
	public function index(){
		$id = $this->pelanggan_model->get_last_id();
		$provinsi = $this->wilayah_model->listing();

		if($id){
			$id = $id[0]->id_pelanggan;
			$id_pelanggan = generate_code('CUS',$id);
		}else{
			$id_pelanggan = 'CUS001';
		}

		$customer = $this->pelanggan_model->listing();
		$komoditi = $this->komoditi_model->listing();
		$data = array(	'title' => 'Data Pelanggan',
						'id'	=> $id_pelanggan,
						'cus'	=> $customer, 
						'prov'	=> $provinsi,
						'kom'	=> $komoditi,
						'provinsi'	=> $provinsi,
						'komoditi' =>$komoditi,
						'customer' => $customer,
						'isi' => 'admin/customer/list' );
		$this->load->view('admin/layout/wrapper',$data, FALSE);
	}

	//list mitra
	public function mitra(){
		$id = $this->pelanggan_model->get_last_id();
		$provinsi = $this->wilayah_model->listing();

		if($id){
			$id = $id[0]->id_pelanggan;
			$id_pelanggan = generate_code('DIS',$id);
		}else{
			$id_pelanggan = 'DIS001';
		}

		$mitra = $this->pelanggan_model->listing_mitra();
		$komoditi = $this->komoditi_model->listing();
		$data = array(	'title' => 'Data Pelanggan',
						'id'	=> $id_pelanggan,
						'provinsi'	=> $provinsi,
						'komoditi' =>$komoditi,
						'mitra' => $mitra,
						'isi' => 'admin/mitra/list' );
		$this->load->view('admin/layout/wrapper',$data, FALSE);
	}

	//tambah data
	public function add_customer()
	{
		//get provinsi
		$provinsi = $this->wilayah_model->listing();
		//validation
		$valid = $this-> form_validation;

		// $valid->set_rules('id_pelanggan', 'ID','required',
		// 		array(	'required' 		=> '%s harus diisi'
		// 				));
		$valid->set_rules('nama_pelanggan', 'Nama Pelanggan','required',
				array(	'required' 		=> '%s harus diisi'
						));
		$valid->set_rules('alamat', 'Alamat','required',
				array(	'required' 		=> '%s harus diisi'
						));
		$valid->set_rules('no_hp', 'No. Telp','required',
				array(	'required' 		=> '%s harus diisi',
						));
		$valid->set_rules('pembelian_awal', 'Pembelian Awal','required',
				array(	'required' 		=> '%s harus diisi',
						));

		if($valid->run()===FALSE){
			//end validation
			$customer = $this->pelanggan_model->listing();
			$komoditi = $this->komoditi_model->listing();
			$id = $this->pelanggan_model->get_last_id();

			if($id){
				$id = $id[0]->id_pelanggan;
				$id_pelanggan = generate_code('CUS',$id);
			}else{
				$id_pelanggan = 'CUS001';
			}
			
			$data = array(	'title'		=> 'Tambah Data Pelanggan',
							'customer'	=> $customer,
							'id'		=> $id,
							'komoditi'	=> $komoditi,
							'provinsi'	=> $provinsi,
							'isi'		=> 'admin/customer/list'
						);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else{
			$i 	= $this->input;
			$data = array(	'id_pelanggan'		=> $i->post('id_pelanggan'),
							'nama_pelanggan'	=> $i->post('nama_pelanggan'),
							'alamat'			=> $i->post('alamat'),
							'no_hp'				=> $i->post('no_hp'),
							'id_komoditi'		=> $i->post('id_komoditi'),
							'pembelian_awal'	=> $i->post('pembelian_awal'),
							'tanggal_daftar'	=> $i->post('tanggal_daftar'),
							'provinsi'			=> $i->post('prov'),
							'kabupaten'			=> $i->post('kab'),
							'kecamatan'			=> $i->post('kec'),
							'jenis_pelanggan'	=>'Customer'
						);
			$this->pelanggan_model->tambah($data);
			$this->session->set_flashdata('sukses','Data telah ditambah');
			redirect(base_url('admin/pelanggan'), 'refresh');
		}
	}
	//tambah data
	public function add_customer()
	{
		//get provinsi
		$provinsi = $this->wilayah_model->listing();
		//validation
		$valid = $this-> form_validation;

		// $valid->set_rules('id_pelanggan', 'ID','required',
		// 		array(	'required' 		=> '%s harus diisi'
		// 				));
		$valid->set_rules('nama_pelanggan', 'Nama Pelanggan','required',
				array(	'required' 		=> '%s harus diisi'
						));
		$valid->set_rules('alamat', 'Alamat','required',
				array(	'required' 		=> '%s harus diisi'
						));
		$valid->set_rules('no_hp', 'No. Telp','required',
				array(	'required' 		=> '%s harus diisi',
						));
		$valid->set_rules('pembelian_awal', 'Pembelian Awal','required',
				array(	'required' 		=> '%s harus diisi',
						));

		if($valid->run()===FALSE){
			//end validation
			$customer = $this->pelanggan_model->listing();
			$komoditi = $this->komoditi_model->listing();
			$id = $this->pelanggan_model->get_last_id();

			if($id){
				$id = $id[0]->id_pelanggan;
				$id_pelanggan = generate_code('CUS',$id);
			}else{
				$id_pelanggan = 'CUS001';
			}
			
			$data = array(	'title'		=> 'Tambah Data Pelanggan',
							'customer'	=> $customer,
							'id'		=> $id,
							'komoditi'	=> $komoditi,
							'provinsi'	=> $provinsi,
							'isi'		=> 'admin/customer/list'
						);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else{
			$i 	= $this->input;
			$data = array(	'id_pelanggan'		=> $i->post('id_pelanggan'),
							'nama_pelanggan'	=> $i->post('nama_pelanggan'),
							'alamat'			=> $i->post('alamat'),
							'no_hp'				=> $i->post('no_hp'),
							'id_komoditi'		=> $i->post('id_komoditi'),
							'pembelian_awal'	=> $i->post('pembelian_awal'),
							'tanggal_daftar'	=> $i->post('tanggal_daftar'),
							'provinsi'			=> $i->post('prov'),
							'kabupaten'			=> $i->post('kab'),
							'kecamatan'			=> $i->post('kec'),
							'jenis_pelanggan'	=>'Customer'
						);
			$this->pelanggan_model->tambah($data);
			$this->session->set_flashdata('sukses','Data telah ditambah');
			redirect(base_url('admin/pelanggan'), 'refresh');
		}
	}
	public function edit_customer($id_pelanggan){
		$customer = $this->pelanggan_model->detail($id_pelanggan);
		$komoditi = $this->komoditi_model->listing();
		//get provinsi
		$provinsi = $this->wilayah_model->listing();
		//validation
		$valid = $this-> form_validation;

		$valid->set_rules('nama_pelanggan', 'Nama Pelanggan','required',
				array(	'required' 		=> '%s harus diisi'
						));
		$valid->set_rules('alamat', 'Alamat','required',
				array(	'required' 		=> '%s harus diisi'
						));
		$valid->set_rules('no_hp', 'No. Telp','required',
				array(	'required' 		=> '%s harus diisi',
						));
		$valid->set_rules('pembelian_awal', 'Pembelian Awal','required',
				array(	'required' 		=> '%s harus diisi',
						));


		if($valid->run()===FALSE){
			//end validation

			$data = array(	'title'		=> 'Edit Pelanggan',
							'customer'	=> $customer,
							'komoditi'	=> $komoditi,
							'provinsi'	=> $provinsi,
							'isi'		=> 'admin/customer/edit'
						);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else{
			$i = $this->input;
			$prov = $i->post('prov');
			$kab = $i->post('kab');
			$kec = $i->post('kec');
			if((!empty($prov)) and (!empty($kab)) and (!empty($kec))){
				$data = array(	'id_pelanggan'		=> $id_pelanggan,
								'nama_pelanggan'	=> $i->post('nama_pelanggan'),
								'alamat'			=> $i->post('alamat'),
								'no_hp'				=> $i->post('no_hp'),
								'id_komoditi'		=> $i->post('id_komoditi'),
								'pembelian_awal'	=> $i->post('pembelian_awal'),
								'provinsi'			=> $i->post('prov'),
								'kabupaten'			=> $i->post('kab'),
								'kecamatan'			=> $i->post('kec')
							);
			}else{
				$data = array(	'id_pelanggan'		=> $id_pelanggan,
								'nama_pelanggan'	=> $i->post('nama_pelanggan'),
								'alamat'			=> $i->post('alamat'),
								'no_hp'				=> $i->post('no_hp'),
								'id_komoditi'		=> $i->post('id_komoditi'),
								'pembelian_awal'	=> $i->post('pembelian_awal')
							);
			}
			$this->pelanggan_model->edit($data);
			$this->session->set_flashdata('sukses','Data telah diedit');
			redirect(base_url('admin/pelanggan'), 'refresh');
		}
	}
	//delete customer
	public function delete($id_pelanggan){
		$data = array('id_pelanggan' => $id_pelanggan);
		$this->pelanggan_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/pelanggan'), 'refresh');
	}
}