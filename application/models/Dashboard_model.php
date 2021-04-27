<?php 

/**
 * 
 */
class Dashboard_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function order(){
		$id_user = $this->session->userdata('id_user');
		$this->db->select('COUNT(*) as total');
		$this->db->from('tb_detail_order');
		$this->db->where('id_user', $id_user);
		$query = $this->db->get();
		return $query->row();
	}
	public function order_proses(){
		$id_user = $this->session->userdata('id_user');
		$this->db->select('COUNT(*) as total');
		$this->db->from('tb_detail_order');
		$this->db->where('id_user', $id_user);
		$this->db->where('status_bayar', '5');
		$query = $this->db->get();
		return $query->row();
	}
}