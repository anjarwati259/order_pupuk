<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-8">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><strong>Data Order</strong></h3>
        </div>
        <?php 
          //notif error
          echo validation_errors('<p class="alert alert-warning">','</p>');

          //form open
          echo form_open_multipart(base_url('pembayaran/bayar/'.$detail_order->kode_transaksi));
           ?>
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
                      <input type="text" name="total_bayar" value="<?php echo number_format($detail_order->total_bayar,'0',',','.') ?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                   <label >Atas Nama</label>
                    <input type="text" name="nama_pemilik" class="form-control">
                </div>
              </div>
            </div>
            <!-- Date -->
              <div class="form-group">
                <label>Tanggal Bayar</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker" name="tanggal_bayar" value="<?php echo set_value('tanggal_bayar') ?>">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

            <div class="form-group">
              <label>Transfer Ke</label>
              <select class="form-control" name="id_rekening">
                <?php foreach ($rekening as $rekening) { ?>
                  <option value="<?php echo $rekening->id_rekening ?>"><strong><?php echo $rekening->nama_bank ?> a.n <?php echo $rekening->nama_pemilik ?> (<?php echo $rekening->no_rekening ?> )</strong></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label>Bukti Pembayaran</label>
              <input type="file" name="bukti_bayar">
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Konfirmasi</button>
          </div>
        </form>
        <?php echo form_close(); ?>
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
<script type="text/javascript">
  $(function () {
    //Initialize Select2 Elements
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
      format:'yyyy-mm-dd'
    })
  })
</script>