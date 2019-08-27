<?php include("include/header.php"); 
	
	if(isset($_POST['add_slide'])) {
		$arrOneUserDetail = $_POST;
		addSlide();
	}
?>

<?php include("include/sidebar.php"); ?>

<div class="content-wrapper" style="min-height: 895px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Slider</h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
      	<?php include 'include/flash_message.php'; ?>
	        <div class="col-md-12">
	        	<div class="box box-primary">
		        	<form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					  <div class="box-body">
					    <div class="form-group">
					      <label for="title">Title*</label>
					      <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="<?php echo !empty($arrOneUserDetail['title']) ? $arrOneUserDetail['title'] : ''; ?>">
					    </div>

					    <div class="form-group">
					      <label for="description">Description*</label>
					      <textarea class="form-control" id="description" placeholder="Enter description" name="description"><?php echo !empty($arrOneUserDetail['description']) ? $arrOneUserDetail['description'] : ''; ?></textarea>
					    </div>

					    <div class="form-group">
					      <label for="image">Image*</label>
					      <input type="file" class="form-control" id="image" placeholder="Choose image" name="image" value="<?php echo !empty($arrOneUserDetail['image']) ? $arrOneUserDetail['image'] : ''; ?>">
					    </div>

					    <div class="form-group">
					      <label for="button_link">Button Link*</label>
					      <input type="text" class="form-control" id="button_link" placeholder="Enter button link" name="button_link" value="<?php echo !empty($arrOneUserDetail['button_link']) ? $arrOneUserDetail['button_link'] : ''; ?>">
					    </div>
					    
					  </div>
					  <!-- /.box-body -->
					  <div class="box-footer">
					    <input type="submit" class="btn btn-primary" name="add_slide" value="Submit">
					  </div>
					</form>
				</div>
			</div>
		</div>
	</section>	
</div>




<?php include("include/footer.php"); ?>