<?php include_once 'template/header.php'; ?>
<?php include_once 'template/navbar.php'; ?>
<div class="container7">
	<div class="row">
  <form class="" action="contact.php" method="POST">
  
  <h3>Send us a feedback, suggestion or query</h3><br>
		<?php 
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset ($_SESSION['msg']);
				}
		?>
	  <div class="form-row">
		<div class="form-group col-md-6">
		  <label for="name"><b>Name</b></label>
		  <input type="text" name="name" class="form-control" id="inputPassword4" placeholder="Enter your full name" required>
		</div>
		<div class="form-group col-md-6">
		  <label for="email"><b>Email</b></label>
		  <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Enter your Email" required>
		</div>
	  </div>
	  <div class="">
        <label class="" for="pwd"><b>Write your message</b></label>
      <div class="">          
        <textarea class="form-control " name="message" id="blogForm"  rows="4" placeholder="Please write your message here."></textarea>
      </div>
      </div>
    </div><br><br>
    <div class="form-row">        
      <div class="">
        <button type="submit" class="btn msg btn-primary"><b>Send message </b></button>
      </div>
    </div>
  </form>
  </div>
</div>
<?php include_once 'template/footer.php'; ?>