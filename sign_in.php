<?php 

session_start();
	if($_POST){
		$uName 	  = $_POST['uName'];
		$pass 	  = $_POST['pass'];
		$_SESSION['msg'] = '';
		if(!isset($_SESSION['count'])){
			$_SESSION['count'] = 0;
		}
		
	if($uName == ''){
				$_SESSION['msg']= 'Please insert your Username.<br>';
				header('location:sign_in_form.php');
				exit;
		}
		
	if($pass == ''){
			$_SESSION['msg']= 'Please insert your password.<br>';
			header('location:sign_in_form.php');
			exit;
	}
	
	include_once 'database_con.php';
	$conn = connect();
	
	$sql = "SELECT * FROM member WHERE Email= '$uName' AND Password= '$pass' AND Status='Active' OR Username= '$uName' AND Password= '$pass' AND Status='Active'";
	$result = $conn->query($sql);
		
		if($result->num_rows > 0){
			
			foreach($result AS $row){
				$_SESSION['user_name'] = $row['First_Name'];
				$_SESSION['user_role'] = $row['User_Role'];
				$_SESSION['user_id'] = $row['Member_ID'];
			}			
			$_SESSION['loggedin'] = true;
			unset($_SESSION['count']);
							
			header('location:index.php');
		}else{
			$_SESSION['count']++;
			if($_SESSION['count'] >= 3){
				setcookie('loginCounter', true, time() + (60*3));
				$_SESSION['count'] = 0;
			}
			$_SESSION['msg']= 'Invalid login!<br>';
			header('location:sign_in_form.php');
		}	
	}

?>