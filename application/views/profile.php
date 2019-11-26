<!-- show profile -->
<div class="profile">
	<div class="row">
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
				</div>


				<div class="col-md-6">
					<div class="cardd text-center" style="width: 20rem;">
					  <img src="<?=base_url('upload/').$data->photo;?>" class="card-img-top" alt="...">
					  
					  <div class="card-body">
					    <a href='<?php echo base_url("Auth/updateprofile/").$data->id;?>' class="mt-13"> 
			    			<button type="button" class="btn btn-info col-12">EDIT YOUR PROFILE</button>
			    		</a><br/><br/>
					    <a href='<?php echo base_url("Auth/delete_account/").$data->id;?>' class="btn btn-danger"> DELETE YOUR ACCOUNT </a>
					  </div>
					</div>
				</div>
						
			<?php
					}

				}
		 	?>


		 	<!-- new profile card style -->

		 	
	
	</div>
</div>