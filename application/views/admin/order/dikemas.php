<?php 
//error upload
if(isset($error)){
  echo '<p class="alert alert-warning">';
  echo $error;
  echo '</p>';
}
//Notifikasi error
echo validation_errors('<div class = "alert alert-warning">','</div>');

// Form open
echo form_open_multipart(base_url('admin/produk/tambah'), ' class="form-horizontal"');
 ?>
<!-- START CUSTOM TABS -->
<div class="row">
  <div class="col-md-12">
    <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
      <li role="presentation"><a href="<?php echo site_url('admin/order');?>">Belum Bayar</a></li>
      <li role="presentation"><a href="<?php echo site_url('admin/order/menunggu');?>">Menunggu Konfirmasi</a></li>
      <li role="presentation" class="active"><a href="#tab_1">Dikemas</a></li>
      <li role="presentation"><a href="<?php echo site_url('admin/order/listkirim');?>">Dikirim</a></li>
      <li role="presentation"><a href="<?php echo site_url('admin/order/selesai');?>">Selesai</a></li>
      </ul>
      <div class="tab-content">
        <!-- /.tab-pane -->
        <div class="tab-pane active" id="tab_1">
          <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Kode Invoice</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Jumlah Item</th>
                <th>Jumlah Belanja</th>
                <th>Status</th>
                <th>Action</th>
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
                       <td>
                          <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#kirim<?= $sudah_bayar->kode_transaksi?>">
                          <i class="fa fa-check"></i> Kirim
                        </button>
                       </td>
                    </tr>
              <?php } ?>
              </tbody>
            </table>
          <!-- /.box -->
        </div>
        <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
    </div>
    <!-- nav-tabs-custom -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
<!-- END CUSTOM TABS -->
<?php foreach ($order as $order) { ?>
<div class="modal fade" id="kirim<?php echo$order->kode_transaksi?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Order #<strong><?php echo $order->kode_transaksi ?></strong></h4>
      </div>
      <div class="modal-body">
        <?php echo form_open(base_url('admin/order/dikirim/'.$order->kode_transaksi)); ?>
        <form role="form-horizontal">
          <div class="box-body">
            <div class="form-group">
              <table class="table">
                <tr>
                  <th width="25%">Expedisi</th>
                  <th>: <?php echo $order->expedisi ?></th>
                </tr>
                <tr>
                  <th width="25%">Ongkos Kirim</th>
                  <th>: Rp. <?php echo number_format($order->ongkir) ?></th>
                </tr>
                <tr>
                  <th width="25%">No Resi</th>
                  <td><input class="form-control" name="no_resi" placeholder="No Resi"></td>
                </tr>
              </table>
            </div>
            <div class="modal-footer">
            <button type="submit" name="kirim" class="btn btn-success"> Kirim</button>
          </div>
          <?php echo form_close(); ?>
            
          </div>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php } ?>