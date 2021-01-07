<?php include_once 'template/header.php'; ?>
<?php include_once 'template/navbar.php'; ?>

 <div class="main_form">

        <!-- Sign up form -->
        
            <div class="container5">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
		<?php 
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset ($_SESSION['msg']);
				}
		?>
                        <form class="register-form" id="register-form" action="sign_up.php" method="POST">
                            <div class="form-group">
                                <label class="lbl" for="fName"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="fName" id="name" placeholder="First Name" required>
                            </div>
							<div class="form-group">
                                <label class="lbl" for="sName"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="sName" id="name" placeholder="Surname" required>
                            </div>
							<div class="form-group">
                                <label class="lbl" for="uName"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="uName" id="name" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <label class="lbl" for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" required>
                            </div>
                            <div class="form-group">
                                <label class="lbl" for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label class="lbl" for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="img/signup-image.jpg" alt="sing up image"></figure>
                        <a href="sign_in_form.php" class="signup-image-link">Already have an account??||Login</a>
                    </div>
                </div>
            </div>
        
 </div>



<?php include_once 'template/footer.php'; ?>