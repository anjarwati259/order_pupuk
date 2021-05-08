<?php
class Page extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('dashboard_model');
    $this->load->model('order_model');
    //proteksi halaman
    $this->simple_login->cek_login();
  }
  function index(){
    $tanggal = date('Y-m-d');
    $order = $this->dashboard_model->order_admin();
    $mitra = $this->dashboard_model->pelanggan('Mitra');
    $dist = $this->dashboard_model->pelanggan('Distributor');
    $customer = $this->dashboard_model->pelanggan('Customer');
    $stok = $this->dashboard_model->stok();
    $harian = $this->order_model->harian();
    $mingguan = $this->order_model->mingguan();
    $bulanan = $this->order_model->bulanan();
    $order_baru = $this->order_model->order_baru();

    //Allowing akses to admin only
      if($this->session->userdata('hak_akses')==='1'){
        $data = array('title' => 'Admin',
                        'order' => $order,
                        'mitra' => $mitra,
                        'dist' => $dist,
                        'customer' => $customer,
                        'stok'    => $stok,
                        'harian'    => $harian,
                        'mingguan'    => $mingguan,
                        'bulanan' => $bulanan,
                        'order_baru' => $order_baru,
                        'isi' => 'admin/dashboard/list' );
        $this->load->view('admin/layout/wrapper',$data, FALSE);
      }else{
          echo "Access Denied";
      }

  }

  private function harian($bulanan = false, $mingguan = false){
    $today = date("Y-m-d",strtotime("today"));
    $yesterday = date("Y-m-d",strtotime("-1 day")); 
    if($bulanan){
      $yesterday = date("Y",year(Date));  
    }else if($mingguan){
      $yesterday = date("Y-m-d",strtotime("-7 day"));
    } 

    $filter['DATE(tb_detail_order.tanggal_transaksi) >='] = $yesterday;
    $filter['DATE(tb_detail_order.tanggal_transaksi) <='] = $today;

    $order = $this->order_model->get_filter($filter);
    return $order;
  }

  function distributor(){ 
    //Allowing akses to distributor only
    if($this->session->userdata('hak_akses')==='2'){
      $order = $this->dashboard_model->order();
      $proses = $this->dashboard_model->order_proses();

      $data = array('title' => 'Halaman Customer',
                      'order' => $order,
                      'proses' => $proses,
                      'isi' => 'pelanggan/dashboard/list' );
    $this->load->view('pelanggan/layout/wrapper',$data, FALSE);
    }else{
        echo "Access Denied";
    }
  }

  function mitra(){
    //Allowing akses to author only
    if($this->session->userdata('hak_akses')==='3'){
      $order = $this->dashboard_model->order();
      $data = array('title' => 'Halaman Mitra',
                      'order' => $order,
                      'isi' => 'pelanggan/dashboard/list' );
    $this->load->view('pelanggan/layout/wrapper',$data, FALSE);
    }else{
        echo "Access Denied";
    }
  }

  function logistik(){ 
    //Allowing akses to distributor only
    if($this->session->userdata('hak_akses')==='4'){
      $order = $this->dashboard_model->order();
      $proses = $this->dashboard_model->order_proses();
      $hak_akses = $this->session->userdata('hak_akses');

      $data = array('title' => 'Halaman Customer',
                      'order' => $order,
                      'proses' => $proses,
                      'hak_akses' => $hak_akses,
                      'isi' => 'pelanggan/dashboard/list' );
    $this->load->view('pelanggan/layout/wrapper',$data, FALSE);
    }else{
        echo "Access Denied";
    }
  }

}
