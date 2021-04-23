<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-8">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><strong>Data Order</strong></h3>
        </div>
        <form role="form">
          <div class="box-body">
            <div class="form-group">
              <label>Kode Invoice</label>
              <input type="text" name="kode_transaksi" value="<?php echo $detail_order->kode_transaksi ?>" class="form-control" readonly/>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                   <label >Nama Bank</label>
                    <input type="text" name="nama_bank" class="form-control">
                </div>
                <div class="col-md-6">
                   <label >No. Rekening</label>
                    <input type="text" name="no_rekening" class="form-control">
                </div> 
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                   <label >Jumlah Transfer</label>
                    <div class="input-group">
                      <span class="input-group-addon">Rp</span>
                      <input type="text" name="total_bayar" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                   <label >Atas Nama</label>
                    <input type="text" name="nama_pemilik" class="form-control">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Transfer Ke</label>
              <select class="form-control">

              </select>
            </div>
            <div class="form-group">
              <label>Bukti Pembayaran</label>
              <input type="file">
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Konfirmasi</button>
          </div>
        </form>
      </div>
    </div>
    <div class="col-md-4">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><strong>Data Order</strong></h3>
        </div>
        <table id="example1" class="table table-bordered table-striped">
          <tbody>
            <tr>
              <td width="40%">Jumlah Item</td>
              <th><?php echo $detail_order->total_item ?> Barang</th>
            </tr>
            <tr>
              <td width="40%">Total Belanja</td>
              <th>Rp. <?php echo number_format($detail_order->total_transaksi,'0',',','.') ?></th>
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
              <td width="40%">Jumlah Bayar</td>
              <th>Rp. <?php echo number_format($detail_order->total_bayar,'0',',','.') ?></th>
            </tr>
            <tr>
              <td width="40%">Status Bayar</td>
              <th><?php if($detail_order->status_bayar==0){
                echo "Belum Bayar";
              }else{
                echo "Sudah Bayar";
              } ?></th>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>