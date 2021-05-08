
<!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3><?php echo $order->total ?></h3>

        <p>Order Terbaru</p>
      </div>
      <div class="icon">
        <i class="fa fa-cart-arrow-down"></i>
      </div>
      <a href="<?php echo base_url('admin/order') ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3><?php echo $mitra->total ?></h3>

        <p>Mitra</p>
      </div>
      <div class="icon">
        <i class="fa fa-users"></i>
      </div>
      <a href="<?php echo base_url('admin/pelanggan/mitra') ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3><?php echo $dist->total ?></h3>

        <p>Distributor</p>
      </div>
      <div class="icon">
        <i class="fa fa-users"></i>
      </div>
      <a href="<?php echo base_url('admin/pelanggan/distributor') ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3><?php echo $customer->total ?></h3>

        <p>Customer</p>
      </div>
      <div class="icon">
        <i class="fa fa-user"></i>
      </div>
      <a href="<?php echo base_url('admin/pelanggan') ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
</div>
<!-- /.row -->
<div class="row">
  <div class="col-md-6">
    <!-- AREA CHART -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Area Chart</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body chart-responsive">
        <div class="chart" id="revenue-chart" style="height: 300px;"></div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </div>
  <!-- /.col (LEFT) -->
  <div class="col-md-6">
    <!-- LINE CHART -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Line Chart</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body chart-responsive">
        <div class="chart" id="line-chart" style="height: 300px;"></div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </div>
  <!-- /.col (RIGHT) -->
</div>
<!-- /.row -->

<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    "use strict";

    // AREA CHART
    var area = new Morris.Area({
      element: 'revenue-chart',
      resize: true,
      data: [
        {y: '2011 Q1', item1: 2666, item2: 2666, item3: 3597},
        {y: '2011 Q2', item1: 2778, item2: 2294, item3: 2778},
        {y: '2011 Q3', item1: 4912, item2: 1969, item3: 1969},
        {y: '2011 Q4', item1: 3767, item2: 3597, item3: 2778},
      ],
      xkey: 'y',
      ykeys: ['item1', 'item2','item3'],
      labels: ['Item 1', 'Item 2', 'Item 2'],
      lineColors: ['#a0d0e0', '#3c8dbc', '#a0d0e0'],
      hideHover: 'auto'
    });

    // LINE CHART
    var line = new Morris.Line({
      element: 'line-chart',
      resize: true,
      data: [
        {y: '2011 Q1', item1: 2666, item2: 3767},
        {y: '2011 Q2', item1: 2778, item2: 4912},
        {y: '2011 Q3', item1: 4912, item2: 2778},
        {y: '2011 Q4', item1: 3767, item2: 2666},],
      xkey: 'y',
      ykeys: ['item1','item2'],
      labels: ['Item 1', 'Item 2'],
      lineColors: ['#3c8dbc', '#3c8dbc'],
      hideHover: 'auto'
    });

  });
</script>