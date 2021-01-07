<?php 
	session_start();
	if(isset($_GET['postId'])){
			$Post_ID = $_GET['postId'];
			
			include_once 'database_con.php';
			$conn = connect(); 
			
			$sql = "UPDATE `blog` SET `Blog_Approval` = 'Approved' WHERE `blog`. Blog_Id = '$Post_ID'";
			
			If($conn->query($sql)){
				$_SESSION['msg']= 'Blog approved successfully.<br>';
				header('location:manage_user_form.php');
			}else{
				$_SESSION['msg'] = "Error ".$conn->error;
			}
	}

		header("location:manage_blog_form.php");

?>