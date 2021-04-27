
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url() ?>assets/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('nama_user'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"></li>
        <li class="active">
          <a href="<?php echo base_url('admin/dashboard') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <!-- customer -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-group"></i>
            <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/pelanggan') ?>"><i class="fa fa-user"></i> Data Customer</a></li>
            <li><a href="<?php echo base_url('admin/pelanggan/mitra') ?>"><i class="fa fa-users"></i> Data Mitra</a></li>
            <li><a href="<?php echo base_url('admin/pelanggan/distributor') ?>"><i class="fa fa-users"></i> Data Distributor</a></li>
            <li><a href="<?php echo base_url('admin/komoditi') ?>"><i class="fa fa-th-large"></i> Data Komoditi</a></li>
          </ul>
        </li>
        <!-- distributor -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-cart"></i>
            <span>Produk</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/produk') ?>"><i class="fa fa-shopping-cart"></i> Data Produk</a></li>
            <li><a href="<?php echo base_url('admin/produk/tambah') ?>"><i class="fa fa-plus-square-o"></i> Tambah Produk</a></li>
          </ul>
        </li>
        <!-- Order -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cart-plus"></i>
            <span>Order</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/order') ?>"><i class="fa fa-area-chart"></i> Data Order</a></li>
            <li><a href="<?php echo base_url('admin/order/tambah_order') ?>"><i class="fa fa-plus-square-o"></i> Tambah Order</a></li>
          </ul>
        </li>

        <!-- setting toko -->
        <li>
          <a href="<?php echo base_url('admin/dashboard/setting') ?>">
            <i class="fa fa-dashboard"></i> <span>Setting Lokasi</span>
          </a>
        </li>

        <!-- pengguna -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Pengguna</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/user') ?>"><i class="fa fa-users"></i> Data Pengguna</a></li>
            <li><a href="<?php echo base_url('admin/user/tambah_user') ?>"><i class="fa fa-plus-square-o"></i> Tambah Pengguna</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title; ?>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">