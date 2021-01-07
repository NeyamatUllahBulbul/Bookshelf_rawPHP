<?php include_once 'template/header.php'; ?>
<?php include_once 'template/navbar.php'; ?>
<?php include_once 'admin_dash.php'; ?>

<div class="container">
	<?php 
		include_once 'database_con.php';
		$conn = connect(); 
			
		$sql = "SELECT * FROM pre_order ";
		
		$result = $conn->query($sql);
	
		foreach($result AS $row){
	?>
    <div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-12">
					<h3><u>Pre Order Details</u></h3><br>
					<div class="tab-content ml-1" id="myTabContent">
						<div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
							

							<div class="row">
								<div class="col-sm-3 col-md-2 col-5">
									<label style="font-weight:bold;">Order ID</label>
								</div>
								<div class="col-md-8 col-6">
									<?=$row['Pre_Order_Id']?>
								</div>
							</div>
							<hr />
							
							<div class="row">
								<div class="col-sm-3 col-md-2 col-5">
									<label style="font-weight:bold;">Book Title</label>
								</div>
								<div class="col-md-8 col-6">
									<?=$row['Book_Title']?>
								</div>
							</div>
							<hr />

							<div class="row">
								<div class="col-sm-3 col-md-2 col-5">
									<label style="font-weight:bold;">Author</label>
								</div>
								<div class="col-md-8 col-6">
									<?=$row['Author']?>
								</div>
							</div>
							<hr />
							
							
							<div class="row">
								<div class="col-sm-3 col-md-2 col-5">
									<label style="font-weight:bold;">Publisher</label>
								</div>
								<div class="col-md-8 col-6">
									<?=$row['Publisher']?>
								</div>
							</div>
							
							<hr />
							<div class="row">
								<div class="col-sm-3 col-md-2 col-5">
									<label style="font-weight:bold;">Country</label>
								</div>
								<div class="col-md-8 col-6">
									<?=$row['Country']?>
								</div>
							</div>
							<hr />
							
							<div class="row">
								<div class="col-sm-3 col-md-2 col-5">
									<label style="font-weight:bold;">Language</label>
								</div>
								<div class="col-md-8 col-6">
									<?=$row['Language']?>
								</div>
							</div>
							
							<hr />
							<div class="row">
								<div class="col-sm-3 col-md-2 col-5">
									<label style="font-weight:bold;">Edition</label>
								</div>
								<div class="col-md-8 col-6">
									<?=$row['Edition']?>
								</div>
							</div>
							<hr />

						</div>
					  
					</div>
				</div>
            </div>
		</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-12">
					<h3><u>Customer's Details</u></h3><br>
					<div class="tab-content ml-1" id="myTabContent">
						<div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
							

							<div class="row">
								<div class="col-sm-3 col-md-2 col-5">
									<label style="font-weight:bold;">Customer Name</label>
								</div>
								<div class="col-md-8 col-6">
									<?=$row['Customer_Name']?>
								</div>
							</div>
							<hr />

							<div class="row">
								<div class="col-sm-3 col-md-2 col-5">
									<label style="font-weight:bold;">Customer Email</label>
								</div>
								<div class="col-md-8 col-6">
									<?=$row['Customer_Email']?>
								</div>
							</div>
							<hr />
							
							
							<div class="row">
								<div class="col-sm-3 col-md-2 col-5">
									<label style="font-weight:bold;">Customer Phone</label>
								</div>
								<div class="col-md-8 col-6">
									<?=$row['Customer_Phone']?>
								</div>
							</div>
							<hr />
							<div class="row">
								<div class="col-sm-3 col-md-2 col-5">
									<label style="font-weight:bold;">Customer Address</label>
								</div>
								<div class="col-md-8 col-6">
									<?=$row['Customer_Address']?>
								</div>
							</div>
							<hr />

						</div>
					  
					</div>
				</div>
			</div>

		</div>
	</div>
		<?php } ?>
</div>


<?php include_once 'template/footer.php'; ?>