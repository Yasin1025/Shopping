<!-- show product -->
<div class="row">
	<?php 
		if (isset($search_result)) 
		{
			foreach ($search_result as $data) 
			{
				
	?>
		
		<div class="col-md-3">
			<div class="card">
				
			    <img class="img-fluid" src="<?php echo base_url('upload/').$data->productPhoto;?>" alt="">
			    <span class="ami"><?php echo $data->productDescription;?><br><br>
			    	<p><span class="box-5">Product Code: <?php echo $data->productCode;?></span></p>
			    	<a href="<?php echo base_url('Buy/index')."/$data->id";?>" class="bb btn btn-success">
			    		Buy Now
			    	</a>
			    	<?php 
            			if ($this->session->userdata('logged_in')!='') 
           				{
         			 ?>
				    	<a class="pp btn btn-primary" href="<?php echo base_url("Buy/delete_product/").$data->id;?>">Delete</a>
					  	<a class="tt btn btn-primary" href="<?php echo base_url("Admin/updateform/").$data->id;?>">Update</a>
				  	<?php    
            			}
          			?>
			    </span>
			    <p><span class="box-5">Category: <?php echo $data->productCategory;?></span></p>
			    <button class="btn btn-warning"> Price: <?php echo $data->productPrice;?></button>	
			</div>
		</div>

	<?php

			}
		}
	 ?>
</div>



<div class="row">
			
	<?php 
		if (isset($result)) 
		{
			foreach ($result as $data) 
			{

	?>
	
		<div class="col-md-3">
			<div class="card">
				
			    <img class="img-fluid" src="<?php echo base_url('upload/').$data->productPhoto;?>" alt="">
			    <span class="ami"><?php echo $data->productDescription;?><br><br>
			    	<p><span class="box-5">Product Code: <?php echo $data->productCode;?></span></p>
			    	<a href="<?php echo base_url('Buy/index')."/$data->id";?>" class="bb btn btn-success">
			    		Buy Now
			    	</a>
			    	<?php 
            			if ($this->session->userdata('logged_in')!='') 
           				{
         			 ?>
				    	<a class="pp btn btn-primary" href="<?php echo base_url("Buy/delete_product/").$data->id;?>">Delete</a>
					  	<a class="tt btn btn-primary" href="<?php echo base_url("Admin/updateform/").$data->id;?>">Update</a>
				  	<?php    
            			}
          			?>
			    </span>
			    	
			    <p><span class="box-5">Category: <?php echo $data->productCategory;?></span></p>
			    <button class="btn btn-warning"> Price: <?php echo $data->productPrice;?></button>	

			</div>
		</div>

	<?php

			}
		}
	 ?>
</div>

<!-- Shop style -->