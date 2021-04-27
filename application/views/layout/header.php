<!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="right-phone-box">
                        <p>Call US :- <a href="#">  +6281 335 005 334 </a></p>
                    </div>
                    <div class="our-link">
                        <ul>
                        	<?php if(($this->session->userdata('username')) && ($this->session->userdata('hak_akses')!='1')){ ?>
                            <li><a href="<?php echo base_url('home/dashboard') ?>"><i class="fa fa-user s_color"></i> My Account</a></li>
                            <li><a href="<?php echo base_url('login/logout') ?>"><i class="fas fa-sign-in-alt"></i> Logout</a></li>
                        <?php }else{ ?>
                        	<li><a href="<?php echo base_url('masuk') ?>"><i class="fa fa-user s_color"></i> My Account</a></li>
                            <li><a href="#"><i class="fas fa-user-lock"></i> Register</a></li>
                            <li><a href="<?php echo base_url('login') ?>"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                        <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->