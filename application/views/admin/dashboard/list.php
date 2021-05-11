
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
  <div class="col-md-8">
    <!-- AREA CHART -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <!-- <h3 class="box-title">Data Penjualan Perminggu</h3> -->

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body chart-responsive">
        <div class="chart" id="data_penjualan" style="height: 300px;"></div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </div>
  <!-- /.col (LEFT) -->
</div>
<!-- /.row -->

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<?php 
$tanggal = array();
$jual = array();
$jual1 = array();
$ikan = array();

foreach ($hari as $hari) {
  $tanggal[] = $hari->tanggal_transaksi;
  $jual[] = intval($hari->jml_beli);
}
foreach ($POC1 as $POC1 ) {
  $jual1[] = intval($POC1->jml_beli);
}
foreach ($ikan as $ikan ) {
  $ikan[] = intval($ikan->jml_beli);
}
print_r(json_encode($jual1));
print_r(json_encode($ikan));
 ?>
<script type="text/javascript">
  Highcharts.chart('data_penjualan', {
    chart: {
        type: 'area'
    },
    title: {
        text: 'Grafik Penjualan Harian'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: <?= json_encode($tanggal)?>,
        tickmarkPlacement: 'on',
        title: {
            enabled: false
        }
    },
    yAxis: {
        title: {
            text: 'Jumlah Penjualan'
        },
        labels: {
            formatter: function () {
                return this.value;
            }
        }
    },
    tooltip: {
        split: true,
        valueSuffix: ''
    },
    plotOptions: {
        area: {
            stacking: 'normal',
            lineColor: '#666666',
            lineWidth: 1,
            marker: {
                lineWidth: 1,
                lineColor: '#666666'
            }
        }
    },
    series: [{
        name: 'POC',
        data: <?= json_encode($jual)?>
      
     }, {
         name: 'POC 500ml',
         data: <?= json_encode($jual1)?>
     }, {
         name: 'Nutrisi Ternak',
         data: <?= json_encode($ikan)?>
    // }, {
    //     name: 'Nutrisi Ikan',
    //     data: [18, 31, 54, 156, 70, 130]
     }]
});
</script>