            <?php 
              //error upload
              if(isset($error)){
                echo '<p class="alert alert-warning">';
                echo $error;
                echo '</p>';
              }
              //Notifikasi error
              echo validation_errors('<div class = "alert alert-warning">','</div>');

              
               ?>
<!-- START CUSTOM TABS -->
      <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li><a href="#tab_1" data-toggle="tab">Tambah Data Customer</a></li>
              <li class="active"><a href="#tab_2" data-toggle="tab">Data Customer</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_2">
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Data Table With Full Features</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Bank</th>
                        <th>Nomor Rekening</th>
                        <th>Nama Pemilik</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php $no=1; foreach ($rekening as $rekening) { ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $rekening->nama_bank ?></td>
                        <td><?php echo $rekening->no_rekening ?></td>
                        <td><?php echo $rekening->nama_pemilik ?></td>
                        <td>
                         <a href="<?php echo base_url('admin/rekening/edit/'.$rekening->id_rekening) ?>" class="btn btn-warning btn-xs" ><i class="fa fa-edit"></i> Edit</a>
                          <a href="<?php echo base_url('admin/rekening/delete/'.$rekening->id_rekening) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" ><i class="fa fa-trash"></i> Hapus</a>
                        </td>
                      </tr>
                    <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_1">
                <?php 
                // Form open
              echo form_open_multipart(base_url('admin/rekening/tambah'), ' class="form-horizontal"');
                 ?>
                <form class="form-horizontal" method="POST">
                  <div class="box-body">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Nama Bank</label>
                        <div class="col-sm-8">
                          <input type="text" value="<?php echo set_value('nama_bank') ?>" name="nama_bank" placeholder="Nama Bank" class="form-control" required/>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-4 control-label" for="alamat">Nomor Rekening</label>
                        <div class="col-sm-8">
                          <input type="text" name="no_rekening" value="<?php echo set_value('no_rekening') ?>" placeholder="Nomor Rekening" class="form-control"/>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-4 control-label" for="alamat">Nama Pemilik</label>
                        <div class="col-sm-8">
                          <input type="text" name="nama_pemilik" value="<?php echo set_value('nama_pemilik') ?>" placeholder="Nama Pemilik" class="form-control"/>
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
                <?php echo form_close(); ?>
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
      <!-- /.row -->
      <!-- END CUSTOM TABS -->
