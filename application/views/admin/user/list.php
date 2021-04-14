<!-- START CUSTOM TABS -->
      <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li><a href="#tab_1" data-toggle="tab">Tambah Data Pengguna</a></li>
              <li class="active"><a href="#tab_2" data-toggle="tab">Data Pengguna</a></li>
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
                        <th>Nama Pengguna</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Hak Akses</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php $no=1; foreach ($user as $user) { ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $user->nama_user ?></td>
                        <td><?php echo $user->username ?></td>
                        <td><?php echo $user->password ?></td>
                        <td>
                          <?php if($user->hak_akses==1){
                            echo "Admin";
                          }else if($user->hak_akses==2){
                            echo "Mitra";
                          }else if($user->hak_akses==3){
                            echo "Distributor";
                          }else{
                            echo "Customer";
                          } ?>
                        </td>
                        <td>
                          <a href="<?php echo base_url('admin/product/edit/') ?>" class="btn btn-warning btn-xs" ><i class="fa fa-edit"></i> Edit</a>
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
                <div class="row">
                  <div class="col-md-12">
                    <div class="box box-info">
                      <div class="box-header with-border">
                        <h3 class="box-title">Horizontal Form</h3>
                      </div>
                      <!-- /.box-header -->
                      <!-- form start -->
                      <div class="col-md-6">
                        <form class="form-horizontal">
                          <div class="box-body">
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                              <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                              <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-sm-offset-2 col-sm-10">
                                <div class="checkbox">
                                  <label>
                                    <input type="checkbox"> Remember me
                                  </label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- /.box-body -->
                          <div class="box-footer">
                            <button type="submit" class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-info pull-right">Sign in</button>
                          </div>
                          <!-- /.box-footer -->
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
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