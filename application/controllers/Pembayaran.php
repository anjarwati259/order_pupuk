<?php 
/**
 * 
 */
class Pembayaran extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('order_model');
		$this->load->model('rekening_model');
		$this->load->model('pembayaran_model');
		//load helper random string
		$this->load->helper('string');
		//proteksi halaman
		$this->simple_login->ceklogin();
	}
	//halaman belanja
	public function index()
	{ 
		$data = array(	'title'		=> 'Pembayaran',
						'isi'		=> 'pelanggan/bayar/list'
						);
		$this->load->view('pelanggan/layout/wrapper', $data, FALSE);
	}
	//halaman belanja
	public function bayar($kode_transaksi)
	{ 
		$detail_order 	= $this->order_model->kode_transaksi($kode_transaksi);
		$rekening 	= $this->rekening_model->listing();

		//validation
		$valid = $this-> form_validation;

		$valid->set_rules('nama_bank', 'Nama Bank','required',
				array(	'required' 		=> '%s harus diisi'
						));
		$valid->set_rules('nama_pemilik', 'Nama Pemilik','required',
				array(	'required' 		=> '%s harus diisi'
						));
		$valid->set_rules('no_rekening', 'No. Rekening','required',
				array(	'required' 		=> '%s harus diisi',
						));
		$valid->set_rules('total_bayar', 'Jumlah Bayar','required',
				array(	'required' 		=> '%s harus diisi',
						));

		if($valid->run()){
			$config['upload_path']		= './assets/upload/image/';
			$config['allowed_types']	= 'gif|jpg|png|jpeg';
			$config['max_size']			= '2400';//dalam kb
			$config['max_width']		= '2024';
			$config['max_height']		= '2024';
			//$config['thumb_marker']		= '';

			$this->load->library('upload',$config);

			if( ! $this->upload->do_upload('bukti_bayar')){
				
			//end validation
				$data = array(	'title'				=> 'Konfirmasi Pembayaran',
								'detail_order' 		=> $detail_order,
								'rekening'			=> $rekening,
								'error'				=> $this->upload->display_errors(),
								'isi'				=> 'pelanggan/bayar/pembayaran'
								);
				$this->load->view('pelanggan/layout/wrapper', $data, FALSE);
		}else{
			$upload_gambar = array('upload_data' => $this->upload->data());

			//create thumbnail gambar
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
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
			$data = array(	'kode_transaksi'		=> $detail_order->kode_transaksi,
							'jumlah_bayar'			=> $i->post('total_bayar'),
							'atas_nama'	=> $i->post('nama_pemilik'),
							'no_rekening'	=> $i->post('no_rekening'),
							'bukti_bayar'			=> $upload_gambar['upload_data']['file_name'],
							'id_rekening'			=> $i->post('id_rekening'),
							'tanggal_bayar'			=> $i->post('tanggal_bayar'),
							'nama_bank'				=> $i->post('nama_bank')
						);
			$this->pembayaran_model->bayar($data);
			//update status bayar
			$data = array(	'kode_transaksi'	=>$detail_order->kode_transaksi,
							'status_bayar'		=>2
							);
			$this->order_model->edit($data);
			$this->session->set_flashdata('sukses','Konfirmasi Pembayaran Berhasil');
			redirect(base_url('order/detail/'.$kode_transaksi), 'refresh');
		}}
		$data = array(	'title'				=> 'Konfirmasi Pembayaran',
						'detail_order' 		=> $detail_order,
						'rekening'			=> $rekening,
						'isi'				=> 'pelanggan/bayar/pembayaran'
					);
		$this->load->view('pelanggan/layout/wrapper', $data, FALSE);
	}
	public function konfirmasi($kode_transaksi){
		$data = array(	'kode_transaksi'	=> $kode_transaksi,
						'status_bayar'		=> $this->input->post('konfirmasi')
						);
			$this->order_model->update_status($data);
			$this->session->set_flashdata('sukses','Status Pembayaran telah Diubah');
			redirect(base_url('admin/order/detail/'.$kode_transaksi), 'refresh');
	}
}