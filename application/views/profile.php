	
<div class="profile">
	<div class="row">
		abir
			<?php 
				if (isset($result)) 
				{
					//you forgot the foreach loop
					foreach ($result as $data) 
					{

			?>
				<div class="col-md-6">
					<ul class="list-group list-group-flush">

					  <li class="list-group-item"><label>USERNAME :</label> <?php echo $data->username;?></li>
					  <li class="list-group-item"><label>EMAIL :</label> <?php echo $data->email;?></li>
					  <li class="list-group-item"><label>CONTACT :</label> <?php echo $data->contact;?></li>
					  <li class="list-group-item"><label>ADDRESS :</label><?php echo $data->address;?></li>
					</ul>
					<br>
					<a href="#" class="btn btn-primary">Change</a>
					<a href="#" class="btn btn-primary">Logout</a>
				</div>
					
			<?php
					}

				}
		 	?>








		
		

			<!-- <div class="col-md-6">
				<div class="cardd text-center" style="width: 20rem;">
				  <img src="<?php  $data->photo;?>" class="card-img-top" alt="...">
				  <div class="card-body">
				    <a href="#" class="btn btn-primary">Change</a>
				    <a href="#" class="btn btn-primary">Delete</a>
				  </div>
				</div>
			</div -->
		
	</div>
</div>