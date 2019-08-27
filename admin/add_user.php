<?php include("include/header.php"); 
	
	if(isset($_POST['register_user'])) {
		$arrOneUserDetail = $_POST;
		registerUser();
	}
?>

<?php include("include/sidebar.php"); ?>

<div class="content-wrapper" style="min-height: 895px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>User</h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
      	<?php include 'include/flash_message.php'; ?>
	        <div class="col-md-12">
	        	<div class="box box-primary">
		        	<form method="post" id="registeruser" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					  <div class="box-body">
					    <div class="form-group">
					      <label for="username">Username*</label>
					      <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username" value="<?php echo !empty($arrOneUserDetail['username']) ? $arrOneUserDetail['username'] : ''; ?>">
					    </div>
					    <div class="form-group">
					      <label for="password">Password*</label>
					      <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password">
					    </div>
					    <div class="form-group">
					      <label for="password">Confirm Password*</label>
					      <input type="password" class="form-control" id="password" placeholder="Confirm Password" name="c_password">
					    </div>
					    <div class="form-group">
					      <label for="firstname">First Name*</label>
					      <input type="text" class="form-control" id="firstname" placeholder="Enter First name" name="first_name"  value="<?php echo !empty($arrOneUserDetail['first_name']) ? $arrOneUserDetail['first_name'] : ''; ?>">
					    </div>
					    <div class="form-group">
					      <label for="lastname">Last Name*</label>
					      <input type="text" class="form-control" id="lastname" placeholder="Enter Last name" name="last_name" value="<?php echo !empty($arrOneUserDetail['last_name']) ? $arrOneUserDetail['last_name'] : ''; ?>">
					    </div>
					    <div class="form-group">
					      <label for="phonenumber">Phone Number*</label>
					      <input type="text" class="form-control" id="phonenumber" placeholder="Enter Phone Number" name="phone_number"  value="<?php echo !empty($arrOneUserDetail['phone_number']) ? $arrOneUserDetail['phone_number'] : ''; ?>">
					    </div>
					    <div class="form-group">
					      <label for="email">E-mail Address*</label>
					      <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo !empty($arrOneUserDetail['email']) ? $arrOneUserDetail['email'] : ''; ?>">
					    </div>
					    <div class="form-group">
					      <label for="address">Address*</label>
					      <textarea class="form-control" id="address" placeholder="Enter Address" name="address"><?php echo !empty($arrOneUserDetail['address']) ? $arrOneUserDetail['address'] : ''; ?></textarea>
					    </div>
					  </div>
					  <!-- /.box-body -->
					  <div class="box-footer">
					    <input type="submit" class="btn btn-primary" name="register_user" value="Register">
					  </div>
					</form>
				</div>
			</div>
		</div>
	</section>	
</div>




<?php include("include/footer.php"); ?>