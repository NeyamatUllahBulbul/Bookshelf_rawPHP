<?php include_once 'template/header.php'; ?>
<?php include_once 'template/navbar.php'; ?>
<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/delivery.png" alt="Scared of Phising!">
      <div class="carousel-caption">
        <h3>Expecting your book in minimum time??</h3>
        <p>Let's do it!</p>
		<button type="button" class="btn btn-outline-info joinus"><a href="sign_up_form.php"><b>Order Now</b></a></button>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="img/blog.png" alt="Protect yourself!">
      <div class="carousel-caption">
        <h3>Are you a Blogger?? Want to read blog??</h3>
        <p>Register first if you are not already</p>
		<button type="button" class="btn btn-outline-info joinus"><a href="sign_up_form.php"><b>See Blog</b></a></button>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="img/review.png" alt="New York">
      <div class="carousel-caption">
        <h3>Write review, Get review</h3>
        <p>Let's help you choosing a book.</p>
		<button type="button" class="btn btn-outline-info joinus"><a href="sign_up_form.php"><b>See Review</b></a></button>
      </div>   
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

  <!-- About Section -->
  <section class="bg-primary text-white mb-0" id="about">
		
</div><br><br>
      <h2 class="text-center text-uppercase text-white">About Us</h2>
      <hr class="star-light mb-3">
      <div class="aboutUs"><p style="font-size:20px;text-align: center; margin-left:100px;margin-right:100px;" >BookShelf.com is an online marketplace for books. Millions of brand new books, rare books, and out-of-print books are offered for sale through the BookShelf.com  websites from thousands of booksellers around the whole country.  Readers can find bestsellers, collectors can find rare books, students can find new textbooks, and treasure hunters can find long-lost books.

 

Our mission is to help people find and buy any book from any bookseller and our business stretches around the county. The unique inventory of books for sale from booksellers includes the country’s and world’s finest antiquarian books dating back to the 15th century, countless out-of-print gems, millions of signed books, millions of used copies, a vast selection of college textbooks and new books too.

 

BookShelf.com  remains a company with a passion for books. Booksellers love BookShelf.com  for helping them to sell books to buyers around the globe – 24 hours a day, 365 days a year.  Buyers love BoiBazar for helping them to find and purchase books from the vast online inventory.
	</p></div>
	<div class="row text-center">
	<div class="col-md-4 col-sm-4 ">
	</div>
	 <div class="col-md-4 col-sm-4 ">
	</div>
	</div>
  </section><br>
  <div class="container-fluid" id="sec2">
	<div class="row text-center">
		<div class="col-md-12 ">
			<h1 class="display-12">Why Us?</h1>
		</div>
	<div class= "col-xs-12 col-sm-6 col-md-4">
		<i class="fas fa-cart-plus fa-2x"></i>
		<h3>PRE ORDER</h3>
		<p>You can order for any unavailable book</p>
	</div>
	<div class= "col-xs-12 col-sm-6 col-md-4">
		<i class="fas fa-hand-holding-usd fa-2x"></i>
		<h3>30- DAY RETURN</h3>
		<p>Moneyback guarantee</p>
	</div>
	<div class= "col-xs-12 col-sm-6 col-md-4">
		<i class="fas fa-truck fa-2x"></i>
		<h3>FREE SHIPPING</h3>
		<p>On oder over $100</p>
	</div>
	</div>
	</div>
	<br>
  <!-- Portfolio Section -->


    <div class="container">
	<h2 class="text-center " style="text-decoration:underline";>PORTFOLIO</h2><br><br>



          <div class="row">
 <?php 
		include_once 'database_con.php';
	    $conn = connect();
		
		$sql = "SELECT * FROM portfolio ";
		
		$result = $conn->query($sql);	
		foreach($result AS $row){
		?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="img/Portfolio/<?=$row['Image']?>" alt=""></a>
                <div class="card-body text-center">
                  <p><b><?=$row['Title']?></b></p>
                </div>
              </div>
            </div>
		<?php } ?>
            
          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>


  <?php include_once 'template/footer.php'; ?>


