	<div class="row">
		<div class="col-md-8 mx-auto pt-5">
			<div class="f-form">
				<form method="post" action="<?php echo base_url('Dash/add_validation')?>">
					<div class="form-group">
					    <label for="title">News Title</label>
					    <input type="text" name="title" class="form-control" id="title" placeholder="Title of News">
					    <span class="text-danger"><?php echo form_error('title'); ?>	</span>
					 </div>
					 <div class="form-group">
					    <label for="category">News Category</label>
					    <input type="text" name="category" class="form-control" id="category" placeholder="Category of News">
					    <span class="text-danger"><?php echo form_error('category'); ?>	</span>
					 </div>

					 <div class="form-group">
					    <label for="details">News Details</label>
					    <textarea class="form-control" name="details" id="details" placeholder="Habi Jabi"></textarea>
					    <span class="text-danger"><?php echo form_error('category'); ?>	</span>
					 </div>

					 <div class="form-group text-center">
					   	<button type="submit" class="btn btn-success">Add</button>
						<button type="reset" class="btn btn-danger">cancel</button>
					 </div>
				</form>
			</div>
		</div>
	</div>
	
