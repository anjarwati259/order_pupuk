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
	//listing all user
	public function promo(){
		$this->db->select('*');
		$this->db->from('tb_promo');
		$this->db->order_by('id_promo','asc');
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
	public function get_by_produk($kode_produk){
		$response = false;
		$query = $this->db->get_where('tb_produk',array('kode_produk' => $kode_produk));
		if($query && $query->num_rows()){
			$response = $query->result_array();
		}
		return $response;
	}
	public function detail_by_id($kode_produk){
		$response = false;
		$this->db->where('tb_produk.kode_produk',$kode_produk);
		$query = $this->db->get('tb_produk');
		if($query && $query->num_rows()){
			$response = $query->result_array();
		}
		return $response;
	}
	public function update_qty_min($id,$data){
		$this->db->set('stok', 'stok-'.$data['stok'], FALSE);
		$this->db->where('kode_produk', $id);
		$this->db->update('tb_produk');
	}
	public function get_by_id($id){
		$response = false;
		$query = $this->db->get_where('tb_produk',array('kode_produk' => $id));
		if($query && $query->num_rows()){
			$response = $query->result_array();
		}
		return $response;
	}
	//listing all home
	public function get_stok_id($kode_produk){
		$this->db->select('stok');
		$this->db->from('tb_produk');
		$this->db->where_in('kode_produk',$kode_produk);
		$query = $this->db->get();
		return $query->row();
	}
}