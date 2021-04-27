<!-- Start Products  -->
    <div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Produk & Promo</h1>
                    </div>
                </div>
            </div>

            <div class="row special-list">
            	<?php foreach ($produk as $produk) { ?>
                <div class="col-lg-3 col-md-6 special-grid best-seller">
                	<?php 
						//form untuk memproses belanjaan
						echo form_open(base_url('belanja/add')); 
						//elemen yang dibawa
						echo form_hidden('id', $produk->kode_produk);
                        if($this->session->userdata('hak_akses')=='2'){
						echo form_hidden('qty', 260);
						echo form_hidden('price', $produk->harga_distributor);
                    }else if($this->session->userdata('hak_akses')=='3'){
                        echo form_hidden('qty', 20);
                        echo form_hidden('price', $produk->harga_mitra);
                    }
						echo form_hidden('name', $produk->nama_produk);
						//elemen redirect
						echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
					?>
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                                <p class="sale">Sale</p>
                            </div>
                            <img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>" class="img-fluid" alt="Image">
                            <div class="mask-icon">
                                <button class="btn cart">Add to Cart</button>
                            </div>
                        </div>
                        <div class="why-text">
                            <h4><?php echo $produk->nama_produk ?></h4>
                            <h5>Rp. <?php echo number_format($produk->harga_mitra,'0',',','.') ?></h5>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
    <!-- End Products  -->
	
	<div class="box-add-products">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="offer-box-products">
						<img class="img-fluid" src="<?php echo base_url() ?>/assets/templates/images/add-img-01.jpg" alt="" />
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="offer-box-products">
						<img class="img-fluid" src="<?php echo base_url() ?>/assets/templates/images/add-img-02.jpg" alt="" />
					</div>
				</div>
			</div>
		</div>
	</div>

    <!-- Start Instagram Feed  -->
    <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            <div class="item">
                <div class="ins-inner-box">
                    <img src="<?php echo base_url() ?>/assets/templates/images/instagram-img-01.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="<?php echo base_url() ?>/assets/templates/images/instagram-img-02.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="<?php echo base_url() ?>/assets/templates/images/instagram-img-03.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="<?php echo base_url() ?>/assets/templates/images/instagram-img-04.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="<?php echo base_url() ?>/assets/templates/images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="<?php echo base_url() ?>/assets/templates/images/instagram-img-06.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="<?php echo base_url() ?>/assets/templates/images/instagram-img-07.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="<?php echo base_url() ?>/assets/templates/images/instagram-img-08.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="<?php echo base_url() ?>/assets/templates/images/instagram-img-09.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="<?php echo base_url() ?>/assets/templates/images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Instagram Feed  -->