<?php include_once 'template/header.php'; ?>
<?php include_once 'template/navbar.php'; ?>

<div class="container">
  <div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
  
  
     <h3>Order Details</h3>
			<div>
				<table class="table table-hover table-fixed" style="height: 400px;">
				
					<tr>
						<th class="th-lg">Book Title</th>
						<th class="th-lg">Author</th>
						<th class="th-lg">Quantity</th>
						<th class="th-lg">Price</th>
						<th class="th-lg">Total</th>
						<th class="th-lg">Action</th>
					</tr>
					<?php				
						include_once 'database_con.php';
							$conn = connect();
							$total = 0;
							$session_id = session_id();
							$sql = "SELECT cart.*, book.*
							FROM cart 
							INNER JOIN book ON cart.Book_Id = book.Book_Id	
							WHERE  cart.Session_Id = '$session_id'";
							$result = $conn->query($sql);
							
							if ($result  !=false){
								foreach($result AS $row){
								 
									
								
					?>
						<tr>
							<td><?=$row['Book_Title']?></td>
							<td><?=$row['Author']?></td>
							<td><?=$row['Book_Quantity']?></td>
							<td><?=$row['Price']?></td>
							<td><?=$row['Book_Quantity']*$row['Price']?></td>
							<td><a href="books.php?action=delete&id=<?=$row["Book_Id"];?>"><span class="text-danger">Remove</span></a></td>
						</tr>
					
						
				<?php	
					$total = $total + ($row['Book_Quantity']*$row['Price']);
				
					} 
				}
				?>
						<tr>
							<td colspan="5" align="right">Total</td>
							<td align="right">৳ <?php echo number_format($total, 2); ?></td>
							<td></td>
					</tr>
				
						
				</table>
			</div>
			</div>
			<div class="col-md-2"></div>
			</div>
			
			<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8 col-md-offset-2">
			<div class="block billing-details">
                  <h4 class="widget-title">Billing Details</h4>
				<?php 
					if(isset($_GET['msg'])){
						$msg = $_GET['msg'];?>
						<div class="container text-center">
							<p class="alert alert-warning "><i class="fas fa-exclamation-triangle "></i><?php echo $msg; ?></p>
						</div>
				<?php } ?>
                  <form class="checkout-form" method="POST" action="confirm_buy.php">
                     <div class="form-group">
                        <label for="full_name">Full Name</label>
                        <input type="text" class="form-control" name="fname" placeholder="">
                     </div>
                     <div class="form-group">
                        <label for="user_address">Address</label>
                        <input type="text" class="form-control" name="caddress" placeholder="">
                     </div>
					 <div class="form-group">
                        <label for="phone">Contact number</label>
                        <input type="text" class="form-control" name="phone" placeholder="">
                     </div>
                     <div class="checkout-country-code clearfix">
                        <div class="form-group">
                           <label for="user_post_code">Zip Code</label>
                           <input type="text" class="form-control" name="post_code" name="zipcode" >
                        </div>
                        <div class="form-group" >
                           <label for="user_city">City</label>
                           <input type="text" class="form-control" name="city" name="city">
                           <input type="hidden" class="form-control" name="sum_total" name="total" value="<?=$total?>">
                        </div>
                     </div>
                     <div class="form-group">
                        <input type="submit" class="btn add_cart mb-2" name="confirm" value="Confirm Buy">
                     </div>
                  </form>
               </div>
              </div>
			  <div class="col-md-2"></div>
			 </div>
			 </div>


<?php include_once 'template/footer.php'; ?>