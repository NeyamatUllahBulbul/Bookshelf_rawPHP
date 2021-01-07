<?php include_once 'template/header.php'; ?>

  <!-- Navigation -->
<nav class="navbar navbar-expand-lg sticky-top bg-secondary"  style="bg-secondary:background-color: #2c3e50!important;">

  <a class="navbar-brand" href="index.php"><img src="img/bookshelf.png" style="height:44px;width:50px;">BookShelf.com</a>

  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon" style="color:white;"></span>
  </button>

  
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ">
      <li class="nav-item">
        <a class="nav-link" href="index.php"><i class="fas fa-home"></i>Home</a>
      </li>
	  
	  <li class="nav-item">
        <a class="nav-link" href="books.php"><i class="fa fa-book"></i>Books</a>
      </li> 
	 
	  <li class="nav-item">
        <a class="nav-link" href="blog_form.php"><i class="fas fa-blog" ></i>Blog</a>
      </li>
	  
	  <?php if(isset($_SESSION['loggedin'])){ ?>
	  <li class="nav-item">
        <a class="nav-link" href="documents.php"><i class="fa fa-file" ></i>Free books</a>
      </li>
	  <?php } ?>
	  
	  <li class="nav-item">
        <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" ></i>Cart</a>
      </li>
	  
	  <li class="nav-item">
		<a class="nav-link" href="pre_order_form.php"><i class="" ></i>Pre-Order</a>
	  </li>
	  
	  <li class="nav-item dropdown">
		 <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><i class="fab fa-servicestack"></i>Services</a>
		<div class="dropdown-menu">
		  <a class="nav-link" href="about_us.php"><i class="fa fa-users"></i>About Us</a>
		  <a class="nav-link" href="contact_form.php"><i class="fa fa-phone"></i>Contact Us</a>
		</div>
	  </li>

	  <?php 
			if(isset($_SESSION['loggedin']) && $_SESSION['user_role']!=1){ ?>
			  <li class="nav-item dropdown">
				 <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><i class="fas fa-user-circle"></i><?php echo $_SESSION['user_name']; ?></a>
				<div class="dropdown-menu">
				  <a class="nav-link" href="update_profile_form.php"><i class=""></i>Update profile</a>
				  <a class="nav-link" href="change_pass_form.php"><i class=""></i>Change password</a>
				  <a class="nav-link" href="logout.php"><i class="fas fa-sign-in-alt"></i>Logout</a>
				</div>
			  </li>
			<?php }elseif(isset($_SESSION['loggedin']) && $_SESSION['user_role']==1){ ?>
					<li class="nav-item dropdown">
					 <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><i class="fas fa-user-circle"></i>Admin</a>
					<div class="dropdown-menu">
					  <a class="nav-link" href="order_details.php"><i class="fa fa-tachometer"></i>Admin Dashboard</a>
					  <a class="nav-link" href="logout.php"><i class="fas fa-sign-in-alt"></i>Logout</a>
					</div>
				  </li>
			<?php }else{ ?>
				  <li class="nav-item dropdown">
					 <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><i class="fas fa-user-circle"></i>Account</a>
					<div class="dropdown-menu">
					  <a class="nav-link" href="sign_in_form.php"><i class="fas fa-user-plus"></i>Sign In</a>
					  <a class="nav-link" href="sign_up_form.php"><i class="fas fa-sign-in-alt"></i>Sign Up</a>
					</div>
				  </li>
			<?php } ?>
		<li class="nav-item">
			<form action="search.php" class="container-4">
			  <input type="search" name="search" id="search" placeholder="Search for books..." />
				<button class="icon"><i class="fa fa-search"></i></button>
			</form>
		</li>
    </ul>
  </div> 
</nav> 

