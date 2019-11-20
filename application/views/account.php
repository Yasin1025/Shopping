	<div class="row">
		<div class="col-5 mx-auto mt-5">

			<div class="card mt-5">
				<div class="card-header">
					Create an account
				</div>
				<div class="card-body">
					<form method="post" action="<?php echo base_url('auth/ac_validation');?>">
						<div class="form-group">
							<label for="new_username">Create New Username</label>
							<input type="text" class="form-control" id="new_username" name="new_username" placeholder="New Username">	
							<span class="text-danger"><?php echo form_error('new_username'); ?>	</span>					
						</div>
						<div class="form-group">
							<label for="new_password">Create New Password</label>
							<input type="password" class="form-control" id="new_password" name="new_password" placeholder="New password">
							<span class="text-danger"><?php echo form_error('new_password'); ?>	</span>	
						</div>
						<div class="form-group form-check">
							<button type="submit" class="btn btn-success">Confirm</button>
							<button type="submit" class="btn btn-danger">Cancel</button>	
						</div>
						
					</form>
				</div>
			</div>
		</div>
	</div>