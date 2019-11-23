<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
  <a class="navbar-brand" href="#home">OnlineSCORE</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('main/index');?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Men's Fashion
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">T-Shirts</a>
          <a class="dropdown-item" href="#">Polo Shirts</a>
          <!-- <div class="dropdown-divider"></div> -->
          <a class="dropdown-item" href="#">Shirts</a>
          <a class="dropdown-item" href="#">Jeans</a>
          <a class="dropdown-item" href="#">Men's Bags</a>
          <a class="dropdown-item" href="#">Sweaters</a>
          <a class="dropdown-item" href="#">Hoodies & Sweatshirts</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#covermodel" href="#">Sing up</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#exampleModalCenter" href="#">Sign in</a>
      </li>
      
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
      

     
      
      
        

      <form class="form-inline my-2 my-lg-0">
	      <input class="form-control mr-sm-2" type="text" placeholder="Search">
	      <button class="btn btn-secondary my-2 my-sm-0" type="submit"><span class="ti-search"></span></button>
	    </form>

    </ul>
  </div>
</nav>
<!-- <nav aria-label="breadcrumb"> -->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
    	<a href="https://www.facebook.com/" target="_blank">Home</a>
	</li>
    <li class="breadcrumb-item active">
    	<a href="#" target="_blank">Shop</a>
    </li>
    <li class="breadcrumb-item">
    	<a href="#" target="_blank">Blog</a>
	</li>
    <li class="breadcrumb-item active">
    	<a href="#" target="_blank">Library</a>
    </li>
    <li class="breadcrumb-item">
    	<a href="#" target="_blank">Home</a>
    </li>
    <li class="breadcrumb-item active">
    	<a href="#" target="_blank">Library</a>
    </li>
  </ol>
<!-- </nav> -->
<header class="header-caption">
	<!-- <div class="header-title">
		<h2 class="text-white">Order Delivery</h2>
		<span>Find your favourite delicious hot food!</span>
		<form class="input-group">
		  	<input type="text" class="form-control mr-sm-2" placeholder="I would like to eat...">
		 	<button type="button" class="btn btn-primary">Search food</button>
		</form>
	</div> -->
</header>

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
       	 <form method="post" enctype="multipart/form-data" action="<?php echo base_url('main/nav_signup_validation');?>">
			  <div class="form-group">
			    <label>New Username</label>
			    <input type="text" class="form-control" name="new_username" placeholder="Enter New userame">
          <span class="text-danger"><?php echo form_error('new_username');?></span>
			  </div>

			  <div class="form-group">
			    <label>Enter Email address</label>
			    <input type="email" class="form-control" name="new_email" placeholder="Enter new email">
          <span class="text-danger"><?php echo form_error('new_email');?></span>
			  </div>
         <div class="form-group">
          <label>Contact Number</label>
          <input type="text" class="form-control" name="new_contact" placeholder="Enter Contact Number">
          <span class="text-danger"><?php echo form_error('new_contact');?></span>
        </div>
         <div class="form-group">
          <label>Address</label>
          <textarea type="text" class="form-control" name="new_address" placeholder="Enter Your Address"></textarea>
          <span class="text-danger"><?php echo form_error('new_address');?></span>
        </div>
        <div class="form-group">
          <label for="pic">Image</label>
          <input type="file" name="photo" class="form-control-file" id="pic">
          <span class="text-danger"><?php echo form_error('photo');?></span>
        </div>
			  <div class="form-group">
			    <label>New Password</label>
			    <input type="password" class="form-control" name="new_password" placeholder="Enter new password">
          <span class="text-danger"><?php echo form_error('new_password');?></span>
			  </div>
			  
			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>
      </div>
    </div>
  </div>
</div>