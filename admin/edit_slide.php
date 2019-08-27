<?php include("include/header.php"); 
	
	if(isset($_POST['update_slide'])) {
		updateSlide();
	}

	$intId = !empty($_GET['id']) ? $_GET['id'] : '';
	if(!empty($intId)) {
		$arrSlide = getOneSlideById($intId);
	}


?>

<?php include("include/sidebar.php"); ?>

<div class="content-wrapper" style="min-height: 895px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Edit Slider</h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
      	<?php include 'include/flash_message.php'; ?>
	        <div class="col-md-12">
	        	<div class="box box-primary">
		        	<form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		        		<input type="hidden" name="id" value="<?php echo $intId; ?>">
					  <div class="box-body">
					    <div class="form-group">
					      <label for="title">Title*</label>
					      <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="<?php echo !empty($arrSlide['title']) ? $arrSlide['title'] : ''; ?>">
					    </div>

					    <div class="form-group">
					      <label for="description">Description*</label>
					      <textarea class="form-control" id="description" placeholder="Enter description" name="description"><?php echo !empty($arrSlide['description']) ? $arrSlide['description'] : ''; ?></textarea>
					    </div>

					    <div class="form-group">
					      <label for="image">Image*</label>
					      <input type="file" class="form-control" id="image" placeholder="Choose image" name="image" value="<?php echo !empty($arrSlide['image']) ? $arrSlide['image'] : ''; ?>">
					      <?php 
					      	if(!empty($arrSlide['image'])) {
					      		if(file_exists('slider/'.$arrSlide['image'])) {
				      			?>
				      			<img src="slider/<?php echo $arrSlide['image']; ?>" alt="" width="100px">
				      			<?php 
					      		}
					      	}
					      ?>
					    </div>

					    <div class="form-group">
					      <label for="button_link">Button Link*</label>
					      <input type="text" class="form-control" id="button_link" placeholder="Enter button link" name="button_link" value="<?php echo !empty($arrSlide['button_link']) ? $arrSlide['button_link'] : ''; ?>">
					    </div>
					    
					  </div>
					  <!-- /.box-body -->
					  <div class="box-footer">
					    <input type="submit" class="btn btn-primary" name="update_slide" value="Submit">
					  </div>
					</form>
				</div>
			</div>
		</div>
	</section>	
</div>




<?php include("include/footer.php"); ?>