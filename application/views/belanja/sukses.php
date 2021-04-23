<div class="contact-box-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="contact-form-right">
                    <h2 style="text-align: center;"><?php echo $title ?></h2>
                </div>
            </div>
            <div class="col-lg-12 col-sm-12">
            	<?php if($this->session->flashdata('sukses')){
				echo '<div class="alert alert-warning">';
				echo $this->session->flashdata('sukses');
				echo '</div>';
			} ?>

			<p class="alert alert-success" style="text-align: center;">
				Terimakasih, barang yang sudah anda beli akan segera kami proses
			</p>
            </div>
        </div>
    </div>
</div>