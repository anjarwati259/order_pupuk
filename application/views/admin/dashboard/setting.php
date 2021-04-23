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
echo form_open_multipart(base_url('admin/dashboard/setting'), ' class="form-horizontal"');

 ?>
<!-- START CUSTOM TABS -->
      <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li role="presentation" class="active"><a href="#tab_1">Setting Lokasi</a></li>
            </ul>
            <?php 
//notifikasi
if($this->session->flashdata('sukses')){
  echo '<p class="alert alert-success">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
 }
 ?>
            <div class="tab-content">
              <!-- /.tab-pane -->
              <div class="tab-pane active" id="tab_1">
                <form class="form-horizontal" method="POST">
                  <div class="box-body">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Provinsi</label>
                        <div class="col-sm-8">
                         <select class="form-control" name="provinsi">
                           
                         </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Nama Toko</label>
                        <div class="col-sm-8">
                          <input type="text" value="<?php echo $setting->nama_toko ?>" name="nama_toko" placeholder="Nama Produk" class="form-control" required/>
                        </div>
                      </div>

                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Kabupaten/Kota</label>
                        <div class="col-sm-8">
                          <select class="form-control" name="kota">
                           <option value="<?php echo $setting->lokasi ?>"><?php echo $setting->lokasi ?></option>
                         </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-4 control-label" for="no_hp">No. Handphone</label>
                        <div class="col-sm-8">
                          <input type="text" name="no_telp" value="<?php echo $setting->no_telp ?>" class="form-control"/>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-2 control-label">Alamat</label>

                    <div class="col-md-10">
                      <input type="text" name="alamat_toko" value="<?php echo $setting->alamat_toko ?>" class="form-control" />
                    </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <div class="col-md-3 col-md-offset-4">
                      <a href="<?php echo base_url('admin/dashboard') ?>" class="btn btn-default">Cancel</a>
                      <button class="btn btn-info pull-right" type="submit">Save</button>
                    </div>
                  </div>
                  
                  <!-- /.box-footer -->
                </form>
                <?php echo form_close() ?>
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
      var id_provinsi = $("option:selected", this).attr('id_provinsi');
      $.ajax({
      type: "POST",
      url: "<?php echo base_url('rajaongkir/kota') ?>",
      data: 'id_provinsi=' + id_provinsi,
      success: function(hasil_kota){
        //console.log(hasil_kota);
        $("select[name=kota]").html(hasil_kota);
      }
    });
    });
  });
</script>
