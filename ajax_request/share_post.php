<?php 
	include '../include/functions.php'; 
	$postId = addslashes(trim($_POST['post_id']));
	$arrPost = getSinglePost($postId);
	$userDetail = getOneUserDetailById($arrPost['user_id']);
	$strName = !empty($userDetail['details']['first_name']) ? $userDetail['details']['first_name'] : '';
?>
<div class="modal-dialog">
<!-- Modal content-->
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Share Post</h4>
  </div>
  <div class="modal-body">
    <form method="post">
    	<input type="hidden" name="post_id" value="<?php echo $postId; ?>">
    	<input type="hidden" name="user_id" value="1">
	  <div class="form-group">
	    <textarea class="form-control" name="message" placeholder="Enter your message"></textarea>
	    <!-- <input type="email" class="form-control" id="email"> -->
	  </div>
	  <div class="panel panel-default userpost">
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<img src="assets/images/male-profile.png" style="width: 30px;"> 
						<?php echo ucfirst($strName); ?>
					</div>
				</div>
				<?php if($arrPost['file_type'] == "image") { ?>
					<p><?php echo ucfirst($arrPost['message']); ?></p>
					<img src="uploads/<?php echo $arrPost['file_name']; ?>" width="100%" height="300px">
				<?php } elseif($arrPost['file_type'] == "video") { ?>
					<p><?php echo ucfirst($arrPost['message']); ?></p>
					<video width="100%" height="240" controls preload="none">
					  <source src="uploads/<?php echo $arrPost['file_name']; ?>" type="video/mp4">
					  Your browser does not support the video tag.
					</video>
				<?php } else { ?>
					<p><?php echo ucfirst($arrPost['message']); ?></p>
				<?php } ?>
			</div>
		</div>
	  <input type="submit" class="btn btn-default" value="Share" name="share">
	</form>
  </div>
</div>
</div>