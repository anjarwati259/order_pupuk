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
	public function get_last_id(){
		$this->db->order_by('kode_transaksi', 'DESC');

		$query = $this->db->get("tb_detail_order",1,0);
		return $query->result();
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
		$this->db->order_by('tanggal_transaksi','desc');
		$query = $this->db->get();
		return $query->result();
	}
	//list all order
	public function order_baru(){
		$this->db->select('*');
		$this->db->from('tb_detail_order');
		$this->db->order_by('tanggal_transaksi','asc');
		$this->db->where('status_bayar',0);
		$this->db->limit(6);
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
	//tambah
	public function tambah_stok($data)
	{
		$this->db->insert('tb_stok', $data);
	}

	//detail
	public function kode_transaksi($kode_transaksi){
		$this->db->select('tb_detail_order.*, tb_rekening.nama_bank, tb_rekening.no_rekening');
		$this->db->from('tb_detail_order');
		//join
		$this->db->join('tb_rekening', 'tb_rekening.id_rekening = tb_detail_order.id_rekening', 'left');
		//end join
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

	public function harian(){
		$this->db->select('SUM(total_item) as total');
		$this->db->from('tb_detail_order');
		$this->db->where('tanggal_transaksi',date('Y-m-d'));
		$this->db->order_by('tanggal_transaksi','desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function mingguan(){
		$date_start = strtotime('last Sunday');
		$week_start = date('Y-m-d', $date_start);
		$date_end = strtotime('next Sunday');
		$week_end = date('Y-m-d', $date_end);

		$this->db->select('SUM(total_item) as total, tanggal_transaksi');
		$this->db->from('tb_detail_order');
		$this->db->where('tanggal_transaksi >=',$week_start);
		$this->db->where('tanggal_transaksi <',$week_end);
		$this->db->order_by('tanggal_transaksi','desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function bulanan(){
		$bulan = date('Y-m');

		$this->db->select('SUM(total_item) as total, tanggal_transaksi');
		$this->db->from('tb_detail_order');
		$this->db->where("DATE_FORMAT(tanggal_transaksi,'%Y-%m')", $bulan);
		$this->db->order_by('tanggal_transaksi','desc');
		$query = $this->db->get();
		return $query->row();
	}
	public function get_promo($id){
		$this->db->select('*');
		$this->db->from('tb_promo');
		$this->db->where('id_promo', $id);
		$query = $this->db->get();
		return $query->result();
	}
	//listing order stok
	public function getstok(){
		$this->db->select('tb_stok.*,
							tb_pelanggan.nama_pelanggan, tb_produk.nama_produk, tb_produk.stok');
		$this->db->from('tb_stok');
		$this->db->join('tb_pelanggan','tb_pelanggan.id_pelanggan = tb_stok.id_pelanggan', 'left');
		$this->db->join('tb_produk','tb_produk.kode_produk = tb_stok.kode_produk', 'left');
		$this->db->group_by('tb_stok.id_stok');
		$this->db->order_by('id_stok','asc');
		$query = $this->db->get();
		return $query->result();
	}

}