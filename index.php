<?php include 'include/header.php'; 
	if(isset($_POST['publish'])) {
		addPost();
	}

	if(isset($_POST['share'])) {
		sharePost();
	}

	$arrAllPost = getAllPost();
?>

<div class="container">
	<div class="row">
		<div class="col-sm-4"></div>
    	<div class="col-sm-4">
			<?php include 'include/flash_message.php'; ?>
		   <h2>Post</h2>
		   <form method="post" enctype="multipart/form-data" id="fileUploadForm">
			   <div class="form-group">
			      <textarea class="form-control" id="email" placeholder="Enter message" name="message"></textarea>
			   </div>
			   <div class="form-group">
			      <input type="file" class="form-control" id="file" placeholder="choose file" name="image">
			   </div>
		      <input type="submit" class="btn btn-default" id="postpublish" value="Publish" name="publish">
		   </form>
		</div>
		<div class="col-sm-4"></div>
	</div>
	<div class="row" style="margin-top: 50px">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
			<?php 
				if(!empty($arrAllPost)) {
					foreach ($arrAllPost as $arrPost) {
						$userId = 1;
						//get all POst like
						$intTotalLike = getSinglePostAllLike($arrPost['id']);
						//get post user details
						$arrUserDetails = getOneUserDetailById($arrPost['user_id']);
						//get Check Post Like User
						$intCheckPostLikeUser = getCheckPostLikeUser($userId, $arrPost['id']);

						$strName = !empty($arrUserDetails['details']['first_name']) ? $arrUserDetails['details']['first_name'] : '';
					?>
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

								<div class="row">
									<div class="col-sm-2">
										<span class="like-count"><?php echo $intTotalLike; ?></span>
										<a class="post-like <?php echo ($intCheckPostLikeUser==1) ? 'active': ''; ?>" data-likeaction="<?php echo !empty($intCheckPostLikeUser) ? 1 : 0; ?>" data-postid="<?php echo $arrPost['id']; ?>">Like</a>
									</div>
									<div class="col-sm-3">
									</div>
									<div class="col-sm-2">
										<a class="post_comment">Comment</a>										
									</div>
									<div class="col-sm-3">
									</div>
									<div class="col-sm-2" style="text-align: right;">
										<a class="share-post" data-postid="<?php echo $arrPost['id']; ?>">share</a>
									</div>
								</div>

								<div class="comment_form" style="display: none;">
									<form method="POST" class="post-comment-form">
										<input type="hidden" name="postid" class="postid" value="<?php echo $arrPost['id']; ?>">
										<input type="hidden" name="userid" value="1">
										<input type="hidden" name="name" value="test">
									    <div class="form-group">
									     <textarea name="comment_content" class="form-control comment_content" placeholder="Enter Comment" rows="2"></textarea>
									    </div>
									    <div class="form-group">
									     <input type="hidden" name="comment_id" class="comment_id" value="0" />
									     <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
									    </div>
									</form>
								</div>
								<div id="display_comment">
									<?php echo getAllPostComment($arrPost['id']); ?>
								</div>

							</div>
						</div>
					<?php }
				} else {
			?>

		 	<?php }?>
		</div>
		<div class="col-sm-3"></div>
	</div>
</div>

<!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

<!-- Modal -->
<div id="sharepost" class="modal fade" role="dialog" data-backdrop="static">
</div>

<?php include 'include/footer.php'; ?>