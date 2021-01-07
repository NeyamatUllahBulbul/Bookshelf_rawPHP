<?php include_once 'template/header.php'; ?>
<?php include_once 'template/navbar.php'; ?>

<!-- Sing in  Form -->
<div class="main_form">
        <section class="sign-in">
            <div class="container5">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="img/signin-image.jpg" alt="sing up image"></figure>
                        <a href="sign_up_form.php" class="signup-image-link"><b>Create an account</b></a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign in</h2>
				<?php 
					if(!isset($_COOKIE['loginCounter'])){?>
                        <form class="register-form" id="login-form" action="sign_in.php" method="POST">
						<?php 
							if(isset($_SESSION['msg'])){
								echo $_SESSION['msg'];
								unset ($_SESSION['msg']);
								}
						?>
							
                            <div class="form-group">
                                <label class="lbl" for="uName"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="uName" id="your_name" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <label class="lbl" for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="your_pass" placeholder="Password" required>
                            </div>
                           
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in">
                            </div>
                        </form>
					<?php }else{
						echo 'Please try again after a few minutes';
							} ?>
                        <div class="social-login">
                            <span class="social-label"><b>Or login with</b></span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
	</div>

<?php include_once 'template/footer.php'; ?>