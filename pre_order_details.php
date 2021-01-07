<?php include_once 'template/header.php'; ?>
<?php include_once 'template/navbar.php'; ?>
<?php include_once 'admin_dash.php'; ?>

<table class="table table-striped" id="table_id">
		<thead>
		  <tr>
			<th>Order ID</th>
			<th>Book Title</th>
			<th>Author</th>
			<th>Publisher</th>
			<th>Country</th>
			<th>Language</th>
			<th>Edition</th>
		  </tr>
		</thead>
		<tbody>

		<?php 
			include_once 'database_con.php';
			$conn = connect(); 
				
			$sql = "SELECT * FROM pre_order ";
			
			$result = $conn->query($sql);
		
		foreach($result AS $row){
		?>
		  <tr>
			<td><?=$row['Pre_Order_Id']?></td>
			<td><?=$row['Book_Title']?></td>
			<td><?=$row['Author']?></td>
			<td><?=$row['Publisher']?></td>
			<td><?=$row['Country']?></td>
			<td><?=$row['Language']?></td>
			<td><?=$row['Edition']?></td>
			<td>
				<a class="btn btn-xs btn-success" href="see_pre_order_details.php?orderId=<?=$row['Pre_Order_Id']?>">See Details</a>
			</td>
		  </tr>
		<?php } ?> 
		</tbody>
	  </table>



<?php include_once 'template/footer.php'; ?>