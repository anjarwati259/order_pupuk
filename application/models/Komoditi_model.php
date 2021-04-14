<?php 

/**
 * 
 */
class Komoditi_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	//listing all user
	public function listing(){
		$this->db->select('*');
		$this->db->from('tb_komoditi');
		$this->db->order_by('id_komoditi','desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function get_last_id(){
		$this->db->order_by('id_pelanggan', 'DESC');

		$query = $this->db->get("tb_pelanggan",1,0);
		return $query->result();
	}
}