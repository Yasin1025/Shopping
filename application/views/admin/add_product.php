<!-- add product form -->
<div class="main-cart">
	<div class="container">
		<div class="product_header">
	        <h3>Add Product</h3>
	        <hr>
      	</div>
			<div class="col-md-12">
				<?php 
				  		if (isset($singledata)) 
				  		{
				  			foreach ($singledata as $data) 
				  			{
				  				$id = $data->id;
				  				$product_category = $data->productCategory;
								$product_price = $data->productPrice;
								$product_description = $data->productDescription;
								$product_size = $data->productSize;
								$product_code = $data->productCode;
				  			}
				  		}
				  		if (isset($update) && $update == "ok") 
				  		{
				  	?>
				  			<form method="post" enctype="multipart/form-data" action="<?php echo base_url('Admin/up_validation');?>">
				  	<?php

				  		}
				  		else
				  		{
				  	?>
				  		<form method="post" enctype="multipart/form-data" action="<?php echo base_url('Admin/product_validation');?>">
				  	<?php

				  		}
				  	?>

					<div class="form-row">
					    <div class="form-group col-md-6">
					      <input type="text" class="form-control" name="product_category" placeholder="Product Category"  <?php if(isset($product_category)){echo 'value="'.$product_category.'"';}?>>
					      <span class="text-danger"><?php echo form_error('product_category'); ?></span>
					    </div>
					    <div class="form-group col-md-6">
					      <input type="number" class="form-control" name="product_price"  placeholder="Product price" <?php if(isset($product_price)){echo 'value="'.$product_price.'"';}?>>
					      <span class="text-danger"><?php echo form_error('product_price'); ?></span>
					    </div>
					</div>

					<div class="form-group">
					  	<label>Description:</label>
					    <textarea class="form-control" rows="3" name="product_description" placeholder="Enter Product Description" <?php if(isset($product_description)){echo 'value="'.$product_description.'"';}?>></textarea>
					    <span class="text-danger"><?php echo form_error('product_description'); ?></span>
					</div>

					<div class="form-row">
					    <div class="form-group col-md-4">
					      <select id="inputState" name="product_size" class="form-control"<?php if(isset($product_size)){echo 'value="'.$product_size.'"';}?>>
					        <option selected="Available size"> Available Size </option>
					        <option>Xl</option>
					        <option>M</option>
					        <option>L</option>
					        <option>s</option>
					      </select>
					    </div>
		               	<div class="form-group col-md-8">
			                <input type="file"  name="product_photo" class="form-control-file" id="pic" <?php if(isset($product_photo)){echo 'value="'.$product_photo.'"';}?>>
			                <label for="pic">Product Picture</label>
			                <span class="text-danger"><?php echo form_error('product_photo');?></span>
		              	</div>
		              	<div class="form-group col-md-6">
					      <input type="text" class="form-control" name="product_code"  placeholder="Product Code" <?php if(isset($product_code)){echo 'value="'.$product_code.'"';}?>>
					      <span class="text-danger"><?php echo form_error('product_code'); ?></span>
					    </div>
		              	<input type="hidden" name="id" <?php if(isset($id)){echo 'value="'.$id.'"';}?>>
					</div>
			       <button type="submit" class="btn btn-success">Add</button>
				</form>
			</div>
		</div>
	</div>
</div>