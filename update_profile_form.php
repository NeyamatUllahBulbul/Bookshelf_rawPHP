<?php include_once 'template/header.php'; ?>
<?php include_once 'template/navbar.php'; ?>
<?php 

$uid = $_SESSION['user_id'];

    if(!$_SESSION['loggedin']){
        header("location:sign_in_form.php");
    }

    include_once 'database_con.php';
    $conn = connect();

    $sql = "SELECT * FROM member WHERE Member_ID = '$uid'";
    $result = $conn->query($sql);
	
	foreach($result AS $row){

?>

<div class="container6">
                <div class="signup-content">
                    <div class="update-form">
                        <h2 class="form-title">Update profile</h2>
		<?php 
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset ($_SESSION['msg']);
				}
		?>
                        <form class="register-form" id="register-form" action="update_profile.php" method="POST">
							<div class="form-row">
								<div class="form-group col-md-6">
								  <label for="inputEmail4">First name</label>
								  <input type="text" class="form-control" id="inputEmail4" value ="<?=$row['First_Name']?>" name="fName" required>
								</div>
								<div class="form-group col-md-6">
								  <label for="inputEmail4">Surname</label>
								  <input type="text" class="form-control" id="inputEmail4" value ="<?=$row['Surname']?>" name="sName" required>
								</div>
							  </div>
							  <div class="form-group">
								<label for="inputAddress">Email</label>
								<input type="email" class="form-control" id="inputAddress" value ="<?=$row['Email']?>" name="email" required>
							  </div>
							  
                            <div class="form-group form-button text-center">
                                <input type="submit" name="updatebtn" id="signup" class="form-submit" value="Update profile"/>
                            </div>
                        </form>
					</div>
					<div class="update-image">
                        <figure><img src="img/update.png" alt="sing up image"></figure>
						<button type="button"  class="btn chngpass btn-outline-info"><a href="change_pass_form.php"><b>Change password</b></a></button>
						<button type="button" class="btn delac btn-outline-info"><a href="delete_profile.php"><b>Delete account</b></a></button>
                    </div>
					
                </div>
</div>
	<?php } ?>

<?php include_once 'template/footer.php'; ?>