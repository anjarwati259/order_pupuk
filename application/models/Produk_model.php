<?php 

/**
 * 
 */
class Produk_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	//listing all user
	public function listing(){
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->order_by('kode_produk','desc');
		$query = $this->db->get();
		return $query->result();
	}
	//tambah
	public function tambah($data)
	{
		$this->db->insert('tb_produk', $data);
	}
	//detail
	public function detail($kode_produk){
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->where('kode_produk', $kode_produk);
		$this->db->order_by('kode_produk','desc');
		$query = $this->db->get();
		return $query->row();
	}
	//edit
	public function edit($data){
		$this->db->where('kode_produk', $data['kode_produk']);
		$this->db->update('tb_produk',$data);
	}
	//delete
	public function delete($data){
		$this->db->where('kode_produk', $data['kode_produk']);
		$this->db->delete('tb_produk',$data);
	}
	//listing all home
	public function home(){
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->order_by('kode_produk','desc');
		$this->db->limit(6);
		$query = $this->db->get();
		return $query->result();
	}
	public function listing_produk($kode_produk){
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->where('kode_produk', $kode_produk);
		$this->db->order_by('kode_produk','desc');
		$query = $this->db->get();
		return $query->row();
	}
}