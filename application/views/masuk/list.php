<!-- Shopping Cart -->
<div class="shopping-cart section">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<?php 
				//display error
				echo validation_errors('<div class="alert alert-warning">','</div>');
				//Display notifikasi error login
				if($this->session->flashdata('warning')){
					echo '<div class="alert alert-warning">';
					echo $this->session->flashdata('warning');
					echo '</div>';
				}
				//form open
				echo form_open(base_url('masuk'),'class="leave-comment"'); ?>
				<table class="table">
					<tbody>
						<tr>
							<td>Username</td>
							<td><input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo set_value('username') ?>" required></td>
						</tr>
						<tr>
							<td>Password</td>
							<td><input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>" required></td>
						</tr>
						<tr>
							<td></td>
							<td>
								<button class="btn btn-success btn-lg" type="submit">
									<i class="fa fa-save"></i> Login
								</button>
								<button class="btn btn-default btn-lg" type="reset">
									<i class="fa fa-times"></i> Reset
								</button>
							</td>
						</tr>
					</tbody>
				</table>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>