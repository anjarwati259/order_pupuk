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
      <li role="presentation"><a href="<?php echo site_url('admin/order/sudah_bayar');?>">Dikemas</a></li>
      <li role="presentation" class="active"><a href="#tab_1">Dikirim</a></li>
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
                foreach ($dikirim as $dikirim) { ?>
                <tr>
                  <td><a href="<?php echo base_url('admin/order/detail/'.$dikirim->kode_transaksi) ?>"><?php echo $dikirim->kode_transaksi ?></a></td>
                  <td><?php echo $dikirim->nama_pelanggan ?></td>
                  <td><?php echo tanggal_indo(date('Y-m-d',strtotime($dikirim->tanggal_transaksi)),true); ?></td>
                  <td><?php echo $dikirim->total_item ?></td>
                  <td><?php echo $dikirim->total_bayar ?></td>
                  <td><?php if($dikirim->status_bayar==2){
                        echo "<span class='alert-success'>Barang Dikirim</span>";
                      }?>
                      <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#diterima">
                          <i class="fa fa-check"></i> Diterima
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


<!-- modal -->
<div class="modal fade" id="diterima">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center">Pesanan Diterima</h4>
      </div>
      <div class="modal-body">
        Apakah Anda Yakin Pesanan Telah Diterima?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
        <a href="<?php echo base_url('admin/order/diterima/'.$dikirim->kode_transaksi) ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i> Ya, Saya Yakin</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->