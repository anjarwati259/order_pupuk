
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
                <form id="transaction-form" class="form-horizontal" method="POST" action="">
              <div class="box-body">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label" for="kode">Kode Order</label>
                    <div class="col-sm-8">
                      <input type="text" name="kode_transaksi" value="<?php echo !empty($code_order) ? $code_order : '';?>" class="form-control" disabled/>
                      <input type="hidden" name="kode_transaksi" id="kode_transaksi" value="<?php echo !empty($code_order) ? $code_order : '';?>"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label" for="category_id">Customer</label>
                    <div class="col-sm-8">
                      <select class="form-control" id="customer_id" name="customer_id">
                        <?php if(isset($customers) && is_array($customers)){?>
                          <?php foreach($customers as $item){?>
                             <option value="<?php echo $item->nama_customer;?>" <?php if(!empty($order) && $item->nama_customer == $order[0]->nama_customer) echo 'selected="selected"';?>>
                              <?php echo $item->nama_customer;?>
                            </option>
                          <?php }?>
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
                      <input type="hidden" name="tanggal_transaksi" value="<?php echo date('Y-m-d H:i:s');?>" id="tanggal_transaksi" class="form-control"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label" for="category_id">Pembayaran</label>
                    <div class="col-sm-8">
                      <select class="form-control" id="is_cash" name="is_cash">
                        <option value="1" <?php if(!empty($order) && $order[0]->is_cash == true) echo 'selected="selected"';?>>
                          Cash
                        </option>
                        <option value="0" <?php if(!empty($order) && $order[0]->is_cash == false) echo 'selected="selected"';?>>
                          Bayar Nanti
                        </option>
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
                            <select class="form-control" id="produk" name="id_produk">
                              <option value="0">
                                Please select one
                              </option>
                              <?php if(isset($produk) && is_array($produk)){?>
                                <?php foreach($produk as $item){?>
                                  <option value="<?php echo $item->id_produk;?>">
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
                            <select class="form-control" id="sale_price" name="sale_price"></select>
                          </td>
                          <td>
                            <a href="#" class="btn btn-primary" id="tambah-barang">Input Barang</a>
                          </td>
                        </tr>
                        <?php if(!empty($carts) && is_array($carts)){?>
                            <?php foreach($carts['data'] as $k => $cart){?>
                              <tr id="<?php echo $k;?>" class="cart-value">
                                <!-- <td><?php echo $cart['category_name'];?></td> -->
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
                          <td>Total Order</td>
                          <td id="total-pembelian"><?php echo !empty($carts) ? 'Rp'.number_format($carts['total_price']) : '';?></td>
                        </tr>
                      </tfoot>
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