<?php include("include/header.php"); 

	if(isset($_POST['register_athlete'])) {
	    $arrOneUserDetail = $_POST;
	    registerAthlete();
	}
?>

<?php include("include/sidebar.php"); ?>

<div class="content-wrapper" style="min-height: 895px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>New Athlete</h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
      	<?php include 'include/flash_message.php'; ?>
	        <div class="col-md-12">
	        	<div class="box box-primary">
		        	<form method="post" id="registeruser" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					  <div class="box-body">
		        		<h4>ACCOUNT INFORMATION</h4>
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
					      <label for="email">E-mail Address*</label>
					      <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo !empty($arrOneUserDetail['email']) ? $arrOneUserDetail['email'] : ''; ?>">
					    </div>

					    <div class="form-group">
					      <label for="c_email">Confirm E-mail Address*</label>
					      <input type="text" class="form-control" id="c_email" placeholder="Enter confirm email" name="c_email" value="<?php echo !empty($arrOneUserDetail['c_email']) ? $arrOneUserDetail['c_email'] : ''; ?>">
					    </div>

					    <h4>WOULD YOU LIKE TO SET UP AUTOMATIC RENEWALS?</h4>
					    <div class="form-check">
					    	<?php 
					    		if(!empty(athlete_plan)) {
					    			foreach (athlete_plan as $plan=>$plan_price) {
		    				?>
								    <input type="radio" class="form-check-input" id="revewals" name="revewals" value="<?php echo $plan; ?>-<?php echo $plan_price; ?>">
								    <label class="form-check-label" for="revewals">Yes, renew at $<?php echo $plan_price; ?> per <?php echo $plan; ?>.</label><br/>
		    				<?php
					    			}
					    		}
					    	?>
						</div>

					    <h4>BILLING ADDRESS</h4>

					    <div class="form-group">
					      <label for="bilfirstname">First Name*</label>
					      <input type="text" class="form-control" id="bilfirstname" placeholder="Enter First name" name="billing_first_name"  value="<?php echo !empty($arrOneUserDetail['billing_first_name']) ? $arrOneUserDetail['billing_first_name'] : ''; ?>">
					    </div>
					    <div class="form-group">
					      <label for="billastname">Last Name*</label>
					      <input type="text" class="form-control" id="billastname" placeholder="Enter Last name" name="billing_last_name" value="<?php echo !empty($arrOneUserDetail['billing_last_name']) ? $arrOneUserDetail['billing_last_name'] : ''; ?>">
					    </div>

					    <div class="form-group">
					      <label for="billastaddress">Address*</label>
					      <input type="text" class="form-control" id="pac-input" placeholder="Enter Address" name="billing_address" value="<?php echo !empty($arrOneUserDetail['billing_address']) ? $arrOneUserDetail['billing_address'] : ''; ?>">
					    </div>

					    <div class="form-group">
					      <label for="bilcity">City*</label>
					      <input type="text" class="form-control" id="billing_city" placeholder="Enter City" name="billing_city" value="<?php echo !empty($arrOneUserDetail['billing_city']) ? $arrOneUserDetail['billing_city'] : ''; ?>">
					    </div>

					    <div class="form-group">
					      <label for="bilcity">State*</label>
					      <input type="text" class="form-control" id="billing_state" placeholder="Enter state" name="billing_state" value="<?php echo !empty($arrOneUserDetail['billing_state']) ? $arrOneUserDetail['billing_state'] : ''; ?>">
					    </div>

					    <div class="form-group">
					      <label for="bilpostalcode">Postal Code*</label>
					      <input type="text" class="form-control" id="billing_postal_code" placeholder="Enter state" name="billing_postal_code" value="<?php echo !empty($arrOneUserDetail['billing_postal_code']) ? $arrOneUserDetail['billing_postal_code'] : ''; ?>">
					    </div>

					    <div class="form-group">
					      <label for="bilcountry">Country*</label>
					      <input type="text" class="form-control" id="billing_country" placeholder="Enter state" name="billing_country" value="<?php echo !empty($arrOneUserDetail['billing_country']) ? $arrOneUserDetail['billing_country'] : ''; ?>">
					    </div>

					    <div class="form-group">
					      <label for="phonenumber">Phone Number*</label>
					      <input type="text" class="form-control" id="phonenumber" placeholder="Enter Phone Number" name="phone_number"  value="<?php echo !empty($arrOneUserDetail['phone_number']) ? $arrOneUserDetail['phone_number'] : ''; ?>">
					    </div>

					  </div>
					  <!-- /.box-body -->
					  <div class="box-footer">
					    <input type="submit" class="btn btn-primary" name="register_athlete" value="Register">
					  </div>
					</form>
				</div>
			</div>
		</div>
	</section>	
</div>




<?php include("include/footer.php"); ?>