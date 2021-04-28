
<!-- START CUSTOM TABS -->
      <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li role="presentation" class="active"><a href="#tab_1">Tambah Order</a></li>
            <!-- <li role="presentation"><a href="<?php echo site_url('admin/pelanggan');?>">Data Customer</a></li> -->
            </ul>
            <div class="tab-content">
              <!-- /.tab-pane -->
              <div class="tab-pane active" id="tab_1">
                <form id="transaction-form" class="form-horizontal" method="POST" action="<?php echo base_url('admin/order/add_process');?>">
              <div class="box-body">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label" for="kode">Kode Order</label>
                    <div class="col-sm-8">
                      <input type="hidden" name="kode_transaksi" id="kode_transaksi" value="<?php echo $kode_transaksi?>"/>
                      <input type="text" name="kode" id="kode_transaksi" class="form-control" value="<?php echo $kode_transaksi ?>" disabled/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label" for="category_id">Customer</label>
                    <div class="col-sm-8">
                      <select class="form-control" id="id_pelanggan" name="id_pelanggan">
                          <?php foreach($pelanggan as $item){?>
                             <option value="<?php echo $item->id_pelanggan;?>">
                              <?php echo $item->nama_pelanggan;?>
                            </option>
                          <?php }?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label" for="date">Tanggal</label>
                    <div class="col-sm-8">
                      <input type="text" value="<?php echo date('Y-m-d H:i:s');?>" id="date" class="form-control" disabled/>
                      <input type="hidden" id="tanggal_transaksi" name="tanggal_transaksi" value="<?php echo date('Y-m-d H:i:s');?>" id="tanggal_transaksi" class="form-control"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label" for="category_id">Pembayaran</label>
                    <div class="col-sm-8">
                      <select name='metode_pembayaran' class="form-control" id="metode_pembayaran">
                        <option value='1'>Transfer Bank</option>
                        <option value='0'>COD</option>
                      </select>
                    </div>
                  </div>
                </div> 
                <div class="col-md-11 col-md-offset-1">
                  <h3 class="content-title">Informasi Barang</h3>
                  <div class="content-process">
                    <table class="table">
                      <thead>
                        <tr>
                          <td>Nama Barang</td>
                          <td>Jumlah</td>
                          <td>Harga Beli Satuan</td>
                          <td>Input Barang</td>
                        </tr>
                      </thead>
                      <tbody id="transaksi-item">
                        <tr>
                          <td>
                            <select class="form-control" id="produk" name="kode_produk">
                              <option value="0">
                                Please select one
                              </option>
                              <?php if(isset($produk) && is_array($produk)){?>
                                <?php foreach($produk as $item){?>
                                  <option value="<?php echo $item->kode_produk;?>">
                                    <?php echo $item->nama_produk;?>
                                  </option>
                                <?php }?>
                              <?php }?>
                            </select>
                          </td>
                          <td>
                            <input type="number" id="jumlah" class="form-control" name="jumlah" min="1" value="1"/>
                          </td>
                          <td>
                            <select class="form-control" id="sale_price" name="sale_price">
                              
                            </select>
                          </td>
                          <td>
                            <a href="#" class="btn btn-primary" id="tambah-barang">Input Barang</a>
                          </td>
                        </tr>
                        <?php if(!empty($carts) && is_array($carts)){?>
                            <?php foreach($carts['data'] as $k => $cart){?>
                              <tr id="<?php echo $k;?>" class="cart-value">
                                <td><?php echo $cart['name'];?></td>
                                <td><?php echo $cart['qty'];?></td>
                                <td>Rp<?php echo number_format($cart['price']);?></td>
                                <td><span class="btn btn-danger btn-sm transaksi-delete-item" data-cart="<?php echo $k;?>">x</span></td>
                              </tr>
                            <?php }?>
                        <?php }?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <td>Total Penjualan</td>
                          <td id="total-pembelian"><?php echo !empty($carts) ? 'Rp'.number_format($carts['total_price']) : '';?></td>
                        </tr>
                      </tfoot>
                      </tbody>
                     
                    </table>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="col-md-3 col-md-offset-4">
                  <a class="btn btn-default" href="<?php echo site_url('order');?>">Cancel</a>
                  <a class="btn btn-info pull-right" href="#" id="submit-transaksi">Submit</a>
                </div>
              </div>
              <!-- /.box-footer -->
            </form>
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
      <?php echo form_close(); ?>
      <!-- /.row -->
      <!-- END CUSTOM TABS -->
