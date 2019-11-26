<div class="shart-wrapper">
 <div class="container">
 	<div class="box-7">
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
					    <span class="ami"><?php echo $data->productDescription;?><br>
					    	<a href="<?php echo base_url('Buy/cart');?>" class="mt-13">
					    		<button type="button" class="btn btn-light col-12">BUY NOW</button>
					    	</a>
					    </span>
					    	
					    <p><i class="ti-tumblr-alt  mr-3"></i><span class="box-5"><?php echo $data->productPrice;?></span></p>
					    <button type="button" class="btn btn-dark"> Category: <?php echo $data->productCategory;?></button>
					</div>
				</div>

			<?php

					}
				}
			 ?>
 	    </div>
    </div>
</div>
 

 <script>	 new WOW().init();  </script>