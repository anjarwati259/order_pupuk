 <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>SubTotal</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                //looping data keranjang belanja
                                foreach ($keranjang as $keranjang) {
                                    //ambil data produk
                                    $kode_produk = $keranjang['id'];
                                    $product    = $this->produk_model->detail($kode_produk);
                                    //$total        = $this->cart->total() * 100;
                                    //form update
                                    echo form_open(base_url('belanja/update_cart/'.$keranjang['rowid']));
                                 ?>
                                <tr>
                                    <td class="thumbnail-img">
                                        <a href="#">
									<img class="img-fluid" src="<?php echo base_url('assets/upload/image/thumbs/'.$product->gambar) ?>" alt="<?php echo $keranjang['name'] ?>" />
    								</a>
                                        </td>
                                        <td class="name-pr">
                                            <a href="#">
    									<?php echo $keranjang['name'] ?>
    								</a>
                                        </td>
                                        <td class="price-pr">
                                            <p><?php echo 'Rp. '.number_format($keranjang['price'],'0',',','.') ?></p>
                                        </td>
                                        <td class="quantity-box"><input type="number" size="4" name="qty" value="<?php echo $keranjang['qty'] ?>" min="0" step="1" class="c-input-text qty text"></td>
                                        <td class="total-pr">
                                            <p>Rp. 
                                            <?php 
                                            $sub_total = ($keranjang['price'] * $keranjang['qty']);
                                            echo number_format($sub_total,'0',',','.');
                                             ?>
                                                 
                                             </p>
                                        </td>
                                        <td class="remove-pr">
                                            <a href="#">
    									<i class="fas fa-times"></i>
        								</a>
                                        <button type="submit" class="btn btn-default" name="update">
                                            <i class="fa fa-edit"></i> Update
                                        </button>
                                        </td>
                                        <?php 
                                            //echo form close
                                                echo form_close();
                                            //end looping
                                                }
                                            
                                             ?>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td colspan="2" class="name-pr"><a>Total Belanja :</a></td>
                                    <td colspan="2"class="name-pr"><a><?php echo 'Rp. '.number_format($this->cart->total(), '0',',','.'); ?></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-6 col-sm-6">
                    
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="update-box">
                        <a href="<?php echo base_url('belanja/checkout') ?>" class="btn btn-check">checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart -->