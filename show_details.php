<?php include_once 'template/header.php'; ?>
<?php include_once 'template/navbar.php'; ?>
<?php include_once 'add_to_cart.php'; ?>
<?php 

	$bookid=$_GET['bookid'];

	include_once 'database_con.php';
	$conn=connect();

	$sql = "SELECT * FROM book WHERE Book_Id = $bookid";
	$result = $conn->query($sql);
	foreach ($result as $row){
?>

<div class="row">
	<div class="col-md-12 mt-20 text-center" id="bd1"><h4>Book Description</h4></div>
</div><br>
<div class="container">
	<div class="row">
		<div class= "col-md-5">
			 <img src="img/Books/<?=$row['Image']?>" alt="New York">
		</div>
		<div class= "col-md-7">
			<h2><?=$row['Book_Title']?></h2><br>
			<p class="product-price">by <?=$row['Author']?></p><br>
			<p class="product-price">Publisher: <?=$row['Publisher']?></p><br>
			<p class="product-price">BDT Price: ৳<?=$row['Price']?></p><br>
			<form method="GET" >
			  <input type="hidden" name="bookid" class="form-control quantity" value="<?=$row['Book_Id']?>"/>
			  <input type="text" name="quantity" class="form-control quantity sdcart" value="1"/>
			  <input type="submit" name="addtocart" class=" add_cart sdcart" id="addtocart" value="Add To Cart"/>
			</form>
		</div>
				<?php } ?>
	</div>
</div>		
			
			
			

<?php include_once 'template/footer.php'; ?>