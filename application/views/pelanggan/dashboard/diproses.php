<!-- Main content -->
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
        </div>
        <!-- /.box-header -->
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Kode Transaksi</th>
            <th>Tanggal Transaksi</th>
            <th>Jumlah Pesanan</th>
            <th>Total Pembayaran</th>
            <th>Status</th>
          </tr>
          </thead>
          <tbody>
            <?php $no=1; 
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
              <td><?php echo $no++; ?></td>
              <td>#<a href="<?php echo base_url('order/detail/'.$order->kode_transaksi) ?>"><?php echo $order->kode_transaksi ?></a></td>
              <td><?php echo tanggal_indo(date('Y-m-d',strtotime($order->tanggal_transaksi)),true); ?></td>
              <td><?php echo $order->total_item ?> Barang</td>
              <td>Rp. <?php echo number_format($order->total_bayar,'0',',','.') ?></td>
              <td><?php 
              $status = $order->status_bayar;
              if($status==0){
                echo "<span class='alert-warning'>Belum Bayar</span>";
              }else if($status==2){
                echo "<span class='alert-warning'>Menunggu Konfirmasi</span>";
              }else{
                echo "<span class='alert-success'>Sudah Bayar</span>";
              } ?>
              </td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>