<?php 

if(isset($_GET["addtocart"])){
	$cart_book_id = $_GET["bookid"];
	$quantity = $_GET["quantity"];
	$session_id = session_id();
	
	include_once 'database_con.php';
	$conn = connect();
	
	if($quantity <='0'){
		header('location:books.php');
		exit;
	}
	
		$sql = "SELECT * FROM book WHERE  Book_Id = '$cart_book_id'";
	     $books1 = $conn->query($sql);
		 if ($books1  !=false){
			 foreach($books1 AS $row){
			 $qty = $row['qty'];
			 }
		 }
		else{
			echo ("xsfeeefegeeeefe");
			exit;
		}

	    if($qty == 'Unavailable'){
			echo '<script>alert("Stock not available.")</script>';exit;
		}
		else{
			
			$sql = "SELECT * FROM cart WHERE  Session_Id = '$session_id'";
			$result = $conn->query($sql);
			
			if ($result  !=false){
				foreach($result AS $row){
					$Book_Id = $row['Book_Id'];
					
				}	
				
				if ($Book_Id  == $cart_book_id) {
					
					echo '<script>alert("Item already added.")</script>';
					header('location:cart.php');
					exit;
				}
				
				else {
					$sql = "INSERT INTO cart (Book_Id,Book_Quantity,Session_Id)
					VALUES ('$cart_book_id','$quantity','$session_id')";
					
					$conn->query($sql);
					header('location:books.php');
				}
				
			}
		}
		}

?>

<?php 
	if(isset($_GET["id"])){
		$bid = $_GET["id"];
		$session_id = session_id();
		
		include_once 'database_con.php';
		$conn = connect();
		
		
		$sql = "DELETE FROM cart WHERE  Session_Id = '$session_id' AND Book_Id = '$bid'";
		if($conn->query($sql)){
			echo '<script>alert("Item  deleted.")</script>';
			header('location:cart.php');
		}else{
			$_SESSION['msg']="Error:".$conn->error;
		}
		
		
	}



?>