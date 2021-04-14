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
echo form_open_multipart(base_url('admin/produk/edit/'.$produk->kode_produk), ' class="form-horizontal"');
 ?>
<!-- START CUSTOM TABS -->
      <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li role="presentation" class="active"><a href="#tab_1">Edit Produk</a></li>
              <li role="presentation"><a href="<?php echo site_url('admin/produk');?>">Data Produk</a></li>
            </ul>
            <div class="tab-content">
              <!-- /.tab-pane -->
              <div class="tab-pane active" id="tab_1">
                <form class="form-horizontal" method="POST">
                  <div class="box-body">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Kode Produk</label>
                        <div class="col-sm-8">
                          <input type="text" name="kode_produk" class="form-control" value="<?php echo $produk->kode_produk ?>" placeholder="Kode Produk" disabled/>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Nama Produk</label>
                        <div class="col-sm-8">
                          <input type="text" value="<?php echo $produk->nama_produk ?>" name="nama_produk" placeholder="Nama Produk" class="form-control" required/>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Stok Produk</label>
                        <div class="col-sm-8">
                          <input type="text" value="<?php echo $produk->stok ?>" name="stok" placeholder="Stok Produk" class="form-control" required/>
                        </div>
                      </div>

                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Harga Customer</label>
                        <div class="col-sm-8">
                          <input type="text" name="harga_customer" class="form-control" value="<?php echo $produk->harga_customer ?>" placeholder="Harga Customer"/>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-4 control-label" for="no_hp">Harga Mitra</label>
                        <div class="col-sm-8">
                          <input type="text" name="harga_mitra" value="<?php echo $produk->harga_mitra ?>" class="form-control" placeholder="Harga Mitra"/>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-4 control-label" for="pembelian_awal">Harga Distributor</label>
                        <div class="col-sm-8">
                          <input type="text" name="harga_distributor" value="<?php echo $produk->harga_distributor ?>" class="form-control" placeholder="Harga Distributor"/>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                      <label class="col-md-2 control-label">Deskripsi</label>

                      <div class="col-md-10">
                        <textarea name="keterangan" class="form-control" placeholder="Keterangan" id="editor"><?php echo $produk->keterangan ?></textarea>
                      </div>
                    </div>
                  <div class="form-group">
                    <label class="col-md-2 control-label">Upload Gambar</label>

                    <div class="col-md-10">
                      <input type="file" name="gambar" class="form-control" placeholder="Gambar Product" value="<?php echo set_value('gambar') ?>">
                    </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <div class="col-md-3 col-md-offset-4">
                      <a href="<?php echo base_url('admin/produk') ?>" class="btn btn-default">Cancel</a>
                      <button class="btn btn-info pull-right" type="submit">Save</button>
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

      // ambil data kabupaten ketika data memilih provinsi
      $('body').on("change","#form_prov",function(){
        var id = $(this).val();
        var data = "id="+id+"&data=kabupaten";
        $.ajax({
          type: 'POST',
          url: "<?php echo base_url('wilayah/get_wilayah'); ?>",
          data: data,
          success: function(hasil) {
             $("#form_kab").html(hasil);
            //alert("sukses");
          }
        });
      });

      // ambil data kecamatan/kota ketika data memilih kabupaten
      $('body').on("change","#form_kab",function(){
        var id = $(this).val();
        var data = "id="+id+"&data=kecamatan";
        $.ajax({
          type: 'POST',
          url: "<?php echo base_url('wilayah/get_wilayah'); ?>",
          data: data,
          success: function(hasil) {
            $("#form_kec").html(hasil);
          }
        });
      });

       //get provinsi
      $('body').on("change","#form_prov",function(){
        var id=$(this).val();
        $.ajax({
            type : "POST",
            url  : "<?php echo base_url('wilayah/getprov'); ?>",
            dataType : "JSON",
            data : {id: id},
            cache:false,
            success: function(data){
                $.each(data,function(nama){
                    $('[name="prov"]').val(data.nama);
                     
                });
                 
            }
        });
        return false; 
      });

      //get kabupaten
    $('body').on("change","#form_kab",function(){
        var datakab = $("option:selected", this).attr('datakab');
          $("input[name=kab]").val(datakab);
      });
    //get kecamatan
    $('body').on("change","#form_kec",function(){
        var datakec = $("option:selected", this).attr('datakec');
          $("input[name=kec]").val(datakec); 
      });
    });
</script>
