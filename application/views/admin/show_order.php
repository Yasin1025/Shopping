<!-- show order -->
<div class="profile">
	<div class="row">
		<div class="col-md-12 text-center">
			<h4><b>Order info</b></h4><hr>
		</div>
	</div>
	<div class="row">
	 	<?php 
			if (isset($result)) 
			{
				foreach ($result as $row) 
				{
		?>
					<?php
						if(isset($success))
						{
					?>
							<div class="alert alert-danger">
								<?=$success;?>
							</div>
					<?php
						}
					?>
					
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
				<div class="col-md-3">
			
					<ul class="list-group list-group-flush">

						<li class="list-group-item"><label>Product Code :</label><?php echo $row->buy_code?></li>

						<li class="list-group-item"><label>NAME :</label> <?php echo $row->buy_username;?></li>
						  
						<li class="list-group-item"><label>CONTACT :</label> <?php echo $row->buy_contact;?></li>
						
						<li class="list-group-item"><label>ADDRESS :</label><?php echo $row->buy_location?></li>
					</ul>
					<br>
					<a href='<?php echo base_url("Admin/delete_order/").$row->id;?>' class="btn btn-danger"> delete </a>
				</div>					
		<?php
				}
			}
	 	?>

	 	<!-- new ordar style -->


	</div>
</div>