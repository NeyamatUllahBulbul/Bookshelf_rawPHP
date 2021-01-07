<?php 

	include_once 'database_con.php';
	$conn=connect();

	$sql = "DELETE FROM cart WHERE Order_Id = 'N/A'";
	if($conn->query($sql)){
		
		header('location:order_details.php');
	}
?>