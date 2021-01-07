<?php include_once 'template/header.php'; ?>
<?php include_once 'template/navbar.php'; ?>

<div class="container7">
	<div class="row">
  <form class="" action="write_blog_insert.php" method="POST" enctype="multipart/form-data">
  
  <h3>Write your Blog here!</h3><br>
		<?php 
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset ($_SESSION['msg']);
				}
		?>
	  <div class="form-row">
		<div class="form-group col-md-6">
		  <label for="title"><b>Blog title</b></label>
		  <input type="text" name="title" class="form-control" id="inputPassword4" placeholder="Title of the blog" required>
		</div>
		<div class="form-group col-md-6">
		  <label for="author"><b>Writer's name</b></label>
		  <input type="text" name="author" class="form-control" id="inputPassword4" placeholder="Your name" required>
		</div>
	  </div>
	  <div class="form-row">
		<div class="col-sm-12 entry_input">
			<textarea class="form-control" name="blog_body" placeholder="Write Blog Here" rows="6"></textarea>
		</div>
	  </div><br>
	 <div class="form-row">
		<div class="form-group col-md-8">
		   <label for="fileToUpload"><b>Image</b></label>
		   <input type="file" name="fileToUpload" class="form-control-file" id="fileToUpload">
		</div>
	 </div>
	  
    </div><br><br>
    <div class="form-row">        
      <div class="">
        <button type="submit" class="btn msg btn-primary"><b>Submit</b></button>
      </div>
    </div>
  </form>
  </div>
	

<?php include_once 'template/footer.php'; ?>