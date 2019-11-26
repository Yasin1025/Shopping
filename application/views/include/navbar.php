
<!-- navbar -->

<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
  <a class="navbar-brand" href="<?php echo base_url('Main/index');?>">DOYEL SHOPPING</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('main/index');?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('Buy/shop');?>">Shop Now</a>
      </li>
          <?php 
            if ($this->session->userdata('logged_in')!='') 
            {
          ?>
            <li class="nav-item">
              <a class="nav-link" data-toggle="modal" data-target="#covermodel" href="#">Sign up</a>
            </li>

          <?php    
            }
          ?>
        <?php 
            if (!$this->session->userdata('logged_in')) 
            {
        ?>
          <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#exampleModalCenter" href="#">Sign in</a>
          </li>
        <?php    
            }
        ?>

      
      </a>
          <?php 
            if ($this->session->userdata('logged_in')!='') 
            {
          ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Profile
                </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                   
                    <a class="dropdown-item" href="<?php echo base_url('Auth/profile')?>">View profile</a>
                    <a class="dropdown-item btn btn-danger" href="<?php echo base_url('main/logout');?>">Logout</a>
                  </div>
              </li>
          <?php    
            }
         ?>
      

     
      <!-- search -->
      
        

      <form class="form-inline my-2 my-lg-0" method="post" action="<?php echo base_url('Buy/search');?>">
	      <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search with category">
	      <button class="btn btn-secondary my-2 my-sm-0" type="submit"><span class="ti-search"></span></button>
	    </form>

    </ul>
  </div>
</nav>
<!-- <nav aria-label="breadcrumb"> -->
    <!-- admin navbar -->
          <?php 
            if ($this->session->userdata('logged_in')!='') 
            {
          ?>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item active">
                  	<a href="<?php echo base_url('Admin/index');?>" target="_blank">Add Product</a>
                  </li>
                  <li class="breadcrumb-item">
                  	<a href="<?php echo base_url('Admin/order');?>" target="_blank">Show Order</a>
              	  </li>
 
                </ol>
          <?php    
            }
          ?>


<!-- ----------------------------------- navbar Close ------------------------------------->
<!-- Modal -->

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

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalCenterTitle">Please sign in</h5><br />
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	    <div class="modal-body">
	        <form method="post" action="<?php echo base_url('main/nav_signin_validation');?>">
				<div class="form-group">
				    <label>Username</label>
				    <input type="text" class="form-control" name="username" placeholder="Enter Username">
				 	<span class="text-danger"><?php echo form_error('username'); ?></span>
				</div>
				<div class="form-group">
				    <label>Password</label>
				    <input type="password" class="form-control" name="password" placeholder="Password">
				    <span class="text-danger"><?php echo form_error('password');?></span>
				</div>
				<div class="form-group form-check">
				    <input type="checkbox" class="form-check-input" id="exampleCheck1">
				    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
	    </div>
    </div>
  </div>
</div>


<!-- -----------------------------------sign up Model ------------------------------------->
<!-- Modal-2 -->


<div class="modal fade" id="covermodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Creat New Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

         <?php 
              if (isset($profile_id)) 
              {
                foreach ($profile_id as $data) 
                {
                  $id = $data->id;
                  $new_username = $data->username;
                  $new_email = $data->email;
                  $new_contact = $data->contact;
                  $new_address = $data->address;
                  $new_password = $data->password;
                
                }
              }
              if (isset($update_profile) && $update_profile == "ok") 
              {
            ?>
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url('Auth/profile_up_validation');?>">

            <?php

              }
              else
              {
            ?>
               <form method="post" enctype="multipart/form-data" action="<?php echo base_url('Main/nav_signup_validation');?>">
            <?php

              }
            ?>
       	
			  <div class="form-group">
			    <label>New Username</label>
			    <input type="text" class="form-control" name="new_username" placeholder="Enter New userame" <?php if(isset($new_username)){echo 'value="'.$new_username.'"';}?>>
          <span class="text-danger"><?php echo form_error('new_username');?></span>
			  </div>

			  <div class="form-group">
			    <label>Enter Email address</label>
			    <input type="email" class="form-control" name="new_email" placeholder="Enter new email" <?php if(isset($new_email)){echo 'value="'.$new_email.'"';}?>>
          <span class="text-danger"><?php echo form_error('new_email');?></span>
			  </div>
         <div class="form-group">
          <label>Contact Number</label>
          <input type="text" class="form-control" name="new_contact" placeholder="Enter Contact Number" <?php if(isset($new_contact)){echo 'value="'.$new_contact.'"';}?>>
          <span class="text-danger"><?php echo form_error('new_contact');?></span>
        </div>
         <div class="form-group">
          <label>Address</label>
          <textarea type="text" class="form-control" name="new_address" placeholder="Enter Your Address" <?php if(isset($new_address)){echo 'value="'.$new_address.'"';}?>></textarea>
          <span class="text-danger"><?php echo form_error('new_address');?></span>
        </div>
        <div class="form-group">
          <label for="pic">Image</label>
          <input type="file" name="photo" class="form-control-file" id="pic" <?php if(isset($photo)){echo 'value="'.$photo.'"';}?>>
          <span class="text-danger"><?php echo form_error('photo');?></span>
        </div>
			  <div class="form-group">
			    <label>New Password</label>
			    <input type="password" class="form-control" name="new_password" placeholder="Enter new password" <?php if(isset($new_password)){echo 'value="'.$new_password.'"';}?>>
          <span class="text-danger"><?php echo form_error('new_password');?></span>
			  </div>
			  <input type="hidden" name="id" <?php if(isset($id)){echo 'value="'.$id.'"';}?>>
			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>
      </div>
    </div>
  </div>
</div>