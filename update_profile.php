<?php 

session_start();
if($_POST){
	$fName    = $_POST['fName'];
	$sName    = $_POST['sName'];
	$email    = $_POST['email'];
	$uid      = $_SESSION['user_id'];

	include_once 'database_con.php';
	$conn = connect();

	$sql = "UPDATE `member` SET `First_Name`='$fName',`Surname`='$sName',`Email`='$email' WHERE Member_ID=$uid";

	if($conn->query($sql)){
			$_SESSION['msg']= 'Your profile updated successfully.<br>';
			header('location:update_profile_form.php');
	}else{
			$_SESSION['msg']= 'Your profile was not updated.<br>';
			header('location:update_profile_form.php');
	}

}
?>