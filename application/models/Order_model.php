<?php 

/**
 * 
 */
class Order_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	//list order
	public function listing($id_user){
		$this->db->select('*');
		$this->db->from('tb_detail_order');
		$this->db->where('id_user', $id_user);
		$this->db->order_by('kode_transaksi','desc');
		$query = $this->db->get();
		return $query->result();
	}
	//list all order
	public function Alllisting(){
		$this->db->select('*');
		$this->db->from('tb_detail_order');
		$this->db->order_by('kode_transaksi','desc');
		$query = $this->db->get();
		return $query->result();
	}
	//tambah
	public function tambah($data)
	{
		$this->db->insert('tb_detail_order', $data);
	}
	//tambah
	public function tambah_order($data)
	{
		$this->db->insert('tb_order', $data);
	}

	//detail
	public function kode_transaksi($kode_transaksi){
		$this->db->select('*');
		$this->db->from('tb_detail_order');
		$this->db->where('kode_transaksi', $kode_transaksi);
		$this->db->order_by('kode_transaksi','desc');
		$query = $this->db->get();
		return $query->row();
	}
	//listing all transaksi berdasarkan header
	public function kode_order($kode_transaksi){
		$this->db->select('tb_order.*, 
						tb_produk.nama_produk,
						tb_produk.gambar');
		$this->db->from('tb_order');
		//join
		$this->db->join('tb_produk', 'tb_produk.kode_produk = tb_order.id_produk', 'left');
		//end join
		$this->db->where('kode_transaksi', $kode_transaksi);
		// $this->db->group_by('tb_order.kode_transaksi');
		$this->db->order_by('id_order','asc');
		$query = $this->db->get();
		return $query->result();
	}
	//edit
	public function edit($data){
		$this->db->where('kode_transaksi', $data['kode_transaksi']);
		$this->db->update('tb_detail_order',$data);
	}
	//listing order admin
	public function listing_admin($data){
		$this->db->select('tb_detail_order.*,
							tb_pelanggan.nama_pelanggan');
		$this->db->from('tb_detail_order');
		$this->db->where('status_bayar', $data);
		$this->db->join('tb_pelanggan','tb_pelanggan.id_pelanggan = tb_detail_order.id_pelanggan', 'left');
		$this->db->group_by('tb_detail_order.kode_transaksi');
		$this->db->order_by('kode_transaksi','asc');
		$query = $this->db->get();
		return $query->result();
	}
	public function update_status($data)
	{
		$this->db->where('kode_transaksi', $data['kode_transaksi']);
		$this->db->update('tb_detail_order',$data);
	}
}