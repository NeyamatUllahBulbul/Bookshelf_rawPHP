<?php include_once 'template/header.php'; ?>
<?php include_once 'template/navbar.php'; ?>
<?php include_once 'admin_dash.php'; ?>

<table class="table table-striped" id="table_id">
		<thead>
		  <tr>
			<th>Message Id</th>
			<th>Sender Name</th>
			<th>Email</th>
			<th>Message</th>
			<th>Time</th>
		  </tr>
		</thead>
		<tbody>

		<?php 
			include_once 'database_con.php';
			$conn = connect(); 
				
			$sql = "SELECT * FROM contact_us ";
			
			$result = $conn->query($sql);
		
		foreach($result AS $row){
		?>
		  <tr>
			<td><?=$row['Msg_Id']?></td>
			<td><?=$row['Name']?></td>
			<td><?=$row['Email']?></td>
			<td><?=$row['Message']?></td>
			<td><?=$row['Time']?></td>
		  </tr>
		<?php } ?> 
		</tbody>
	  </table>

<?php include_once 'template/footer.php'; ?>