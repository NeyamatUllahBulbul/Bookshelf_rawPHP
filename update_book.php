<?php include_once 'template/header.php'; ?>
<?php include_once 'template/navbar.php'; ?>
<?php 

	$bookid=$_GET['bookid'];

	include_once 'database_con.php';
	$conn=connect();

	$sql = "SELECT * FROM book WHERE Book_Id = $bookid";
	$result = $conn->query($sql);
	foreach ($result as $row){
?>

<div class="row">
	<div class="col-md-12 mt-20 text-center" id="bd1"><h4>Update Book Description</h4></div>
</div><br>
<div class="container">
	<div class="row">
		<div class= "col-md-5">
			 <img src="img/Books/<?=$row['Image']?>" alt="New York">
		</div>
		<div class= "col-md-7">
  <form class="" action="UpBook.php" method="POST" >
  
  <h3>Book input to the store</h3><br>
		<?php 
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset ($_SESSION['msg']);
				}
		?>
		
	  <div class="form-row">
		<div class="form-group col-md-6">
		  <label for="title"><b>Title</b></label>
		  <input type="text" name="title" class="form-control" value ="<?=$row['Book_Title']?>" id="inputPassword4" placeholder="Title of the book" required>
		</div>
		<div class="form-group col-md-6">
		  <label for="author"><b>Author</b></label>
		  <input type="text" name="author" class="form-control" value ="<?=$row['Author']?>" id="inputPassword4" placeholder="Author's full name" required>
		</div>
	  </div>
	  <div class="form-row">
		<div class="form-group col-md-6">
		  <label for="publisher"><b>Publisher</b></label>
		  <input type="text" name="publisher" class="form-control" value ="<?=$row['Publisher']?>" id="inputPassword4" placeholder="Publisher's name" required>
		</div>
		<div class="form-group col-md-6">
		  <label for="price"><b>Price</b></label>
		  <input type="text" name="price" class="form-control" value ="<?=$row['Price']?>" id="inputPassword4" placeholder="Price of the book" required>
		</div>
	  </div>
	 <div class="form-row">
	  <div class="form-group col-md-6">
		<label for="topic"><b>Topic</b></label>
		<select class="form-control" name="topic" value ="<?=$row['Book_Type']?>" id="sel1">
			<option >Select</option>
			<option >Biography</option>
			<option >Children book</option>
			<option >Educational book</option>
			<option >Fiction</option>
			<option >Non-fiction</option>
			<option >Novel</option>
			<option >Science-fiction</option>
		  </select>
	  </div>
	  <div class="form-group col-md-6">
		<label for="topic"><b>Availability</b></label>
		<select class="form-control" name="qty" value ="<?=$row['qty']?>" id="sel1">
			<option >Available</option>
			<option >Unavailable</option>
		  </select>
	  </div>
	 </div><br>
	  <input type="hidden" name="bookid" class="form-control quantity" value="<?=$row['Book_Id']?>"/>

    <div class="form-row">        
      <div class="">
        <button type="submit" class="btn add_cart details ml-2"><b>Update</b></button>
		<a href="delete_book.php?bookid=<?=$row['Book_Id']?>" class="btn add_cart details"><i class="fa fa-trash" style="margin-right: 5px";></i>Delete Book</a>
      </div>
    </div>
  </form>
		</div>
				<?php } ?>
	</div>
</div>	<br>	
			
			
			

<?php include_once 'template/footer.php'; ?>