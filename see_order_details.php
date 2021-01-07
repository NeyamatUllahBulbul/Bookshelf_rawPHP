<?php include_once 'template/header.php'; ?>
<?php include_once 'template/navbar.php'; ?>
<?php include_once 'admin_dash.php'; ?>


<table class="table table-striped" id="table_id">
		<thead>
		  <tr>
			<th>Order ID</th>
			<th>Book Name</th>
			<th>Quantity</th>
			<th>Total</th>
		  </tr>
		</thead>
		<tbody>

		<?php 
		$Order_Id = $_GET['oId'];
		include_once 'database_con.php';
		$conn = connect();	
		
			$sql = "SELECT cart.*, book.*
							FROM cart 
							INNER JOIN book ON cart.Book_Id = book.Book_Id	
							WHERE  cart.Order_Id = '$Order_Id'
					";
			$result = $conn->query($sql);
			
		foreach($result AS $row){
		?>
		  <tr>
			<td><?=$row['Order_Id']?></td>
			<td><?=$row['Book_Title']?></td>
			<td><?=$row['Book_Quantity']?></td>
			<td><?=$row['Book_Quantity']*$row['Price']?></td>
		  </tr>
		<?php } ?> 
		</tbody>
	  </table>



<?php include_once 'template/footer.php'; ?>