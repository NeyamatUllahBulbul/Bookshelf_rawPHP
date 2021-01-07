<?php include_once 'template/header.php'; ?>
<?php include_once 'template/navbar.php'; ?>
<?php include_once 'admin_dash.php'; ?>

<br>

		<?php 
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset ($_SESSION['msg']);
				}
		?>

		<?php
			include_once 'database_con.php';
			$conn = connect();

			//$sql = "SELECT * FROM blog WHERE Blog_Approval ='Pending'";
			$sql = "SELECT * FROM blog ";
			$output = $conn->query($sql);
			foreach($output AS $row){

			?>
<div class="page-wrapper">
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
					  <li>
		                <i class="fas "></i> STATUS <?=$row['Blog_Approval']?>
		              </li>
		            </ul>
		          </div>
		          <div class="post-content">
		            <p><?=$row['Blog']?> </p>
		            <a href="single_blog.php?blogid=<?php echo $row['Blog_Id'];?>" class="btn btn-main cont_read">Continue Reading</a>
		          </div>
				</div>
				<a class="btn btn-xs btn-success" href="approve_post.php?postId=<?=$row['Blog_Id']?>">Approve</a>
				<a class="btn btn-main cont_read ml-3" href="delete_post.php?postId=<?=$row['Blog_Id']?>">Delete</a>
				</form> <br>
        	</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</div>
			<?php } ?>



<?php include_once 'template/footer.php'; ?>