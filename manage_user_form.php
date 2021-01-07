<?php include_once 'template/header.php'; ?>
<?php include_once 'template/navbar.php'; ?>
<?php include_once 'admin_dash.php'; ?>

		<?php 
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset ($_SESSION['msg']);
				}
		?>

<table class="table table-striped" id="table_id">
		<thead>
		  <tr>
			<th>First Name</th>
			<th>Surname</th>
			<th>Username</th>
			<th>Email</th>
			<th>User Role</th>
			<th>Status</th>
			<th>Action</th>
		  </tr>
		</thead>
		<tbody>

		<?php 
			include_once 'database_con.php';
			$conn = connect(); 
				
			$sql = "SELECT * FROM member WHERE Username != 'admin'";
			
			$result = $conn->query($sql);
		
		foreach($result AS $row){
		?>
		  <tr>
			<td><?=$row['First_Name']?></td>
			<td><?=$row['Surname']?></td>
			<td><?=$row['Username']?></td>
			<td><?=$row['Email']?></td>
			<td><?=$row['User_Role']?></td>
			<td><?=$row['Status']?></td>
			<td>
				<a class="btn btn-xs btn-danger" href="delete_user.php?userId=<?=$row['Member_ID']?>">Delete</a>
				<a class="btn btn-xs btn-success" href="activate_user.php?userId=<?=$row['Member_ID']?>">Activate</a>
			</td>
		  </tr>
		<?php } ?> 
		</tbody>
	  </table>


<?php include_once 'template/footer.php'; ?>



