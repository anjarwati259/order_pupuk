<?php 
/**
 * 
 */
//load model
class Produk extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		//proteksi halaman
		$this->simple_login->cek_login();
	}
	public function index(){
		$produk = $this->produk_model->listing();
		$data = array(	'title' => 'Data Stok',
						'produk' => $produk,
						'isi' => 'admin/produk/list' );
		$this->load->view('admin/layout/wrapper',$data, FALSE);
	}
	public function tambah()
	{
		//validation
		$valid = $this-> form_validation;

		$valid->set_rules('nama_produk', 'Nama Product','required',
				array(	'required' 		=> '%s harus diisi'));

		$valid->set_rules('kode_produk', 'Kode Product','required|is_unique[tb_produk.kode_produk]',
				array(	'required' 		=> '%s harus diisi',
						'is_unique'		=> '%s sudah ada. Buat kode produk baru'));

		if($valid->run()){
			$config['upload_path']		= './assets/upload/image/thumbs';
			$config['allowed_types']	= 'gif|jpg|png|jpeg';
			$config['max_size']			= '2400';//dalam kb
			$config['max_width']		= '2024';
			$config['max_height']		= '2024';

			$this->load->library('upload',$config);

			if( ! $this->upload->do_upload('gambar')){
				
			//end validation

			$data = array(	'title'		=> 'Tambah Product',
							'error'		=> $this->upload->display_errors(),
							'isi'		=> 'admin/produk/tambah'
						);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else{
			$upload_gambar = array('upload_data' => $this->upload->data());

			//create thumbnail gambar
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= './assets/upload/image/thumbs'.$upload_gambar['upload_data']['file_name'];
			$config['new_image']		= './assets/upload/image/thumbs/';
			$config['create_thumb'] 	= TRUE;
			$config['maintain_ratio'] 	= TRUE;
			$config['width']         	= 250;
			$config['height']       	= 250;
			$config['thumb_marker']		= '';

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();
			//end
			$i = $this->input;
			$data = array(
							'kode_produk'		=> $i->post('kode_produk'),
							'nama_produk'		=> $i->post('nama_produk'),
							'harga_customer'	=> $i->post('harga_customer'),
							'harga_mitra'		=> $i->post('harga_mitra'),
							'harga_distributor'	=> $i->post('harga_distributor'),
							'stok'				=> $i->post('stok'),
							'berat'				=> $i->post('berat'),
							'gambar'			=> $upload_gambar['upload_data']['file_name'],
							'keterangan'		=> $i->post('keterangan'),
							'tanggal_update'		=> date('Y-m-d H:i:s')
						);
			$this->produk_model->tambah($data);
			$this->session->set_flashdata('sukses','Data telah ditambah');
			redirect(base_url('admin/produk'), 'refresh');
		}}
		$data = array(	'title'		=> 'Tambah Product',
						'isi'		=> 'admin/produk/tambah'
						);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	//edit data
	public function edit($kode_produk)
	{
		//ambil data produk yg akan di edit
		$produk = $this->produk_model->detail($kode_produk);

		//validation
		$valid = $this-> form_validation; 

		$valid->set_rules('nama_produk', 'Nama Product','required',
				array(	'required' 		=> '%s harus diisi'));

		if($valid->run()){
			//chek jika gambar diganti
			if(!empty($_FILES['gambar']['name'])){
			//hapus gambar
			//unlink('./assets/upload/image/'.$produk->gambar);
			unlink('./assets/upload/image/thumbs/'.$produk->gambar);

			$config['upload_path']		= './assets/upload/image/thumbs';
			$config['allowed_types']	= 'gif|jpg|png|jpeg';
			$config['max_size']			= '2400';//dalam kb
			$config['max_width']		= '2024';
			$config['max_height']		= '2024';
			//$config['thumb_marker']		= '';

			$this->load->library('upload',$config);

			if( ! $this->upload->do_upload('gambar')){
				
			//end validation

			$data = array(	'title'		=> 'Edit Produ'.$produk->nama_produk,
							'produk'	=> $produk,
							'error'		=> $this->upload->display_errors(),
							'isi'		=> 'admin/produk/edit'
						);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else{
			$upload_gambar = array('upload_data' => $this->upload->data());

			//create thumbnail gambar
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= './assets/upload/image/thumbs'.$upload_gambar['upload_data']['file_name'];
			$config['new_image']		= './assets/upload/image/thumbs/';
			$config['create_thumb'] 	= TRUE;
			$config['maintain_ratio'] 	= TRUE;
			$config['width']         	= 250;
			$config['height']       	= 250;
			$config['thumb_marker']		= '';

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();
			//end
			$i = $this->input;
			$data = array(	'kode_produk'		=> $kode_produk,
							'nama_produk'		=> $i->post('nama_produk'),
							'harga_customer'	=> $i->post('harga_customer'),
							'harga_mitra'		=> $i->post('harga_mitra'),
							'harga_distributor'	=> $i->post('harga_distributor'),
							'stok'				=> $i->post('stok'),
							'berat'				=> $i->post('berat'),
							'gambar'			=> $upload_gambar['upload_data']['file_name'],
							'keterangan'		=> $i->post('keterangan'),
							'tanggal_update'		=> date('Y-m-d H:i:s')
						);
			$this->produk_model->edit($data);
			$this->session->set_flashdata('sukses','Data telah diedit');
			redirect(base_url('admin/produk'), 'refresh');
		}}else{
			//edit produk tanpa ganti gambar
			$i = $this->input;
			$data = array(	'kode_produk'		=> $kode_produk,
							'nama_produk'		=> $i->post('nama_produk'),
							'harga_customer'	=> $i->post('harga_customer'),
							'harga_mitra'		=> $i->post('harga_mitra'),
							'harga_distributor'	=> $i->post('harga_distributor'),
							'stok'				=> $i->post('stok'),
							'berat'				=> $i->post('berat'),
							// 'gambar'			=> $upload_gambar['upload_data']['file_name'],
							'keterangan'		=> $i->post('keterangan'),
							'tanggal_update'		=> date('Y-m-d H:i:s')
						);
			$this->produk_model->edit($data);
			$this->session->set_flashdata('sukses','Data telah diedit');
			redirect(base_url('admin/produk'), 'refresh');
		}}
		$data = array(	'title'			=> 'Edit Product: '.$produk->nama_produk,
							'produk'	=> $produk,
							'isi'		=> 'admin/produk/edit'
						);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		
	}

	//delete product
	public function delete($kode_produk){
		//proses hapus gambar
		$produk = $this->produk_model->detail($kode_produk);
		//unlink('./assets/upload/image/'.$product->gambar);
		unlink('./assets/upload/image/thumbs/'.$produk->gambar);
		//end hapus gambar

		$data = array('kode_produk' => $kode_produk);
		$this->produk_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/produk'), 'refresh');
	}
}