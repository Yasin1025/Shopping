<div class="l-login">
	<div class="row">
		<div class="col-5 mx-auto mt-5">
			<?php
				if(isset($error))
				{
					?>
						<div class="alert alert-danger">
							<?=$error;?>
						</div>
					<?php
				}
			?>

			<div class="card mt-5">
				<div class="card-header">
					Login to Dashboard
				</div>
				<div class="card-body">
					<form method="post" action="<?php echo base_url('auth/login_validation');?>">
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" class="form-control" id="username" name="username" placeholder="jamesJalil008">	
							<span class="text-danger"><?php echo form_error('username'); ?>	</span>					
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" id="password" name="password" placeholder="********">
							<span class="text-danger"><?php echo form_error('password'); ?>	</span>	
						</div>
						<div class="form-group form-check">
							<input type="checkbox" class="form-check-input" id="rem" name="rem">
							<label class="form-check-label" for="rem">Remember me for 30 days!</label>
						</div>
						<button type="submit" class="btn btn-primary">Login</button><br/><br/>
						<a href="<?php echo base_url('Auth/account');?>">Create New Account</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>	