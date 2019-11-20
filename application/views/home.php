	
	<div class="row">
		<div class="col-8 mx-auto pt-5">
			<div class="search-form">
				<form method="post" action="<?php echo base_url('Main/search');?>">
					<div class="form-group">
					    
					    <input type="search" class="form-control" id="search" name="search"  placeholder="Search here...">
					 </div>

					 <div class="form-group text-center">
					   	<button type="submit" class="btn btn-success">Search</button>
					 </div>
				</form>
			</div>
		</div>
	</div>


	<!-- <div class="row">
		<div class="col-12">
			<?php 
				// if (isset($search_result)) 
				// {
				// 	foreach ($search_result as $data) {
				// 		echo $data->title."<br>".$data->details." <br>".$data->created."<br>";
				// 	}
				//}
			 ?>
		</div>
	</div> -->

	<div class="row">
		<div class="col-5">
			<?php 
				if (isset($search_result)) 
				{
					foreach ($search_result as $data) 
					{

			?>
						<div class="card">
							<div class="card-header">
								<?php echo $data->title;?>	
							</div>

							<div class="card-body">
								<?php echo $data->details;?><br/>
								<span class="text-center"><?php echo $data->created;?></span>
							</div>
						</div>
			<?php

					}
				}
			 ?>
		</div>
	</div>
	
	<div class="row">
			<?php 
				if (isset($result)) 
				{
					foreach ($result as $data) 
					{

			?>
					<div class="col-6">
						<div class="card">
							<div class="card-header">
								<?php echo $data->title;?>	<br>
								<span class="text-center"><?php echo $data->created;?></span><br>
							</div>

							<div class="card-body">
								<?php echo $data->details;?><br/>
								
								<a href="#">Read more>>></a>
							</div>
						</div>
					</div>
			<?php

					}
				}
			 ?>
	</div>