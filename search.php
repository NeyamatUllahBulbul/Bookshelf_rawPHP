	<?php
	session_start();
	//Search product
	$search = $_GET['search'];
	
	$sql = "SELECT * FROM book 
			WHERE Book_Title LIKE '%$search%' OR Author LIKE '%$search%'OR Publisher LIKE '%$search%'OR Book_Type LIKE '%$search%'";
	//Use Database configuration to connect.
	include_once 'database_con.php';
	$conn = connect();
	
	if($result = $conn->query($sql)){
		foreach($result AS $row){
			$data[] = $row;
		}
			if(empty($data)){
				$_SESSION['msg']= 'No result found!<br>';
				header('location:books.php');
			}else{
				$_SESSION['files'] = $data;
				header('location:books.php');
			}
		
	}
	
?>