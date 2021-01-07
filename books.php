
<?php include_once 'template/navbar.php'; ?>

<?php include_once 'add_to_cart.php'; ?>
		<?php 
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset ($_SESSION['msg']);
				}
		?>

<div class="container">
      <div class="row">

		  
	<?php 
		if(!isset($_SESSION['files'])){
			include_once 'database_con.php';
			$conn = connect();
			
			$sql = "SELECT * FROM book ";
			
			$result = $conn->query($sql);
		}else{
			$result = $_SESSION['files'];
			unset($_SESSION['files']);
		}	
			foreach($result AS $row){
			?>
		<div class="col-lg-3 col-md-4 mb-3">
		  <div class="col-lg-2 col-md-2 mb-3">
			 <div class="card" style="width:200px">
				<img class="card-img-top" src="img/Books/<?=$row['Image']?>" alt="Card image" style="width:100%">
				
				<div class="card-body">
					<div class="book_details">
					  <h6 class="card-title text-centre"><?=$row['Book_Title']?></h6>
					  <p class="card-text">by <?=$row['Author']?></p>
					  <p class="card-text">BDT Price:৳ <?=$row['Price']?></p><br>

					</div>
					
					<div class="book_add">
				  <?php 
					if(isset($_SESSION['loggedin']) && $_SESSION['user_role']==1 ){ ?>
						<a href="update_book.php?bookid=<?=$row['Book_Id']?>" class="btn add_cart details"><i class="fa fa-refresh" style="margin-right: 5px";></i>Update Book</a>
						<a href="delete_book.php?bookid=<?=$row['Book_Id']?>" class="btn add_cart details"><i class="fa fa-trash" style="margin-right: 5px";></i>Delete Book</a>
					<?php }else {?>
					<form method="GET" >
					  <input type="hidden" name="bookid" class="form-control quantity" value="<?=$row['Book_Id']?>"/>
					  <input type="text" name="quantity" class="form-control quantity" value="1"/>
					  <input type="submit" name="addtocart" class=" add_cart" id="addtocart" value="Add To Cart"/>
					  
					</form>
					
					  <!--<input type="submit" name="addtocart" class=" add_cart" id="addtocart" value="Add To Cart"/> -->
					  <a href="show_details.php?bookid=<?=$row['Book_Id']?>" class="btn add_cart details"><i class="fas fa-info-circle" style="margin-right: 5px";></i>See Details</a>
					<?php } ?>
					</div>
				</div>
			 </div>
			
		  </div>
        </div>
		<?php } ?>
            
          </div>
          <!-- /.row -->
</div>








<?php include_once 'template/footer.php'; ?>