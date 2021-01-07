<?php include_once 'template/header.php'; ?>
<?php include_once 'template/navbar.php'; ?>

<?php if(!isset($_SESSION['loggedin'])){
	header('location:sign_in_form.php');
} ?>
<div class="container6">
                <div class="signup-content">
                    <div class="update-form">
                        <h3 class="form-title">Change Password</h3>
		<?php 
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset ($_SESSION['msg']);
				}
		?>
                        <form class="register-form" id="register-form" action="change_pass.php" method="POST">
							  <div class="form-group">
								<label for="inputAddress2"><b>Current password</b></label>
								<input type="password" name="cPass" class="form-control" id="inputAddress2" required>
							  </div>
							  <div class="form-group">
								<label for="inputAddress2"><b>New password</b></label>
								<input type="password" name="newPass" class="form-control" id="inputAddress2" required>
							  </div>
							  
                            <div class="form-group form-button text-center">
                                <input type="submit" name="updatebtn" id="signup" class="form-submit" value="Change password"/>
                            </div>
                        </form>
					</div>
					<div class="update-image">
                        <figure><img src="img/update.png" alt="sing up image"></figure>
                    </div>
					
                </div>
</div>
<?php include_once 'template/footer.php'; ?>