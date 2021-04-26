<!DOCTYPE html>
<html>
<head>
	<title>Bukti Bayar</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<img src="assets/img/logo/logo2.png" style="height: auto; width: 150px; position: relative; align-items: center; margin-bottom: 20px;">
	<p style="font-size: 23px;"><strong>Nota Pesanan</strong></p>
	<table class="table">
	  <tbody>
	  	<tr>
	      <th width="40%">Nama Pembeli</th>
	      <td ><?php echo $detail_order->nama_pelanggan ?></td>
	    </tr>
	    <tr>
	      <th width="40%">Alamat Pembeli</th>
	      <td><?php echo $detail_order->alamat ?></td>
	    </tr>
	    <tr>
	      <th width="40%">No. Telephone</th>
	      <td><?php echo $detail_order->no_hp ?></td>
	    </tr>
	  </tbody>
	</table>

	<br>
	<br>
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
	<table class="table">
		<thead>
			<tr>
				<th>No. Pesanan</th>
				<th>Waktu Pembayaran</th>
				<th>Metode Pembayaran</th>
			</tr>
		</thead>
	  <tbody>
	  	<tr>
	      <td ><?php echo $bayar->kode_transaksi ?></td>
	      <td ><?php echo tanggal_indo(date('Y-m-d',strtotime($bayar->tanggal_bayar)),true); ?></td>
	      <td ><?php echo $bayar->nama_bank ?></td>
	    </tr>
	    
	  </tbody>
	</table>
	<br>
	<br>
	<p><strong>Rincian Pesanan</strong></p>
	<table class="table">
		<thead>
			<tr>
				<th>No</th>
				<th>Produk</th>
				<th>Harga Produk</th>
				<th>Jumlah</th>
				<th>Subtotal</th>
			</tr>
		</thead>
	  <tbody>
	  	<?php $no =1; foreach ($transaksi as $trans) { ?>
	  	<tr>
	      <td ><?php echo $no++ ?></td>
	      <td ><?php echo $trans->nama_produk ?></td>
	      <td >Rp. <?php echo number_format($trans->harga,'0',',','.') ?></td>
	      <td ><?php echo $trans->jml_beli ?></td>
	      <td >Rp. <?php echo number_format($trans->total_harga,'0',',','.') ?></td>
	    </tr>
	<?php } ?>
	<tr>
		<td colspan="4" align="right"><strong>Subtotal</strong></td>
		<td colspan="4" align="right"><strong>Rp. <?php echo number_format($detail_order->total_transaksi,'0',',','.') ?></strong></td>
	</tr>
	<tr>
		<td colspan="4" align="right"><strong>Ongkos Kirim</strong></td>
		<td colspan="4" align="right"><strong>Rp. <?php echo number_format($detail_order->ongkir,'0',',','.') ?></strong></td>
	</tr>
	<tr>
		<td colspan="4" align="right"><strong>Jumlah Belanja</strong></td>
		<td colspan="4" align="right"><strong>Rp. <?php echo number_format($detail_order->total_bayar,'0',',','.') ?></strong></td>
	</tr>
	  </tbody>
	</table>
</body>
</html>