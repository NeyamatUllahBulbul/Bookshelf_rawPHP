<?php 
	session_start();
	if(isset($_GET['postId'])){
			$Post_ID = $_GET['postId'];
			
			include_once 'database_con.php';
			$conn = connect(); 
			
			$sql = "DELETE FROM blog WHERE `blog`. Blog_Id = '$Post_ID'";
			
			If($conn->query($sql)){
				$_SESSION['msg']= 'Blog deleted successfully.<br>';
				header('location:manage_blog_form.php');
			}else{
				$_SESSION['msg'] = "Error ".$conn->error;
			}
	}

		header("location:manage_blog_form.php");

?>