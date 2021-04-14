
<!-- START CUSTOM TABS -->
      <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li role="presentation"><a href="<?php echo site_url('admin/produk/tambah');?>">Tambah Produk</a></li>
              <li role="presentation" class="active"><a href="#tab_1">Data Produk</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
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
                        <th>Kode Produk</th>
                        <th>Nama Produk</th>
                        <th>Stok</th>
                        <th>Harga Customer</th>
                        <th>Harga Mitra</th>
                        <th>Harga Distributor</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php $no=1; foreach ($produk as $produk) { ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $produk->kode_produk ?></td>
                        <td><?php echo $produk->nama_produk ?></td>
                        <td><?php echo $produk->stok ?></td>
                        <td><?php echo $produk->harga_customer ?></td>
                        <td><?php echo $produk->harga_mitra ?></td>
                        <td><?php echo $produk->harga_distributor ?></td>
                        <td>
                          <a href="<?php echo base_url('admin/produk/edit/'.$produk->kode_produk) ?>" class="btn btn-warning btn-xs" ><i class="fa fa-edit"></i> Edit</a>
                          <a href="<?php echo base_url('admin/produk/delete/'.$produk->kode_produk) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" ><i class="fa fa-trash"></i> Hapus</a>
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
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- END CUSTOM TABS -->