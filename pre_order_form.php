<?php include_once 'template/header.php'; ?>
<?php include_once 'template/navbar.php'; ?>

<?php if(!isset($_SESSION['loggedin'])){ ?>

<div class="jumbotron text-center">
  <h1 class="display-4">Hello, Reader!</h1>
  <hr class="my-4">
  <p>Not founding your book in the store? </p>
	<p>Sign in first to pre-order dor the book. </p><br>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="sign_in_form.php" role="button">Sign In</a>
  </p>
</div>
<?php } ?>


<?php if(isset($_SESSION['loggedin'])){ ?>
<div class="container7">
	<div class="row">
  <form class="" action="pre_order.php" method="POST" enctype="multipart/form-data">
  
  <h3><u>Pre order details</u></h3><br>
		<?php 
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset ($_SESSION['msg']);
				}
		?>
	  <div class="form-row">
		<div class="form-group col-md-6">
		  <label for="title"><b>Book Title</b></label>
		  <input type="text" name="title" class="form-control" id="inputPassword4" placeholder="Title of the book" required>
		</div>
		<div class="form-group col-md-6">
		  <label for="author"><b>Author's Name</b></label>
		  <input type="text" name="author" class="form-control" id="inputPassword4" placeholder="Author's full name" required>
		</div>
	  </div>
	  <div class="form-row">
		<div class="form-group col-md-6">
		  <label for="publisher"><b>Publisher</b></label>
		  <input type="text" name="publisher" class="form-control" id="inputPassword4" placeholder="Publisher's name" required>
		</div>
		<div class="form-group col-md-6">
		  <label for="country"><b>Country</b></label>
		  <input type="text" name="country" class="form-control" id="inputPassword4" placeholder="Origin country of the book" required>
		</div>
	  </div>
	 <div class="form-row">
	  <div class="form-group col-md-6">
		  <label for="language"><b>Language</b></label>
		  <input type="text" name="language" class="form-control" id="inputPassword4" placeholder="Language of the book" required>
	  </div>
	  <div class="form-group col-md-6">
		  <label for="edition"><b>Edition</b></label>
		  <input type="text" name="edition" class="form-control" id="inputPassword4" placeholder="Edition of the book" >
	  </div>	  
	 </div>
	 
	 <h3><u>Customer details</u></h3><br>
	  
	  <div class="form-row">
		<div class="form-group col-md-6">
		  <label for="cname"><b>Name</b></label>
		  <input type="text" name="cname" class="form-control" id="inputPassword4" placeholder="Your name" required>
		</div>
		<div class="form-group col-md-6">
		  <label for="cemail"><b>Email</b></label>
		  <input type="email" name="cemail" class="form-control" id="inputPassword4" placeholder="Your email" required>
		</div>
	  </div>
	 <div class="form-row">
	  <div class="form-group col-md-6">
		  <label for="cphone"><b>Contact Number</b></label>
		  <input type="text" name="cphone" class="form-control" id="inputPassword4" placeholder="Your contact number" required>
	  </div>
	  <div class="form-group col-md-6">
		  <label for="caddress"><b>Address</b></label>
		  <input type="text" name="caddress" class="form-control" id="inputPassword4" placeholder="Your address" required>
	  </div>	  
	 </div>
    </div>
    <div class="form-row">        
      <div class="">
        <button type="submit" class="btn add_cart pre_order"><b>Submit</b></button>
      </div>
    </div>
  </form>
  </div>

<?php } ?>


<?php include_once 'template/footer.php'; ?>