<script type="text/javascript">
  $(document).ready(function(){

      // ambil data produk dan harga
      $('body').on("change","#produk",function(){
        var url =  '<?php echo base_url(); ?>' + 'admin/order/check_product/' + this.value;
        //alert(url);
        var type1 = '';
        var type2 = '';
        var type3 = '';
        $("#sale_price").text("");
        $.get(url, function(data, status) {
            if(status == 'success' && data != 'false') {
                var value = $.parseJSON(data);
                var val = value[0];
                var sale_value = '<option value="' + val.harga_customer + '">' + parseInt(val.harga_customer) + ' Harga Customer</option>';
                if(val.harga_mitra != "0"){
                    var type1 = '<option value="' + val.harga_mitra + '">' + parseInt(val.harga_mitra) + ' Harga Mitra </option>';
                }
                if(val.harga_distributor != "0"){
                    var type2 = '<option value="' + val.harga_distributor + '">' + parseInt(val.harga_distributor) + ' Harga Distributor</option>';
                }
                $('#sale_price').append(sale_value+type1+type2);
            }
        });
      });
      //tambah chart
      $('body').on("click","#tambah-barang",function(){
        // alert("hai");
        var id_produk = $("#produk").val();
        var quantity = $("#jumlah").val();
        var sale_price = $("#sale_price").val();
        if($('#harga_satuan_net').length){
            sale_price = $('#harga_satuan_net').unmask();
        }
        //alert(id_produk)
        if(id_produk !== null && sale_price !== null){
            $.ajax({
                url: '<?php echo base_url(); ?>' + 'admin/order/add_item',
                data: {
                    'id_produk' : id_produk,
                    'quantity' : quantity,
                    'sale_price' : sale_price
                },
                type: 'POST',
                beforeSend : function(){
                    //$("body").faLoading();
                },
                success: function(data){
                    var res = $.parseJSON(data);
                    $(".cart-value").remove();
                    $.each(res.data, function(key,value) {
                        var row_2 = "";
                        if($('#harga_satuan_net').length){
                            //row_2 = "colspan='2'";
                        }
                        var display = '<tr class="cart-value" id="'+ key +'">' +
                                    '<td>'+ value.name +'</td>' +
                                    '<td>'+ value.qty +'</td>' +
                                    '<th '+row_2+'>Rp'+ value.subtotal +'</th>' +
                                    '<td><span class="btn btn-danger btn-sm transaksi-delete-item" data-cart="'+ key +'">x</span></td>' +
                                    '</tr>';
                        $("#transaksi-item tr:last").after(display);
                    });
                    $("#total-pembelian").text('Rp'+res.total_price);
                    $("#transaksi-item").find("input[type=text], input[type=number]").val("0");
                    //$("body").faLoading(false);
                    console.log(res);
                },
                // error: function(){
                //     alert('Something Error');
                // }
            });
        }else{
            alert("Silahkan isi semua box");
        }
        });
      //delete chart
      $(document).on("click",".transaksi-delete-item",function(e){
        var rowid = $(this).attr("data-cart");
        //$el.faLoading();
        $.get('<?php echo base_url(); ?>' + 'admin/order/delete_item/'+rowid,
            function(data,status){
                if(status == 'success'  && data != 'false'){
                    $("#"+rowid).remove();
                    console.log(data);
                    $("#total-pembelian").text('Rp'+data);
                    //$el.faLoading(false);
                }                
            }
        );
    });
      //add order
      $("#submit-transaksi").on('click',function(e){
        e.preventDefault();
        var status = false;
        var method = null;
        var arr = null;

        var kode_transaksi = $("#kode_transaksi").val();
        var supplier_id = $("#supplier_id").val();
        var status_id = $("#kode_transaksi").attr("data-attr");

        // Penjualan
        var penjualan = penjualan_status();
        if(penjualan[0] == true){
            status = penjualan[0];
            method = penjualan[1];
            arr = penjualan[2];
        }

        if(status == true) {
            $.ajax({
                url: $("#transaction-form").attr("action"),
                data: arr,
                type: 'POST',
                beforeSend: function () {
                    //$el.faLoading();
                },
                success: function (data) {
                    var response = $.parseJSON(data);
                    //$el.faLoading(false);
                    if(response.status == "ok"){
                        alert("sukses");
                        window.location.href = '<?php echo base_url('admin/order'); ?>';
                    }else if(response.status == "limit"){
                        alert("Stok jumlah produk yang anda pilih sudah habis");
                    }else{
                        alert("Terjadi error di server, silahkan coba lagi");
                    }
                }
            });
        }else{
            alert("Silahkan periksa kode transaksi atau supplier anda!");
        }
    });
      function penjualan_status(){
        var data = false;
        var kode_transaksi = $("#kode_transaksi").val();
        var id_pelanggan = $("#id_pelanggan").val();
        var metode_pembayaran = $("#metode_pembayaran").val();
        var tanggal_transaksi = $("#tanggal_transaksi").val();
        if(typeof kode_transaksi !== "undefined" && kode_transaksi != ""){
            var status = true;
            var method = "penjualan";
            var arr = {
                'kode_transaksi': kode_transaksi,
                'id_pelanggan': id_pelanggan,
                'metode_pembayaran' : metode_pembayaran,
                'tanggal_transaksi' : tanggal_transaksi
            };
            data = [status,method,arr];
        }
        return data;
    }

    });
</script>