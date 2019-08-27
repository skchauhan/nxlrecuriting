<?php 	
include("include/header.php");

if(isset($_POST['update_athlete'])) {
	updateAthlete();
}

$userId = !empty($_GET['uid']) ? $_GET['uid'] : '';
$arrOneUserDetail = getOneUserDetailById($userId);

// pre($arrOneUserDetail);

include("include/sidebar.php"); 
?>

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
		        	<form method="post" id="updateregisteruser" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		        		<input type="hidden" name="user_id" value="<?php echo $arrOneUserDetail['id']; ?>">
					  <div class="box-body">
		        		<h4>ACCOUNT INFORMATION</h4>
					    <div class="form-group">
					      <label for="username">Username*</label>
					      <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username" readonly="readonly" value="<?php echo !empty($arrOneUserDetail['username']) ? $arrOneUserDetail['username'] : ''; ?>">
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
					      <input type="text" class="form-control" id="firstname" placeholder="Enter First name" name="first_name"  value="<?php echo !empty($arrOneUserDetail['details']['first_name']) ? $arrOneUserDetail['details']['first_name'] : ''; ?>">
					    </div>
					    <div class="form-group">
					      <label for="lastname">Last Name*</label>
					      <input type="text" class="form-control" id="lastname" placeholder="Enter Last name" name="last_name" value="<?php echo !empty($arrOneUserDetail['details']['last_name']) ? $arrOneUserDetail['details']['last_name'] : ''; ?>">
					    </div>

					    <div class="form-group">
					      <label for="email">E-mail Address*</label>
					      <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo !empty($arrOneUserDetail['email']) ? $arrOneUserDetail['email'] : ''; ?>">
					    </div>

					    <div class="form-group">
					      <label for="c_email">Confirm E-mail Address*</label>
					      <input type="text" class="form-control" id="c_email" placeholder="Enter confirm email" name="c_email" value="<?php echo !empty($arrOneUserDetail['email']) ? $arrOneUserDetail['email'] : ''; ?>">
					    </div>

					    <h4>WOULD YOU LIKE TO SET UP AUTOMATIC RENEWALS?</h4>
					    <div class="form-check">
					    	<?php 
					    		$renewTime = !empty($arrOneUserDetail['billing_details']['automatic_renewals']) ? $arrOneUserDetail['billing_details']['automatic_renewals'] : '';
					    		
					    		if(!empty(athlete_plan)) {
					    			foreach (athlete_plan as $plan=>$plan_price) {
					    			$checked =	($renewTime == $plan.'-'.$plan_price) ? "checked" : '';
		    				?>
								    <input type="radio" <?php echo $checked; ?> class="form-check-input" id="revewals" name="revewals" value="<?php echo $plan; ?>-<?php echo $plan_price; ?>">
								    <label class="form-check-label" for="revewals">Yes, renew at $<?php echo $plan_price; ?> per <?php echo $plan; ?>.</label><br/>
		    				<?php
					    			}
					    		}
					    	?>
						</div>

					    <h4>BILLING ADDRESS</h4>

					    <div class="form-group">
					      <label for="bilfirstname">First Name*</label>
					      <input type="text" class="form-control" id="bilfirstname" placeholder="Enter First name" name="billing_first_name"  value="<?php echo !empty($arrOneUserDetail['billing_details']['first_name']) ? $arrOneUserDetail['billing_details']['first_name'] : ''; ?>">
					    </div>
					    <div class="form-group">
					      <label for="billastname">Last Name*</label>
					      <input type="text" class="form-control" id="billastname" placeholder="Enter Last name" name="billing_last_name" value="<?php echo !empty($arrOneUserDetail['billing_details']['last_name']) ? $arrOneUserDetail['billing_details']['last_name'] : ''; ?>">
					    </div>

					    <div class="form-group">
					      <label for="billastaddress">Address*</label>
					      <input type="text" class="form-control" id="pac-input" placeholder="Enter Address" name="billing_address" value="<?php echo !empty($arrOneUserDetail['billing_details']['address']) ? $arrOneUserDetail['billing_details']['address'] : ''; ?>">
					    </div>

					    <div class="form-group">
					      <label for="bilcity">City*</label>
					      <input type="text" class="form-control" id="billing_city" placeholder="Enter City" name="billing_city" value="<?php echo !empty($arrOneUserDetail['billing_details']['city']) ? $arrOneUserDetail['billing_details']['city'] : ''; ?>">
					    </div>

					    <div class="form-group">
					      <label for="bilcity">State*</label>
					      <input type="text" class="form-control" id="billing_state" placeholder="Enter state" name="billing_state" value="<?php echo !empty($arrOneUserDetail['billing_details']['state']) ? $arrOneUserDetail['billing_details']['state'] : ''; ?>">
					    </div>

					    <div class="form-group">
					      <label for="bilpostalcode">Postal Code*</label>
					      <input type="text" class="form-control" id="billing_postal_code" placeholder="Enter state" name="billing_postal_code" value="<?php echo !empty($arrOneUserDetail['billing_details']['postal_code']) ? $arrOneUserDetail['billing_details']['postal_code'] : ''; ?>">
					    </div>

					    <div class="form-group">
					      <label for="bilcountry">Country*</label>
					      <input type="text" class="form-control" id="billing_country" placeholder="Enter state" name="billing_country" value="<?php echo !empty($arrOneUserDetail['billing_details']['country']) ? $arrOneUserDetail['billing_details']['country'] : ''; ?>">
					    </div>

					    <div class="form-group">
					      <label for="phonenumber">Phone Number*</label>
					      <input type="text" class="form-control" id="phonenumber" placeholder="Enter Phone Number" name="phone_number"  value="<?php echo !empty($arrOneUserDetail['details']['phone']) ? $arrOneUserDetail['details']['phone'] : ''; ?>">
					    </div>

					  </div>
					  <!-- /.box-body -->
					  <div class="box-footer">
					    <input type="submit" class="btn btn-primary" name="update_athlete" value="Update">
					  </div>
					</form>
				</div>
			</div>
		</div>
	</section>	
</div>
<?php include("include/footer.php"); ?>