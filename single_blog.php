<?php include_once 'template/header.php'; ?>
<?php include_once 'template/navbar.php'; ?>

<?php 
	if(isset($_GET['blogid'])){
		$blogid=$_GET['blogid'];
	}
	
	include_once 'database_con.php';
	$conn=connect();

	$sql = "SELECT * FROM blog WHERE Blog_Id=$blogid";
	$singleBlog = $conn->query($sql);
		foreach ($singleBlog as $blog){
			$_SESSION['Blog_Id'] = $blog['Blog_Id'];
?>
<section class="page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="post post-single">
					<div class="post-thumb">
						<img class="img-responsive blog_img1" src="img/Blog/<?=$blog['Blog_Image']?>" alt="">
					</div><br>
					<h2 class="post-title"><?=$blog['Blog_Title']?></h2><br>
					<div class="post-meta">
						<ul>
							<li>
								<i class="fas fa-calendar-day"></i> <?=$blog['Blog_Time']?>
							</li>
							<li>
								<i class="fas fa-user-tie"></i> POSTED BY <?=$blog['Writer_Name']?>
							</li>
							
						</ul>
					</div>
					<div class="post-content post-excerpt">
						<p> <?=$blog['Blog']?> </p>
					</div>
							<?php } ?>
						</div>
						
						
						<h3 class="post-sub-heading">Comments</h3>
						<?php
						$activeBlogId = $blog['Blog_Id'];
						$sql = "SELECT * FROM `comments` WHERE `Blog_Id`= '$activeBlogId'";
						$commentResult = $conn->query($sql);	
		
						foreach($commentResult as $cmnt){?>
						<div class="cmnt_sec">
							<h6><i class="fas fa-user-tie" style="margin-right:5px;"></i><?php echo $cmnt['UserName'];?></h6>
							<p><?php echo $cmnt['Comment'];?></p>
						</div>
						
		<?php }?>		
			
			
			


					
				
						<div class="post-comments-form">
								<h3 class="post-sub-heading">Leave You Comments</h3>
								<form method="post" action="comment.php" id="form" role="form" >
							
									<div class="row">
										<!-- Comment -->
										<div class="form-group col-md-12">
											<input type="hidden" name="story_id" value="<?=$blog['Blog_Id']?>">
											<textarea name="comment" id="text" class=" form-control" rows="6" placeholder="Comment" maxlength="400"></textarea>
										</div>

										<!-- Send Button -->
										<div class="form-group col-md-12">
											<button type="submit" name="btn_Comment" class="btn btn-small btn-main cont_read">
												Send comment
											</button>
										</div>


									</div>

								</form>
							</div>
							

			</div>
		</div>
	</div>
</section>

<?php include_once 'template/footer.php'; ?>