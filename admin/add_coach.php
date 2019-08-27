<?php include("include/header.php"); 
	
	if(isset($_POST['register_coach'])) {
		$arrOneUserDetail = $_POST;
		registerCoach();
	}
?>

<?php include("include/sidebar.php"); ?>

<div class="content-wrapper" style="min-height: 895px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Coach</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
      	<?php include 'include/flash_message.php'; ?>
	        <div class="col-md-12">
	        	<div class="box box-primary">
		        	<form id="registeruser" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
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
					      <label for="firstname">School*</label>
					      <input type="text" class="form-control" id="school" placeholder="Enter School Name" name="school" value="<?php echo !empty($arrOneUserDetail['school']) ? $arrOneUserDetail['school'] : ''; ?>">
					    </div>
					    <div class="form-group">
					      <label for="firstname">Sports Coached*</label>
					      <input type="text" class="form-control" id="sports_coached" placeholder="Enter Sports Coached" name="sports_coached" value="<?php echo !empty($arrOneUserDetail['sports_coached']) ? $arrOneUserDetail['sports_coached'] : ''; ?>">
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
					    <input type="submit" class="btn btn-primary" name="register_coach" value="Register">
					  </div>
					</form>
				</div>
			</div>
		</div>
	</section>	
</div>




<?php include("include/footer.php"); ?>