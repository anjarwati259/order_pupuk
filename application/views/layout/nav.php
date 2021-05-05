 <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="index.html"><img src="<?php echo base_url() ?>/assets/templates/images/logo/AGI.png" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="<?php echo base_url('home') ?>">Beranda</a></li>
                        <li class="nav-item"><a class="nav-link" href="https://ptagi.co.id">Tentang Kami</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Order</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Kontak</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
                <?php 
				//check data belanjaan ada atau tidak
				$keranjang = $this->cart->contents();

				?>
                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="side-menu">
                        	<?php if($this->session->userdata('username')){ ?>
							<a href="#">
								<i class="fa fa-shopping-bag"></i>
								<span class="badge"><?php echo count($keranjang) ?></span>
								<p>My Cart</p>
							</a>
						<?php }else{ ?>
							<a href="#">
								<i class="fa fa-shopping-bag"></i>
								<span class="badge">0</span>
								<p>My Cart</p>
							</a>
						<?php } ?>
						</li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
                    	<?php 
						//kalau ga ada data belanjaan
						if(empty($keranjang)){ ?>
							<li class="header-cart-item">
								<p class="alert alert-success">Keranjang Belanja Kosong</p>
							</li>
						<?php 
						//kalau ada
						}else{
							
							//tampilkan data belanjaan
							foreach ($keranjang as $keranjang) {
								$kode_produk = $keranjang['id'];
								//ambil data product
								$productnya = $this->produk_model->detail($kode_produk)
							?>
                        <li>
                            <a href="#" class="photo"><img src="<?php echo base_url('assets/upload/image/thumbs/'.$productnya->gambar) ?>" alt="<?php echo $keranjang['name'] ?>" class="cart-thumb" alt="" /></a>
                            <h6><a href="<?php echo base_url('produk/detail/'.$productnya->kode_produk) ?>"><?php echo $keranjang['name'] ?> </a></h6>
                            <p><?php echo $keranjang['qty'] ?>x - <span class="price"> Rp. <?php echo number_format($keranjang['price'],'0',',','.') ?></span></p>
                        </li>
                        <?php }} ?>
                        <li class="total">
                            <a href="<?php echo base_url('belanja') ?>" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                            <span class="float-right"><strong>Total</strong>: <?php echo 'Rp. '.number_format($this->cart->total(), '0',',','.'); ?></span>
                        </li>
                    </ul>
                </li>
            </div>
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->