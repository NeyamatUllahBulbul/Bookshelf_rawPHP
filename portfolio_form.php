<?php include_once 'template/header.php'; ?>
<?php include_once 'template/navbar.php'; ?>
<?php include_once 'admin_dash.php'; ?>
<div class="container7">
	<div class="row">
  <form class="" action="portfolio.php" method="POST" enctype="multipart/form-data">
<div class="row">
	<div class="col-md-12 mt-20 text-center" id="bd1"><h4>Update portfolio</h4></div>
</div><br>
  <?php 
	
	if(isset($_SESSION['msg'])){
		echo $_SESSION['msg'];
		unset ($_SESSION['msg']);
	}
  ?>
	  <div class="form-row">
		<div class="form-group col-md-10">
		  <label for="title"><b>Title</b></label>
		  <input type="text" name="title" class="form-control" id="inputPassword4" placeholder="Title of the event" required>
		</div>
	  </div>
	 <div class="form-row">
		  <div class="form-group">
			<label for="fileToUpload"><b>Research file</b></label>
			<input type="file" name="fileToUpload" class="form-control-file" id="fileToUpload">
		 </div>
	 </div>
	  
    </div><br><br>
    <div class="form-row">        
      <div class="">
        <button type="submit" class="btn msg btn-primary"><b>Upload Image</b></button>
      </div>
    </div>
  </form>
  </div>
</div>
<?php include_once 'template/footer.php'; ?>