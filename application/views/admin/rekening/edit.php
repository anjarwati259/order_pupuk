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
echo form_open_multipart(base_url('admin/rekening/edit/'.$rekening->id_rekening), ' class="form-horizontal"');
 ?>
<!-- START CUSTOM TABS -->
      <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li role="presentation" class="active"><a href="#tab_1">Edit Customer</a></li>
            <li role="presentation"><a href="<?php echo site_url('admin/pelanggan');?>">Data Customer</a></li>
            </ul>
            <div class="tab-content">
              <!-- /.tab-pane -->
              <div class="tab-pane active" id="tab_1">
                <form class="form-horizontal" method="POST">
                  <div class="box-body">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Nama Bank</label>
                        <div class="col-sm-8">
                          <input type="text" value="<?php echo $rekening->nama_bank ?>" name="nama_bank" placeholder="Nama Bank" class="form-control" required/>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-4 control-label" for="alamat">Nomor Rekening</label>
                        <div class="col-sm-8">
                          <input type="text" name="no_rekening" value="<?php echo $rekening->no_rekening ?>" placeholder="Nomor Rekening" class="form-control"/>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-4 control-label" for="alamat">Nama Pemilik</label>
                        <div class="col-sm-8">
                          <input type="text" name="nama_pemilik" value="<?php echo $rekening->nama_pemilik ?>" placeholder="Nama Pemilik" class="form-control"/>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <div class="col-md-3 col-md-offset-4">
                      <a href="<?php echo base_url('admin/rekening') ?>" class="btn btn-default">Cancel</a>
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
