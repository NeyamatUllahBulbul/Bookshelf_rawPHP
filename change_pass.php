<?php 

session_start();

$cPass     	= $_POST['cPass'];
$newPass  	= $_POST['newPass'];
$mid      = $_SESSION['user_id'];

if($cPass == ''){
			$_SESSION['msg']= 'Insert your current password.<br>';
			header('location:change_pass_form.php');
			exit;
		}
if($newPass == ''){
			$_SESSION['msg']= 'Insert your new password.<br>';
			header('location:change_pass_form.php');
			exit;
		}
include_once 'database_con.php';
$conn = connect();

$sql = "SELECT Password FROM member WHERE Member_ID ='$mid'";
$output= $conn->query($sql);

Foreach ($output AS $row){
	$pass= $row['Password'] ;
}
if($cPass == $pass){
	$sql = "UPDATE `member` SET `Password`='$newPass' WHERE Member_ID =$mid";
	$conn->query($sql);
	$_SESSION['msg']= 'Your password updated successfully.<br>';
	header('location:change_pass_form.php');
}else{
	$_SESSION['msg']= 'Incorrect current password.<br>';
	header('location:change_pass_form.php');
}



?>