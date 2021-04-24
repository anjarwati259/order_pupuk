<!-- Main content -->
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
 ?>
 <?php if($this->session->flashdata('sukses')){
    echo '<div class="alert alert-warning">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
  } ?>
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-7">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><strong>Data Order</strong></h3>
        </div>
        <table id="example1" class="table table-bordered table-striped">
          <tbody>
          	<tr>
          		<td width="40%">Kode Transaksi</td>
          		<th><?php echo $detail_order->kode_transaksi ?></th>
          	</tr>
          	<tr>
          		<td width="40%">Tanggal Transaksi</td>
          		<th><?php echo tanggal_indo(date('Y-m-d',strtotime($detail_order->tanggal_transaksi)),true); ?></th>
          	</tr>
          	<tr>
          		<td width="40%">Jumlah Item</td>
          		<th><?php echo $detail_order->total_item ?></th>
          	</tr>
          	<tr>
          		<td width="40%">Ekspedisi</td>
          		<th><?php echo $detail_order->expedisi ?></th>
          	</tr>
          	<tr>
          		<td width="40%">Ongkos Kirim</td>
          		<th>Rp. <?php echo number_format($detail_order->ongkir,'0',',','.') ?></th>
          	</tr>
          	<tr>
          		<td width="40%">Total Bayar</td>
          		<th>Rp. <?php echo number_format($detail_order->total_bayar,'0',',','.') ?></th>
          	</tr>
          	<tr>
          		<td width="40%">Status Pembayaran</td>
          		<th><?php $status = $detail_order->status_bayar;
               if($status==0){
          			echo "Belum Bayar";
              }else if($status==2){
                echo "Menunggu Konfirmasi";
          		}else{
          			echo "Sudah Bayar";
          		} ?></th>
          	</tr>
          </tbody>
        </table>
      </div>

      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><strong>Barang Dalam Pesanan</strong></h3>
        </div>
        <table id="example1" class="table table-bordered table-striped">
        	<thead>
        		<tr>
        			<th></th>
        			<th>Produk</th>
        			<th>Jml Beli</th>
        			<th>Harga Satuan</th>
        		</tr>
        	</thead>
          <tbody>
          	<?php foreach ($transaksi as $transaksi) { ?>
          	<tr>
          		<td><img src="<?php echo base_url('assets/upload/image/thumbs/'.$transaksi->gambar) ?>" class="img img-responsive img-thumbnail" width="60"></td>
          		<td><?php echo $transaksi->nama_produk ?></td>
          		<td><?php echo $transaksi->jml_beli ?></td>
          		<td>Rp. <?php echo number_format($transaksi->harga,'0',',','.') ?></td>
          	</tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="col-md-5">
      <!-- Horizontal Form -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title"><strong>Data Penerima</strong></h3>
        </div>
        <table id="example1" class="table table-bordered table-striped">
          <tbody>
          	<tr>
          		<td width="40%">Nama Penerima</td>
          		<th><?php echo $detail_order->nama_pelanggan ?></th>
          	</tr>
          	<tr>
          		<td width="40%">No. Hp</td>
          		<th><?php echo $detail_order->no_hp ?></th>
          	</tr>
          	<tr>
          		<td width="40%">Alamat</td>
          		<th><?php echo $detail_order->alamat ?></th>
          	</tr>
          </tbody>
        </table>
      </div>

      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title"><strong>Pembayaran</strong></h3>
        </div>
        <?php if($detail_order->status_bayar==0){ ?>
          <br>
          <div class="alert alert-success alert-dismissible">
            Belum Ada Pembayaran
          </div>
          <br>
          </div>
          
        <?php }else{ ?>
        <table id="example1" class="table table-bordered table-striped">
          <tbody>
            <tr>
              <td colspan="2"><img height="450px" width="400px" src="<?php echo base_url('assets/upload/image/thumbs/'.$bayar->bukti_bayar) ?>"></td>
            </tr>
          	<tr>
          		<td width="40%">Transfer</td>
          		<th>Rp. <?php echo number_format($bayar->jumlah_bayar,'0',',','.') ?></th>
          	</tr>
          	<tr>
          		<td width="40%">Tanggal</td>
          		<th><?php echo tanggal_indo(date('Y-m-d',strtotime($bayar->tanggal_bayar)),true); ?></th>
          	</tr>
          	<tr>
          		<td width="40%">Transfer ke</td>
          		<th><?php echo $bayar->bank ?> a.n <?php echo $bayar->nama_pemilik ?> (<?php echo $bayar->rekening ?>)</th>
          	</tr>
          	<tr>
          		<td width="40%">Transfer Dari</td>
          		<th><?php echo $bayar->nama_bank ?> a.n <?php echo $bayar->atas_nama ?> (<?php echo $bayar->no_rekening ?>)</th>
          	</tr>
          </tbody>
        </table>
        <?php echo form_open(base_url('pembayaran/konfirmasi/'.$detail_order->kode_transaksi)); ?>
        <div class="row">
            <div class="col-md-8">
              <select class="form-control" name="konfirmasi">
                <option>-- Pilih --</option>
                <option value="1">Konfirmasi Pembayaran</option>
                <option value="3">Tidak Ada Pembayaran</option>
              </select>
            </div>
            <div class="col-md-4">
              <button type="submit" class="btn btn-block btn-success">Konfirmasi</button>
            </div>
          </div>
          <br>
      </div>
      <?php echo form_close();
    } ?>
      
      <!-- /.box -->
    </div>
    <!--/.col (right) -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->