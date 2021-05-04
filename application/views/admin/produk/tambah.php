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
              <li role="presentation" class="active"><a href="#tab_1">Tambah Produk</a></li>
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
                          <input type="text" name="kode_produk" class="form-control" value="<?php echo set_value('kode_produk') ?>" placeholder="Kode Produk"/>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Nama Produk</label>
                        <div class="col-sm-8">
                          <input type="text" value="<?php echo set_value('nama_produk') ?>" name="nama_produk" placeholder="Nama Produk" class="form-control" required/>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Stok Produk</label>
                        <div class="col-sm-8">
                          <input type="text" value="<?php echo set_value('stok') ?>" name="stok" placeholder="Stok Produk" class="form-control" required/>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Berat Produk</label>
                        <div class="col-sm-8">
                          <input type="text" value="<?php echo set_value('berat') ?>" name="berat" placeholder="Berat Produk" class="form-control" required/>
                        </div>
                      </div>

                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Harga Customer</label>
                        <div class="col-sm-8">
                          <input type="text"  name="harga_customer" class="form-control" value="<?php echo set_value('harga_customer') ?>" placeholder="Harga Customer"/>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-4 control-label" for="no_hp">Harga Mitra</label>
                        <div class="col-sm-8">
                          <input type="text" value="" name="harga_mitra" value="<?php echo set_value('harga_mitra') ?>" class="form-control" placeholder="Harga Mitra"/>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-4 control-label" for="pembelian_awal">Harga Distributor</label>
                        <div class="col-sm-8">
                          <input type="text" value="" name="harga_distributor" value="<?php echo set_value('harga_distributor') ?>" class="form-control" placeholder="Harga Distributor"/>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                      <label class="col-md-2 control-label">Deskripsi</label>

                      <div class="col-md-10">
                        <textarea name="keterangan" class="form-control" placeholder="Keterangan" id="editor"><?php echo set_value('keterangan') ?></textarea>
                      </div>
                    </div>
                  <div class="form-group">
                    <label class="col-md-2 control-label">Upload Gambar</label>

                    <div class="col-md-10">
                      <input type="file" name="gambar" class="form-control" placeholder="Gambar Product" value="<?php echo set_value('gambar') ?>" required>
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
