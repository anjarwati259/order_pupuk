
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
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <!-- <li>
          <a href="pages/widgets.html">
            <i class="fa fa-th"></i> <span>Widgets</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li> -->
        <!-- customer -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Customer</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/pelanggan') ?>"><i class="fa fa-user"></i> Data Customer</a></li>
            <li><a href="<?php echo base_url('admin/pelanggan/add_customer') ?>"><i class="fa fa-plus-square-o"></i> Tambah Customer</a></li>
          </ul>
        </li>
        <!-- mitra -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Mitra</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/pelanggan/mitra') ?>"><i class="fa fa-user"></i> Data Mitra</a></li>
            <li><a href="<?php echo base_url('admin/pelanggan/add_mitra') ?>"><i class="fa fa-plus-square-o"></i> Tambah Mitra</a></li>
          </ul>
        </li>
        <!-- distributor -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Distributor</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-user"></i> Data Distributor</a></li>
            <li><a href="pages/charts/morris.html"><i class="fa fa-plus-square-o"></i> Tambah Distributor</a></li>
          </ul>
        </li>
        <!-- Komoditi -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-th-large"></i>
            <span>Komoditi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-th-large"></i> Data Komoditi</a></li>
            <li><a href="pages/charts/morris.html"><i class="fa fa-plus-square-o"></i> Tambah Komoditi</a></li>
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
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-shopping-cart"></i> Data Produk</a></li>
            <li><a href="pages/charts/morris.html"><i class="fa fa-plus-square-o"></i> Tambah Produk</a></li>
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
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-area-chart"></i> Data Order</a></li>
            <li><a href="pages/charts/morris.html"><i class="fa fa-plus-square-o"></i> Tambah Order</a></li>
          </ul>
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
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">