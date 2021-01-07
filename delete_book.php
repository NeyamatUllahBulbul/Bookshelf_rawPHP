<?php 

	$bookid=$_GET['bookid'];

	include_once 'database_con.php';
	$conn=connect();

	$sql = "DELETE FROM book WHERE Book_Id = $bookid";
	if($conn->query($sql)){
		
		header('location:books.php');
	}
?>