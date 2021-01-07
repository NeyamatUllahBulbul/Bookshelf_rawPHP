
<?php 
	session_start();
	if(isset($_GET['userId'])){
			$User_ID = $_GET['userId'];
			
			include_once 'database_con.php';
			$conn = connect(); 
			
			$sql = "UPDATE `member` SET `Status` = 'Deactive' WHERE `member`. Member_ID = '$User_ID'";
			
			If($conn->query($sql)){
				$_SESSION['msg']= 'User deleted successfully.<br>';
				header('location:manage_user_form.php');
			}else{
				$_SESSION['msg'] = "Error ".$conn->error;
				header('location:manage_user_form.php');
			}
	}

?>