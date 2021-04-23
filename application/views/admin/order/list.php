<div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Belum Bayar</a></li>
              <li><a href="#tab_2" data-toggle="tab">Menunggu Konfirmasi</a></li>
              <li><a href="#tab_3" data-toggle="tab">Dikemas</a></li>
              <li><a href="#tab_4" data-toggle="tab">Dikirim</a></li>
              <li><a href="#tab_5" data-toggle="tab">Selesai</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Kode Transaksi</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Jumlah Item</th>
                    <th>Jumlah Belanja</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    //format tanggal
                    function tanggal_indo($tanggal, $cetak_hari = false)
                        {
                          $hari = array ( 1 =>    'Senin',
                                'Selasa',
                                'Rabu',
                                'Kamis',
                                'Jumat',
                                'Sabtu',
                                'Minggu'
                              );
                              
                          $bulan = array (1 =>   'Januari',
                                'Februari',
                                'Maret',
                                'April',
                                'Mei',
                                'Juni',
                                'Juli',
                                'Agustus',
                                'September',
                                'Oktober',
                                'November',
                                'Desember'
                              );
                          $split    = explode('-', $tanggal);
                          $tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
                          
                          if ($cetak_hari) {
                            $num = date('N', strtotime($tanggal));
                            return $hari[$num] . ', ' . $tgl_indo;
                          }
                          return $tgl_indo;
                        }
                    foreach ($order as $order) { ?>
                    <tr>
                      <td><a href="<?php echo base_url('admin/order/detail/'.$order->kode_transaksi) ?>"><?php echo $order->kode_transaksi ?></a></td>
                      <td><?php echo $order->nama_pelanggan ?></td>
                      <td><?php echo tanggal_indo(date('Y-m-d',strtotime($order->tanggal_transaksi)),true); ?></td>
                      <td><?php echo $order->total_item ?></td>
                      <td><?php echo $order->total_bayar ?></td>
                      <td><?php if($order->status_bayar==0){
                            echo "<span class='alert-warning'>Belum Bayar</span>";
                          }
                       ?></td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Kode Transaksi</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Jumlah Item</th>
                    <th>Jumlah Belanja</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    foreach ($menunggu as $menunggu) { ?>
                    <tr>
                      <td><a href="<?php echo base_url('admin/order/detail/'.$menunggu->kode_transaksi) ?>"><?php echo $menunggu->kode_transaksi ?></a></td>
                      <td><?php echo $menunggu->nama_pelanggan ?></td>
                      <td><?php echo tanggal_indo(date('Y-m-d',strtotime($menunggu->tanggal_transaksi)),true); ?></td>
                      <td><?php echo $menunggu->total_item ?></td>
                      <td><?php echo $menunggu->total_bayar ?></td>
                      <td><?php if($menunggu->status_bayar==2){
                            echo "<span class='alert-warning'>Menunggu Konfirmasi</span>";
                          }
                       ?></td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Kode Transaksi</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Jumlah Item</th>
                    <th>Jumlah Belanja</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    foreach ($sudah_bayar as $sudah_bayar) { ?>
                    <tr>
                      <td><?php echo $sudah_bayar->kode_transaksi ?></td>
                      <td><?php echo $sudah_bayar->nama_pelanggan ?></td>
                      <td><?php echo tanggal_indo(date('Y-m-d',strtotime($sudah_bayar->tanggal_transaksi)),true); ?></td>
                      <td><?php echo $sudah_bayar->total_item ?></td>
                      <td><?php echo $sudah_bayar->total_bayar ?></td>
                      <td><?php if($sudah_bayar->status_bayar==1){
                            echo "<span class='alert-success'>Sudah Bayar</span>";
                          }
                       ?></td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
              <div class="tab-pane" id="tab_4">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                It has survived not only five centuries, but also the leap into electronic typesetting,
                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                like Aldus PageMaker including versions of Lorem Ipsum.
              </div>
              <div class="tab-pane" id="tab_5">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                It has survived not only five centuries, but also the leap into electronic typesetting,
                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                like Aldus PageMaker including versions of Lorem Ipsum.
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
