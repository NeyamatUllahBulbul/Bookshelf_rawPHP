<?php include_once 'template/header.php'; ?>
<?php include_once 'template/navbar.php'; ?>

<?php if(!isset($_SESSION['loggedin'])){
	header('location:sign_in_form.php');
} ?>

    <div class="container">
      <div class="row">

<?php 
	if(!isset($_SESSION['files'])){
		include_once 'database_con.php';
	    $conn = connect();
		
		$sql = "SELECT * FROM free_books ";
		
		$result = $conn->query($sql);
	}else{
		$result = $_SESSION['files'];
		unset($_SESSION['files']);
	}	
		foreach($result AS $row){
		?>
            <div class="col-lg-3 col-md-4 mb-3">
              <div class="card h-100">
			    <a href="#"><img class="card-img-top" src="documents/image/<?=$row['Image']?>" alt=""></a>
                <a href="#"><img class="card-img-top" src="documents/<?=$row['File']?>" alt=""></a>
                <div class="card-body">
                  <h5 class="card-title">
                    <a href="documents/<?=$row['File']?>" download ><?=$row['Title']?></a>
					
                  </h5>
                  <h6>Author:<?=$row['Author']?></h6>
				  <a href="documents/<?=$row['File']?>" class="btn add_cart details ml-4" download><i class="fa fa-download " style="margin-right: 5px"; ></i>Download Now</a>
				  <a href="documents/<?=$row['File']?>" class="btn add_cart details ml-4" ><i class="fas fa-info-circle" style="margin-right: 5px"; ></i>Read book</a>
                </div>
              </div>
            </div>
		<?php } ?>
            
          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->




<?php include_once 'template/footer.php'; ?>