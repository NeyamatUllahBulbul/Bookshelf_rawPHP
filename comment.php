<?php 
	session_start();

	if(isset($_POST['btn_Comment'])){
	$cmnt = $_POST['comment'];
	
	$C_userId = $_SESSION['user_id'];
	$C_username = $_SESSION['user_name'];
	$activeBlogId = $_SESSION['Blog_Id'];
	
	if(empty($cmnt)){
		header('location:single_blog.php?blogid='.$activeBlogId);
		exit;
	}
	
	include_once 'database_con.php';
	$conn = connect();
	
	$sql = "INSERT INTO `comments`( `Comment`, `Member_ID`, `UserName`,`Blog_Id`) 
	VALUES ('$cmnt','$C_userId','$C_username','$activeBlogId')";
	
	$conn->query($sql);	
	header('location:single_blog.php?blogid='.$activeBlogId);
					
}?>