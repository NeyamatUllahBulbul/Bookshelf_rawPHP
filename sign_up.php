<?php 

session_start();
if($_POST){
	$fName     	= $_POST['fName'];
	$sName  	= $_POST['sName'];
	$uName      = $_POST['uName'];
	$email		= $_POST['email'];
	$pass       = $_POST['pass'];


	if($fName == ''){
			$_SESSION['msg']= 'Please insert your First name.<br>';
			header('location:sign_up_form.php');
				exit;
			}
	if($sName == ''){
				$_SESSION['msg']= 'Please insert your Surname.<br>';
				header('location:sign_up_form.php');
				exit;
			}
	if($uName == ''){
				$_SESSION['msg']= 'Please insert your Username.<br>';
				header('location:sign_up_form.php');
				exit;
			}
	if($email == ''){
				$_SESSION['msg']= 'Please insert your email.<br>';
				header('location:sign_up_form.php');
				exit;
			}
	if($pass == ''){
				$_SESSION['msg']= 'Please type a password.<br>';
				header('location:sign_up_form.php');
				exit;
			}

	if (strlen($pass ) <= '8') {
		$_SESSION['msg']= 'Your Password Must Contain At Least 8 Characters!<br>';
		header('location:sign_up_form.php');
		exit;
	}
	elseif(!preg_match("#[0-9]+#",$pass)) {
		$_SESSION['msg']= 'Your Password Must Contain At Least 1 Number!<br>';
		header('location:sign_up_form.php');
		exit;
	}
	elseif(!preg_match("#[A-Z]+#",$pass)) {
		$_SESSION['msg']= 'Your Password Must Contain At Least 1 Capital Letter!<br>';
		header('location:sign_up_form.php');
		exit;
	}
	elseif(!preg_match("#[a-z]+#",$pass)) {
		$_SESSION['msg']= 'Your Password Must Contain At Least 1 Lowercase Letter!<br>';
		header('location:sign_up_form.php');
		exit;
	} else {

			
		include_once 'database_con.php';
		$conn = connect();

		$sql = "SELECT * FROM member WHERE Username = '$uName'";
		$output= $conn->query($sql);

		if($output-> num_rows > 0){
			$_SESSION['msg']= 'Username already exists.<br>';
			header('location:sign_up_form.php');
			exit;
		}else{
			$sql="INSERT INTO member (First_Name,Surname,Username,Email,Password)
				VALUES ('$fName','$sName','$uName','$email','$pass')";
			$conn->query($sql);
			$_SESSION['msg']= 'Registered Successfully. Thank You!<br>';
			header('location:sign_up_form.php');
		}
	}
}
?>