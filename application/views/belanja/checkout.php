<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Checkout</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

<!-- Start Cart  -->
<div class="cart-box-main">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-6 mb-3">
                <div class="checkout-address">
                    <div class="title-left">
                        <h3>Alamat Pengiriman</h3>
                    </div>
                    <form class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">Pengiriman untuk (nama) </label>
                                <input type="text" class="form-control" id="firstName" placeholder="" value="<?php echo $pelanggan->nama_pelanggan ?>" required>
                                <div class="invalid-feedback"> Valid first name is required. </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="username">No. Handphone</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="username" value="<?php echo $pelanggan->no_hp ?>" required>
                                <div class="invalid-feedback" style="width: 100%;"> Your username is required. </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="address2">Alamat Pengiriman</label>
                            <input type="text" class="form-control" id="address2" value="<?php echo $pelanggan->alamat ?>"> </div>
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label for="country">Provinsi</label>
                                 <select class="form-control" name="provinsi">
                                   
                                 </select>
                            </div>
                            <div class="col-md-5 mb-3">
                                <label for="state">Kabupaten/Kota</label>
                                <select class="wide w-100" name="kota">
								
							</select>
                            </div>
                            <div class="col-md-5 mb-3">
                                <label for="state">Ekspedisi</label>
                                <select class="wide w-100" name="ekspedisi">
                                
                            </select>
                                
                            </div>
                            <div class="col-md-5 mb-3">
                                <label for="state">Paket</label>
                                <select class="wide w-100" name="paket">
                                
                            </select>
                                
                            </div>
                        </div>
                         </form>
                </div>
            </div>
            <div class="col-sm-6 col-lg-6 mb-3">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="odr-box">
                            <div class="title-left">
                                <h3>Keranjang Belanja</h3>
                            </div>
                            <div class="rounded p-2 bg-light">
                                <?php 
                                $tot_berat = 0;
                                $total_item = 0;
                                    //looping data keranjang belanja
                                    foreach ($keranjang as $keranjang) {
                                      //ambil data produk
                                      $kode_produk = $keranjang['id'];
                                      $product  = $this->produk_model->detail($kode_produk);
                                      $berat = $keranjang['qty'] * $product->berat;
                                      $tot_berat = $tot_berat + $berat;
                                      $total_item = $total_item + $keranjang['qty'];
                                     ?>
                                <div class="media mb-2 border-bottom">  
                                    <div class="media-body"> <a href="detail.html"> <?php echo $keranjang['name'] ?></a>
                                        <div class="small text-muted">Price: <?php echo 'Rp. '.number_format($keranjang['price'],'0',',','.') ?> <span class="mx-2">|</span> Qty: <?php echo $keranjang['qty'] ?> <span class="mx-2">|</span> Subtotal: <?php 
                                        $sub_total = ($keranjang['price'] * $keranjang['qty']);
                                        echo number_format($sub_total,'0',',','.');?>
                                    </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="order-box">
                            <div class="title-left">
                                <h3>Rincian Belanja</h3>
                            </div>
                            <div class="d-flex">
                                <div class="font-weight-bold">Product</div>
                                <div class="ml-auto font-weight-bold">Total</div>
                            </div>
                            <hr class="my-1">
                            <div class="d-flex">
                                <h4>Total Belanja</h4>
                                <div class="ml-auto font-weight-bold"> <?php echo 'Rp. '.number_format($this->cart->total(), '0',',','.'); ?> </div>
                            </div>
                            <div class="d-flex">
                                <h4>Berat</h4>
                                <div class="ml-auto font-weight-bold"> <?php echo $tot_berat ?> gr </div>
                            </div>
                            <div class="d-flex">
                                <h4>Ongkos Kirim</h4>
                                <div class="ml-auto font-weight-bold"> <label id="ongkir"></label> </div>
                            </div>
                            <hr>
                            <div class="d-flex gr-total">
                                <h5>Total Belanja</h5>
                                <div class="ml-auto h5"> <label id="total_bayar"></label></div>
                            </div>
                            <hr> 
                        </div>
                        <?php 
                      echo form_open(base_url('belanja/checkout'));
                      $kode_transaksi = date('dmY').strtoupper(random_string('alnum',8));
                      ?>
                        <div class="order-box">
                            <div class="title-left">
                                <h3>Rekening Pembayaran</h3>
                            </div>
                            <div class="d-block my-3">
                            <div class="custom-control custom-radio">
                                <input id="credit" name="rekening" type="radio" class="form-control custom-control-input" value="2" checked required>
                                <label class="custom-control-label" for="credit">Bank BCA</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="debit" name="rekening" type="radio" class="form-control custom-control-input" value="1" required>
                                <label class="custom-control-label" for="debit">Bank Mandiri</label>
                            </div>
                        </div>
                    </div>
                    
                      <input type="hidden" name="kode_transaksi" class="form-control" value="<?php echo $kode_transaksi ?>">
                      <input type="hidden" name="nama_pelanggan" class="form-control" value="<?php echo $pelanggan->nama_pelanggan ?>">
                      <input type="hidden" name="no_hp" class="form-control" value="<?php echo $pelanggan->no_hp ?>">
                      <input type="hidden" name="alamat" class="form-control" value="<?php echo $pelanggan->alamat ?>">
                      <input type="hidden" name="total_transaksi" value="<?php echo $this->cart->total() ?>">
                      <input type="hidden" name="tanggal_transaksi" value="<?php echo date('Y-m-d'); ?>">
                      <input type="hidden" name="total_item" value="<?php echo $total_item ?>">
                      <input type="hidden" name="expedisi">
                      <input type="hidden" name="ongkir">
                      <input type="hidden" name="total">
                      <input type="text" name="provinsi">
                      <input type="text" name="kabupaten">

                    <div class="col-12 d-flex shopping-box"> <button class="ml-auto btn hvr-hover">Buat Pesanan</button> </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    //provinsi
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('rajaongkir/provinsi') ?>",
      success: function(hasil_provinsi){
        //console.log(hasil_provinsi);
        $("select[name=provinsi]").html(hasil_provinsi);
      }
    });

    //kota
    $("select[name=provinsi]").on("change", function(){
      var provinsi = $("option:selected", this).attr('provinsi');
      var id_provinsi = $("option:selected", this).attr('id_provinsi');
      $.ajax({
      type: "POST",
      url: "<?php echo base_url('rajaongkir/kota') ?>",
      data: 'id_provinsi=' + id_provinsi,
      success: function(hasil_kota){
        //console.log(hasil_kota);
        $("select[name=kota]").html(hasil_kota);
        $("input[name=provinsi]").val(provinsi);
      }
    });
    });
    //ekspedisi
    $("select[name=kota]").on("change", function(){
      var kota = $("option:selected", this).attr('kota');
        $.ajax({
      type: "POST",
      url: "<?php echo base_url('rajaongkir/ekspedisi') ?>",
      success: function(hasil_ekspedisi){
        //console.log(hasil_kota);
        $("select[name=ekspedisi]").html(hasil_ekspedisi);
        $("input[name=kabupaten]").val(kota);
      }
    });
    });
    //paket
    $("select[name=ekspedisi]").on("change", function(){
    //mendapatkan expedisi
    var ekspedisi = $("select[name=ekspedisi]").val();
    //mendapatkan kota tujuan
    var id_tujuan = $("option:selected","select[name=kota]").attr('id_kota');
    //mengambil data ongkos kirim
    var total_berat = <?= $tot_berat ?>;
        $.ajax({
      type: "POST",
      url: "<?php echo base_url('rajaongkir/paket') ?>",
      data: 'ekspedisi=' + ekspedisi + '&id_kota=' + id_tujuan + '&berat=' + total_berat,
      success: function(hasil_paket){
        //console.log(hasil_kota);
        $("select[name=paket]").html(hasil_paket);
      }
    });
    });

    //ongkir
    $("select[name=paket]").on("change", function(){
        //data ekspedisi
        var ekspedisi = $("select[name=ekspedisi]").val();
        //mengambil data ongkir
        var dataongkir = $("option:selected", this).attr('ongkir');
        var reverse = dataongkir.toString().split('').reverse().join(''),
        ribuan_ongkir = reverse.match(/\d{1,3}/g);
        ribuan_ongkir = ribuan_ongkir.join('.').split('').reverse().join('');
        $("#ongkir").html("Rp. "+ ribuan_ongkir);


        //menghitung total bayar
        var total_bayar = parseInt(dataongkir) + parseInt(<?php echo $this->cart->total() ?>);
        var bayar = total_bayar.toString().split('').reverse().join(''),
        ribuan_bayar = bayar.match(/\d{1,3}/g);
        ribuan_bayar = ribuan_bayar.join('.').split('').reverse().join('');
        $("#total_bayar").html("Rp. "+ribuan_bayar);

        $("input[name=total]").val(total_bayar);
        $("input[name=expedisi]").val(ekspedisi);
        $("input[name=ongkir]").val(dataongkir);
    });
  });
</script>