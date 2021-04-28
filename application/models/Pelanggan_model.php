<?php 

/**
 * 
 */
class Pelanggan_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	//listing all user
	public function listing(){
		$this->db->select('tb_pelanggan.*,tb_komoditi.nama_komoditi');
		$this->db->from('tb_pelanggan');
		$this->db->join('tb_komoditi','tb_komoditi.id_komoditi = tb_pelanggan.id_komoditi','left');
		$this->db->where('jenis_pelanggan', 'Customer');
		$this->db->group_by('tb_pelanggan.id_pelanggan');
		$this->db->order_by('id_pelanggan','desc');
		$query = $this->db->get();
		return $query->result();
	}
	//listing all user
	public function listing_mitra(){
		$this->db->select('tb_pelanggan.*,tb_komoditi.nama_komoditi');
		$this->db->from('tb_pelanggan');
		$this->db->join('tb_komoditi','tb_komoditi.id_komoditi = tb_pelanggan.id_komoditi','left');
		$this->db->where('jenis_pelanggan', 'Mitra');
		$this->db->group_by('tb_pelanggan.id_pelanggan');
		$this->db->order_by('id_pelanggan','desc');
		$query = $this->db->get();
		return $query->result();
	}
	//listing all user
	public function listing_distributor(){
		$this->db->select('tb_pelanggan.*,tb_komoditi.nama_komoditi');
		$this->db->from('tb_pelanggan');
		$this->db->join('tb_komoditi','tb_komoditi.id_komoditi = tb_pelanggan.id_komoditi','left');
		$this->db->where('jenis_pelanggan', 'Distributor');
		$this->db->group_by('tb_pelanggan.id_pelanggan');
		$this->db->order_by('id_pelanggan','desc');
		$query = $this->db->get();
		return $query->result();
	}
	//listing all user
	public function alllisting(){
		$this->db->select('tb_pelanggan.*,tb_komoditi.nama_komoditi');
		$this->db->from('tb_pelanggan');
		$this->db->join('tb_komoditi','tb_komoditi.id_komoditi = tb_pelanggan.id_komoditi','left');
		$this->db->group_by('tb_pelanggan.id_pelanggan');
		$this->db->order_by('id_pelanggan','desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function get_last_id(){
		$this->db->order_by('id_pelanggan', 'DESC');

		$query = $this->db->get("tb_pelanggan",1,0);
		return $query->result();
	}

	public function tambah($data){
		$this->db->insert('tb_pelanggan', $data);
	}
	//detail
	public function detail($id_pelanggan){
		$this->db->select('*');
		$this->db->from('tb_pelanggan');
		$this->db->where('id_pelanggan', $id_pelanggan);
		$this->db->order_by('id_pelanggan','desc');
		$query = $this->db->get();
		return $query->row();
	}
	//edit
	public function edit($data){
		$this->db->where('id_pelanggan', $data['id_pelanggan']);
		$this->db->update('tb_pelanggan',$data);
	}
	//delete
	public function delete($data){
		$this->db->where('id_pelanggan', $data['id_pelanggan']);
		$this->db->delete('tb_pelanggan',$data);
	}
	//sudah login
	public function sudah_login($id_user, $nama_user)
	{
		$this->db->select('*');
		$this->db->from('tb_pelanggan');
		$this->db->where('id_user', $id_user);
		$this->db->where('nama_pelanggan', $nama_user);
		$this->db->order_by('id_pelanggan','desc');
		$query = $this->db->get();
		return $query->row();
	}
}