
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

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <!-- MAP & BOX PANE -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">H-7 Pengiriman Barang</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="row">
                <div class="col-md-12 col-sm-12">
                  <div class="pad">
                    <!-- Map will be created here -->
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Kode Transaksi</th>
                              <th>Nama Customer</th>
                              <th>Total Item</th>
                              <th>Total Harga</th>
                              <th>Tanggal Order</th>
                              <th>Telepon</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td>OUT1616543298</td>
                              <td>Cyntia</td>
                              <td>4</td>
                              <td>Rp440,000</td>
                              <td>2021-04-23</td>
                              <td>081212121</td>
                          </tr>
                          <tr>
                              <td>OUT1464796372</td>
                              <td>Erwin</td>
                              <td>1</td>
                              <td>Rp6,200,000</td>
                              <td>2016-07-01</td>
                              <td>0812121212</td>
                          </tr>
                          <tr>
                              <td>OUT1467028283</td>
                              <td>Cyntia</td>
                              <td>5</td>
                              <td>Rp600,000</td>
                              <td>2016-07-27</td>
                              <td>081212121</td>
                          </tr>
                          <tr>
                              <td>OUT1467028283</td>
                              <td>Cyntia</td>
                              <td>5</td>
                              <td>Rp600,000</td>
                              <td>2016-07-27</td>
                              <td>081212121</td>
                          </tr>
                          <tr>
                              <td>OUT1467028283</td>
                              <td>Cyntia</td>
                              <td>5</td>
                              <td>Rp600,000</td>
                              <td>2016-07-27</td>
                              <td>081212121</td>
                          </tr>
                      </tbody>
                  </table>
                  <div class="clearfix">
                      <a href="http://localhost/pos/tunggakan" class="btn btn-primary">Tampilkan Semua</a>
                  </div>
                  </div>
                </div>
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <!-- Info Boxes Style 2 -->
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><a href="" style="color: #fff;"><i class="fa fa-cubes"></i></a></span>

            <div class="info-box-content">
              <span class="info-box-text">Stok</span>
              <span class="info-box-number"><?php echo $stok->total ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <!-- Info Boxes Style 2 -->
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-shopping-bag"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">TRX PENJUALAN HARIAN</span>
              <span class="info-box-number"><?php echo $hari ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-shopping-basket"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">TRX PENJUALAN MINGGUAN</span>
              <span class="info-box-number">92,050</span>

            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-shopping-bag"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">TRX PENJUALAN BULANAN</span>
              <span class="info-box-number">114,381</span>

            </div>
            <!-- /.info-box-content -->
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
