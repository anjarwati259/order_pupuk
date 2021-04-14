End Topbar -->
		<div class="middle-inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-12">
						<!-- Logo -->
						<div class="logo">
							<a href="index.html"><img src="<?php echo base_url() ?>assets/template/images/logo/logo AGI.png" alt="logo"></a>
						</div>
						<!--/ End Logo -->
						<!-- Search Form -->
						<div class="search-top">
							<div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
							<!-- Search Form -->
							<div class="search-top">
								<form class="search-form">
									<input type="text" placeholder="Search here..." name="search">
									<button value="search" type="submit"><i class="ti-search"></i></button>
								</form>
							</div>
							<!--/ End Search Form -->
						</div>
						<!--/ End Search Form -->
						<div class="mobile-nav"></div>
					</div>
					<div class="col-lg-8 col-md-7 col-12">
						<div class="search-bar-top">
							<div class="search-bar">
								<form>
									<input name="search" placeholder="Search Products Here....." type="search">
									<button class="btnn"><i class="ti-search"></i></button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-3 col-12">
						<!-- mulai disini -->
						<div class="right-bar">
							<div class="sinlge-bar">
								<a href="<?php echo base_url('masuk/logout') ?>" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"> Logout</i></a>
							</div>
								<?php 
							//check data belanjaan ada atau tidak
							$keranjang = $this->cart->contents();
							?>
							<div class="sinlge-bar shopping">
								<a href="#" class="single-icon"><i class="ti-bag"></i> <span class="total-count"><?php echo count($keranjang) ?></span></a>
								<!-- Shopping Item -->
								<div class="shopping-item">
									<div class="dropdown-cart-header">
										<span><?php echo count($keranjang) ?> Item</span>
										<a href="#">View Cart</a>
									</div>
									<ul class="shopping-list">
										<?php 
										//kalau ga ada data belanjaan
										if(empty($keranjang)){ ?>
											<li class="header-cart-item">
												<p class="alert alert-success">Keranjang Belanja Kosong</p>
											</li>
										<?php 
										}else{
										foreach ($keranjang as $keranjang) { 
											$kode_produk = $keranjang['id'];
											//ambil data product
											$produknya = $this->produk_model->detail($kode_produk)
										?>
										<li>
											<a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
											<a class="cart-img" href="#"><img src="<?php echo base_url('assets/upload/image/thumbs/'.$produknya->gambar) ?>" alt="<?php echo $keranjang['name'] ?>"></a>
											<h4><a href="#"><?php echo $keranjang['name'] ?></a></h4>
											<p class="quantity"><?php echo $keranjang['qty'] ?>x - <span class="amount">Rp. <?php echo number_format($keranjang['price'],'0',',','.') ?></span></p>
										</li>
									<?php }} ?>
									</ul>
									<div class="bottom">
										<div class="total">
											<span>Total</span>
											<span class="total-amount"><?php echo 'Rp. '.number_format($this->cart->total(),'0',',','.'); ?></span>
										</div>
										<a href="checkout.html" class="btn animate">Checkout</a>
									</div>
								</div>
								<!--/ End Shopping Item -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Header Inner -->
		<div class="header-inner">
			<div class="container">
				<div class="cat-nav-head">
					<div class="row">
						<div class="col-lg-9 col-12">
							<div class="menu-area">
								<!-- Main Menu -->
								<nav class="navbar navbar-expand-lg">
									<div class="navbar-collapse">	
										<div class="nav-inner">	
											<ul class="nav main-menu menu navbar-nav">
													<li><a href="#">Home</a></li>
													<li class="active"><a href="#">Order</a></li>												
													<li><a href="#">Produk</a></li>
												</ul>
										</div>
									</div>
								</nav>
								<!--/ End Main Menu -->	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Header Inner -->
	</header>
	<!--/ End Header