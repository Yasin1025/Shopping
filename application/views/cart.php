<!-- for buy -->
<div class="main-cart">
	<div class="container">
		<div class="row">
			<?php 
				if (isset($picture))
				{
					foreach ($picture as $data) 
					{
						$pic = $data->productPhoto;
					}
				}
			?>
			<div class="col-md-6">
				<img class="img-fluid" src="<?php echo base_url('upload/').$pic;?>">
			</div>
			<div class="col-md-6">
				<form method="post" enctype="multipart/form-data" action="<?php echo base_url('Buy/cart_validation');?>">
					<div class="form-row">
					    <div class="form-group col-md-6">
					      <input type="text" class="form-control" name="buy_username" placeholder="Name">
					      <span class="text-danger"><?php echo form_error('buy_username'); ?></span>
					    </div>
					    <div class="form-group col-md-6">
					      <input type="number" class="form-control" name="buy_contact"  placeholder="Contuct Number">
					      <span class="text-danger"><?php echo form_error('buy_contact'); ?></span>
					    </div>
					</div>
					<div class="form-group">
					  	<label>Location:</label>
					     <textarea class="form-control" rows="3" name="buy_location" placeholder="Enter Your Address"></textarea>
					     <span class="text-danger"><?php echo form_error('buy_location'); ?></span>
					</div>
					<div class="form-row">
					    <div class="form-group col-md-4">
					      <select id="inputState" name="buy_size" class="form-control">
					        <option selected="Size"> Size </option>
					        <option>Xl</option>
					        <option>M</option>
					        <option>L</option>
					        <option>s</option>
					      </select>
					    </div>
					    <div class="form-group col-md-4">
					      <select id="inputState" name="buy_contity" class="form-control">
					        <option selected>contity</option>
					        <option>1</option>
					        <option>2</option>
					        <option>3</option>
					        <option>4</option>
					        <option>5</option>
					      </select>
					    </div>
					</div>
					<div class="form-group col-md-6">
				      <input type="text" class="form-control" name="buy_code"  placeholder="Product Code">
				      <span class="text-danger"><?php echo form_error('buy_code'); ?></span>
					</div>
				    	<button type="submit" class="btn btn-primary">Buy</button>
				</form>
			</div>
		</div>

		<!-- new Cart form -->


		


	</div>
</div>