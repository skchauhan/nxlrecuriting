<?php include("include/header.php"); 

	$arrOneUserDetail = [];
	$userId = !empty($_GET['uid']) ? $_GET['uid'] : '';
	if(!empty($userId)) {
		$arrOneUserDetail = getOneUserDetailById($userId);
	}

	if(isset($_POST['update_user'])) {
	    updateUser();
	}
?>

<?php include("include/sidebar.php"); ?>

<div class="content-wrapper" style="min-height: 895px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Edit User</h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
      	<?php include 'include/flash_message.php'; ?>
	        <div class="col-md-12">
	        	<div class="box box-primary">
		        	<form id="updateregisteruser" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		        	  <input type="hidden" name="user_id" value="<?php echo $userId; ?>">
					  <div class="box-body">
					    <div class="form-group">
					      <label for="username">Username</label>
					      <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username" readonly="readonly" value="<?php echo !empty($arrOneUserDetail['username']) ? $arrOneUserDetail['username'] : ''; ?>">
					    </div>
					    <div class="form-group">
					      <label for="password">Password</label>
					      <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password">
					    </div>
					    <div class="form-group">
					      <label for="password">Confirm Password</label>
					      <input type="password" class="form-control" id="password" placeholder="Confirm Password" name="c_password">
					    </div>
					    <div class="form-group">
					      <label for="firstname">First Name</label>
					      <input type="text" class="form-control" id="firstname" placeholder="Enter First name" name="first_name"  value="<?php echo !empty($arrOneUserDetail['details']['first_name']) ? $arrOneUserDetail['details']['first_name'] : ''; ?>">
					    </div>
					    <div class="form-group">
					      <label for="lastname">Last Name</label>
					      <input type="text" class="form-control" id="lastname" placeholder="Enter Last name" name="last_name" value="<?php echo !empty($arrOneUserDetail['details']['last_name']) ? $arrOneUserDetail['details']['last_name'] : ''; ?>">
					    </div>
					    <div class="form-group">
					      <label for="phonenumber">Phone Number</label>
					      <input type="text" class="form-control" id="phonenumber" placeholder="Enter Phone Number" name="phone_number"  value="<?php echo !empty($arrOneUserDetail['details']['phone']) ? $arrOneUserDetail['details']['phone'] : ''; ?>">
					    </div>
					    <div class="form-group">
					      <label for="email">E-mail Address</label>
					      <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo !empty($arrOneUserDetail['email']) ? $arrOneUserDetail['email'] : ''; ?>">
					    </div>
					    <div class="form-group">
					      <label for="address">Address</label>
					      <input type="text" class="form-control" id="address" placeholder="Enter Last name" name="address" value="<?php echo !empty($arrOneUserDetail['details']['address']) ? $arrOneUserDetail['details']['address'] : ''; ?>">
					    </div>
					  </div>
					  <!-- /.box-body -->
					  <div class="box-footer">
					    <input type="submit" class="btn btn-primary" name="update_user" value="Update">
					  </div>
					</form>
				</div>
			</div>
		</div>
	</section>	
</div>




<?php include("include/footer.php"); ?>