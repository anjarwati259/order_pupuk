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
	public function order_admin(){
		$this->db->select('COUNT(*) as total');
		$this->db->from('tb_detail_order');
		$this->db->where('status_bayar', '0');
		$query = $this->db->get();
		return $query->row();
	}
	public function pelanggan($data){
		$this->db->select('COUNT(*) as total');
		$this->db->from('tb_pelanggan');
		$this->db->where('jenis_pelanggan', $data);
		$query = $this->db->get();
		return $query->row();
	}
	public function stok(){
		$this->db->select('SUM(stok) as total');
		$this->db->from('tb_produk');
		$query = $this->db->get();
		return $query->row();
	}
	public function harian($tanggal){
		$this->db->select('SUM(total_item) as total');
		$this->db->from('tb_detail_order');
		$this->db->where('tanggal_transaksi',$tanggal);
		$query = $this->db->get();
		return $query->row();
	}
	
}