<?php
class Page extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('dashboard_model');
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
    $hari = $this->dashboard_model->harian($tanggal);
    //Allowing akses to admin only
      if($this->session->userdata('hak_akses')==='1'){
        $data = array('title' => 'Admin',
                        'order' => $order,
                        'mitra' => $mitra,
                        'dist' => $dist,
                        'customer' => $customer,
                        'stok'    => $stok,
                        'hari'    => $tanggal,
                        'isi' => 'admin/dashboard/list' );
        $this->load->view('admin/layout/wrapper',$data, FALSE);
      }else{
          echo "Access Denied";
      }

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

}
