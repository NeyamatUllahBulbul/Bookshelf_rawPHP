<?php include_once 'template/header.php'; ?>
<?php 

if(isset($_POST['confirm'])){
	$cName = $_POST['fname'];	
	$caddress = $_POST['caddress'];	
	$phone = $_POST['phone'];	
	$post_code = $_POST['post_code'];	
	$city = $_POST['city'];	
	$sum_total = $_POST['sum_total'];
	
	$session_id = session_id();
	
	$six_digit_random_number = mt_rand(100000, 999999);
	$OrderId = 'O'.$six_digit_random_number;
	

	if($cName == ''){
		$_SESSION['msg']= 'Please type  Your Name.<br>';
		header('location:cart.php');
		exit;
	}
	
	if($caddress == ''){
		$_SESSION['msg']= 'Please type  Your Full Address<br>';
		header('location:cart.php');
		exit;
	}
	
	if($phone == ''){
		$_SESSION['msg']= 'Please type  Your Contact number <br>';
		header('location:cart.php');
		exit;
	}
	
	if($post_code == ''){
		$_SESSION['msg']= 'Please type  Post code<br>';
		header('location:cart.php');
		exit;
	}
	
	if($city == ''){
		$_SESSION['msg']= 'Please type  City Name<br>';
		header('location:cart.php');
		exit;
	}
	
	if($sum_total == 0){
		$_SESSION['msg']= 'Please select a product first<br>';
		header('location:cart.php');
		exit;
	}

	include_once 'database_con.php';
	$conn = connect();
	
	$sql = "UPDATE `cart` SET `Order_Id`='$OrderId' WHERE Session_Id='$session_id'";
	$conn->query($sql);	
	
	
	$sql = "INSERT INTO order_details(Order_Id,Customer_Name,Address,Contact_Number,Zip_Code,City,Payable_Amount) 
		    VALUES ('$OrderId','$cName','$caddress','$phone','$post_code','$city','$sum_total')";
			
		
	if($conn->query($sql)){
		session_regenerate_id(true);
		header('location:confirmed.php');
	}
}
	
	
	
	
	







?>