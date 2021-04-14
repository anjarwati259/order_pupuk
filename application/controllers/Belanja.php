<?php 
/**
 * 
 */
class Belanja extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		//load helper random string
		$this->load->helper('string');
		//proteksi halaman
		$this->simple_login->ceklogin();
	}
	//halaman belanja
	public function index()
	{ 
		$keranjang = $this->cart->contents();
		$data = array(	'title'		=> 'Keranjang Belanja',
						'keranjang' => $keranjang,
						'isi'		=> 'belanja/list'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}
	//tambahkan ke keranjang belanja
	public function add()
	{
		$kode_produk = $this->input->post('id');
		$produk = $this->produk_model->listing_produk($kode_produk);
		if($this->input->post('qty') > $produk->stok ){
			$this->session->set_flashdata('sukses','Belanja Anda melebihi stok');
			 redirect($this->input->post('redirect_page'),'refresh');
		}else{
		//ambil data dari form
		$id 			= $this->input->post('id');
		$qty 			= $this->input->post('qty');
		$price 			= $this->input->post('price');
		$name 			= $this->input->post('name');
		$redirect_page 	= $this->input->post('redirect_page');
		//proses memasukkan ke keranjang belanja
		$data = array(	'id'	=> $id,
						'qty'	=> $qty,
						'price'	=> $price,
						'name'	=> $name
						);
		$this->cart->insert($data);
		//redirect page
		 redirect($redirect_page,'refresh');
	}
	}
}