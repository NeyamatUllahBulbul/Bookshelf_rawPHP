<?php include_once 'template/header.php'; ?>
<?php include_once 'template/navbar.php'; ?>
<?php include_once 'admin_dash.php'; ?><br>

<div class="container">
	<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
  <form class="" action="book_entry.php" method="POST" enctype="multipart/form-data">
  
<div class="row">
	<div class="col-md-12 mt-20 text-center" id="bd1"><h4>Book input to the store</h4></div>
</div><br>
		<?php 
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset ($_SESSION['msg']);
				}
		?>
		
	  <div class="form-row">
		<div class="form-group col-md-5">
		  <label for="title"><b>Title</b></label>
		  <input type="text" name="title" class="form-control" id="inputPassword4" placeholder="Title of the book" required>
		</div>
		<div class="form-group col-md-5">
		  <label for="author"><b>Author</b></label>
		  <input type="text" name="author" class="form-control" id="inputPassword4" placeholder="Author's full name" required>
		</div>
	  </div>
	  <div class="form-row">
		<div class="form-group col-md-5">
		  <label for="publisher"><b>Publisher</b></label>
		  <input type="text" name="publisher" class="form-control" id="inputPassword4" placeholder="Publisher's name" required>
		</div>
		<div class="form-group col-md-5">
		  <label for="price"><b>Price</b></label>
		  <input type="text" name="price" class="form-control" id="inputPassword4" placeholder="Price of the book" required>
		</div>
	  </div>
	 <div class="form-row">
	  <div class="form-group col-md-5">
		<label for="topic"><b>Topic</b></label>
		<select class="form-control" name="topic" id="sel1">
			<option >Select</option>
			<option >Biography</option>
			<option >Children book</option>
			<option >Educational book</option>
			<option >Fiction</option>
			<option >Non-fiction</option>
			<option >Novel</option>
			<option >Science-fiction</option>
		  </select>
	  </div>
	  
		<div class="form-group col-md-5">
		   <label for="fileToUpload"><b>Image</b></label>
		   <input type="file" name="fileToUpload" class="form-control-file" id="fileToUpload">
		</div>
		<div class="bEntry">
			<button type="submit" class="btn add_cart details ml-5"><b>Insert</b></button>
		</div>
	 </div>
	  
    </div>

  </form>
  </div>
  <div class="col-md-2"></div>
  </div><br><br>




<?php include_once 'template/footer.php'; ?>