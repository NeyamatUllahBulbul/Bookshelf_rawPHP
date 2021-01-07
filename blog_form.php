<?php include_once 'template/header.php'; ?>
<?php include_once 'template/navbar.php'; ?>
<br>

<?php if(!isset($_SESSION['loggedin'])){ ?>

<div class="jumbotron text-center">
  <h1 class="display-4">Hello, Creative People!</h1>
  <hr class="my-4">
  <p>Are you a blogger?Interested in reading blog? </p>
	<p>Sign in first to read or write a blog </p><br>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="sign_in_form.php" role="button">Sign In</a>
  </p>
</div>
<?php } ?>

<?php if(isset($_SESSION['loggedin'])){ ?>
	<div class="text-center">
		<a href="write_blog.php"><button type="button" class="btn booktraining btn-outline-info"><b>Write a Blog</b></button></a>
	</div><br><br>


		<?php
			include_once 'database_con.php';
			$conn = connect();

			$sql = "SELECT * FROM blog WHERE Blog_Approval ='Approved'";
			$output = $conn->query($sql);
			foreach($output AS $row){

			?>
	<div class="container">
	  <div class="row">
		<div class="col-md-2"></div>
      		<div class="col-md-8">
			
			<form method="post" action="show_story.php?action=add&id=<?php echo $row['Blog_Id'];?>">
		        <div class="post">
		          <div class="post-thumb">
		            <a href="">
		              <img class="img-responsive blog_img" src="img/Blog/<?=$row['Blog_Image']?>" alt="">
		            </a>
		          </div>
		          <h2 class="post-title"><a href="single_blog.php?blogid=<?php echo $row['Blog_Id'];?>"><?=$row['Blog_Title']?></a></h2>
		          <div class="post-meta">
		            <ul>
		              <li>
		                <i class="fas fa-calendar-day"></i> <?=$row['Blog_Time']?>
		              </li>
		              <li>
		                <i class="fas fa-user-tie"></i> POSTED BY <?=$row['Writer_Name']?>
		              </li>
		            </ul>
		          </div>
		          <div class="post-content">
		            <p><?=$row['Blog']?> </p>
		            <a href="single_blog.php?blogid=<?php echo $row['Blog_Id'];?>" class="btn btn-main cont_read">Continue Reading</a>
		          </div>
				</div>
				</form> <br>
        	</div>
			<div class="col-md-2"></div>
		</div>
	</div>
			<?php } ?>
	

	
	
	
	
	
	
<?php } ?>



<?php include_once 'template/footer.php'; ?>