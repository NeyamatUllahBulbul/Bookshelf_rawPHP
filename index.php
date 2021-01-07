<?php include_once 'template/header.php'; ?>
<?php include_once 'template/navbar.php'; ?>
<?php include_once 'add_to_cart.php'; ?>
<br>
<div id="quotes" class="carousel slide" data-ride="carousel">

	<div class="container" id="quotes_body">
		<div class="row text-center">
		
		    <div class="carousel-inner">
				<div class="carousel-item active">
				   <div class="mySlides">
					<q>The greatest glory in living lies not in never falling, but in rising every time we fall.</q>
					<p class="author">- Nelson Mandela</p>
				</div>
				  </div>
				
				<div class="carousel-item">
					<div class="mySlides">
						<q>If you set your goals ridiculously high and it's a failure, you will fail above everyone else's success.</q>
						<p class="author">- James Cameron</p>
					</div>
				</div>
				<div class="carousel-item">
				  <div class="mySlides">
					<q>The way to get started is to quit talking and begin doing.</q>
					<p class="author">- Walt Disney</p>
				</div>
				</div>
			</div>
		</div>
	</div>
	 <a class="carousel-control-prev" href="#quotes" data-slide="prev">
		<span class="carousel-control-prev-icon"></span>
	  </a>
	  <a class="carousel-control-next" href="#quotes" data-slide="next">
		<span class="carousel-control-next-icon"></span>
	  </a>
</div>

<div class="row">
	<div class="col-md-12 mt-20 text-center" id="bd1"><h4>Latest Novels</h4></div>
</div><br>
<div class="container">
      <div class="row">

		  
		<?php 
			include_once 'database_con.php';
			$conn = connect();
			
			$sql = "SELECT * FROM book WHERE Book_Type='novel' ORDER BY Entry_Time DESC LIMIT 4 ";
			$result = $conn->query($sql);
			
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

</div>

<div class="row">
	<div class="col-md-12 mt-20 text-center" id="bd1"><h4>Latest Biography books</h4></div>
</div><br>
<div class="container">
      <div class="row">

		  
		<?php 
			include_once 'database_con.php';
			$conn = connect();
			
			$sql = "SELECT * FROM book WHERE Book_Type='biography' ORDER BY Entry_Time DESC LIMIT 4 ";
			$result = $conn->query($sql);
			
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

</div>

<div class="row">
	<div class="col-md-12 mt-20 text-center" id="bd1"><h4>Latest Fiction books</h4></div>
</div><br>
<div class="container">
      <div class="row">

		  
		<?php 
			include_once 'database_con.php';
			$conn = connect();
			
			$sql = "SELECT * FROM book WHERE Book_Type='fiction' ORDER BY Entry_Time DESC LIMIT 4 ";
			$result = $conn->query($sql);
			
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
</div>

<div class="row">
	<div class="col-md-12 mt-20 text-center" id="bd1"><h4>Latest Non-fiction books</h4></div>
</div><br>
<div class="container">
      <div class="row">

		  
		<?php 
			include_once 'database_con.php';
			$conn = connect();
			
			$sql = "SELECT * FROM book WHERE Book_Type='Non-fiction' ORDER BY Entry_Time DESC LIMIT 4 ";
			$result = $conn->query($sql);
			
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
</div>

<div class="row">
	<div class="col-md-12 mt-20 text-center" id="bd1"><h4>Latest Science-fiction books</h4></div>
</div><br>
<div class="container">
      <div class="row">

		  
		<?php 
			include_once 'database_con.php';
			$conn = connect();
			
			$sql = "SELECT * FROM book WHERE Book_Type='Science-fiction' ORDER BY Entry_Time DESC LIMIT 4 ";
			$result = $conn->query($sql);
			
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
</div>

<div class="row">
	<div class="col-md-12 mt-20 text-center" id="bd1"><h4>Latest Educational books</h4></div>
</div><br>
<div class="container">
      <div class="row">

		  
		<?php 
			include_once 'database_con.php';
			$conn = connect();
			
			$sql = "SELECT * FROM book WHERE Book_Type='Educational book' ORDER BY Entry_Time DESC LIMIT 4 ";
			$result = $conn->query($sql);
			
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
</div>

<div class="row">
	<div class="col-md-12 mt-20 text-center" id="bd1"><h4>Latest Children's books</h4></div>
</div><br>
<div class="container">
      <div class="row">

		  
		<?php 
			include_once 'database_con.php';
			$conn = connect();
			
			$sql = "SELECT * FROM book WHERE Book_Type='children book' ORDER BY Entry_Time DESC LIMIT 4 ";
			$result = $conn->query($sql);
			
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
</div>

<?php include_once 'template/footer.php'; ?>