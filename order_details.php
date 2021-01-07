<?php include_once 'template/header.php'; ?>
<?php include_once 'template/navbar.php'; ?>
<?php include_once 'admin_dash.php'; ?><br>

 <?php 
	include_once 'database_con.php';
	$conn = connect();
	$sql = "SELECT * FROM cart WHERE Order_Id= 'N/A'";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		$_SESSION['unfinished'] = true;
	}
 
	if(isset($_SESSION['unfinished'])){ ?>
	<div class="text-center">
		<a href="unfinished_orders.php"><button type="button" class="btn booktraining btn-outline-info fa fa-trash"><b>Delete Unfinished Orders</b></button></a>
	</div><br><br>
 <?php } ?>

<table class="table table-striped" id="table_id">
		<thead>
		  <tr>
			<th>Order ID</th>
			<th>Customer Name</th>
			<th>Address</th>
			<th>Contact Number</th>
			<th>Zip Code</th>
			<th>City</th>
			<th>Order Date</th>
			<th>Payable Amount</th>
		  </tr>
		</thead>
		<tbody>

		<?php 
 
				
			$sql = "SELECT * FROM order_details ";
			
			$result = $conn->query($sql);
		
		foreach($result AS $row){
		?>
		  <tr>
			<td><?=$row['Order_Id']?></td>
			<td><?=$row['Customer_Name']?></td>
			<td><?=$row['Address']?></td>
			<td><?=$row['Contact_Number']?></td>
			<td><?=$row['Zip_Code']?></td>
			<td><?=$row['City']?></td>
			<td><?=$row['Order_Date']?></td>
			<td><?=$row['Payable_Amount']?></td>
			<td><a class="btn add_cart details" href="see_order_details.php?oId=<?=$row['Order_Id']?>">See Details</a></td>
			
		  </tr>
		<?php } ?> 
		</tbody>
	  </table>



<?php include_once 'template/footer.php'; ?>