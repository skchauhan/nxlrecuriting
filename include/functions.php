<?php 
include 'config.php';
include 'constants.php';

function pre($data) {
	if(is_array($data) || is_object($data)) {
		print "<pre>";
		print_r($data);
		print "</pre>";
	} else {
		echo "<pre>";
		echo $data;
		echo "</pre>";
	}
}

function checkLoginUser() {
	if(!empty($_SESSION['email'])) {
		header("Location:".site_url.'/dashboard.php');
	} 
}

function checkLogoutUser() {
	if(empty($_SESSION['email'])) {
		header("Location:".site_url);
	} 	
}

function userLogin() {
	global $conn;
	$strEmail = $_POST['email'];
	$strPassword = $_POST['password'];
	if(!empty($strEmail) && !empty($strPassword)) {
		$strPassword = md5($strPassword);
		$sql = "SELECT * FROM users where (email = '$strEmail' or username = '$strEmail') and password='$strPassword' limit 1";
		$result = $conn->query($sql) or die(mysqli_error($conn));
		if ($result->num_rows > 0) {
			$userDetails = $result->fetch_assoc();
			if($userDetails['status'] == 0) {
				$_SESSION['email'] = $userDetails['email'];
				header("Location:".site_url.'/dashboard.php');	
			} else {
				$_SESSION['error_msg'] = "Your account not active!";	
				header("Location:".site_url);	
			}
		} else {
			$_SESSION['error_msg'] = "Username | Password something wrong!";	
			header("Location:".site_url);
		}
	} else {
		$_SESSION['error_msg'] = "These fields are required!";
		header("Location:".site_url);

	}
}

function addPost() {
	global $conn;
	$target_dir = "uploads/";
	$time = time();
	$curDatetime = date('Y-m-d H:i:s');
	$intUserId = 1;

	$strMessage = addslashes(trim($_POST['message']));
	$tempFileName = $_FILES["image"]["tmp_name"];
	$fileType = '';
	if(!empty($_FILES["image"]["type"])) {
		$fileType = explode('/', $_FILES["image"]["type"])[0];
	}
	$strFileName = '';
	if(!empty($_FILES["image"]["name"])) {
		$strFileName = $time.'@'. basename($_FILES["image"]["name"]);
	}
	$targetFile = $target_dir.$strFileName;

	if(!empty($strMessage) || !empty($tempFileName)) {
		if(!empty($tempFileName) && !empty($targetFile)) {
			move_uploaded_file($tempFileName, $targetFile);
		}
		$strQ = "INSERT INTO `posts` (`user_id`, `message`, `file_name`,`file_type`, `created_date`, `update_date`) VALUES ('$intUserId', '$strMessage', '$strFileName', '$fileType', '$curDatetime', CURRENT_TIMESTAMP)";
		$result = $conn->query($strQ) or die(mysqli_error($conn));
		if(isset($result)) {
			$_SESSION['sucss_msg'] = "Successfully Post";
			header("Location: ".site_url);
		} else {
			$_SESSION['error_msg'] = "Sorry, there was an error uploading your file.";
			header("Location: ".site_url);
		}
	} else {
		$_SESSION['error_msg'] = "These fields are required";
		header("Location: ".site_url);
	} 
	die();
}

function getAllPost() {
	global $conn;
	$strQ = "SELECT * FROM `posts` ORDER BY `id` desc";
	$strR = $conn->query($strQ) or die(mysqli_error($conn));
	$arrAllPost = [];
	if ($strR->num_rows > 0) {
		while ($row = mysqli_fetch_assoc($strR)) {
		    $arrAllPost[] = $row;
		}
	}
	return $arrAllPost;
}

function getSinglePost($pid) {
	global $conn;
	$strQ = "SELECT * FROM `posts` where id = '$pid'";
	$strR = $conn->query($strQ) or die(mysqli_error($conn));
	$arrPost = [];
	if ($strR->num_rows > 0) {
		$arrPost = mysqli_fetch_assoc($strR);
	}
	return $arrPost;
}

function getOneUserDetailById($userId) {
	global $conn;
	  $arrUsers = [];
	if(!empty($userId)) {
		$sql = "SELECT * FROM users where id='$userId' limit 1";
	  $result = $conn->query($sql) or die(mysqli_error($conn));
	  if ($result->num_rows > 0) {
			$arrUsers = $result->fetch_assoc();
			$arrUsers['details'] = getUserDetails($arrUsers['id']);
			$arrUsers['billing_details'] = getUserBillingDetails($arrUsers['id']);
		}
	}
	return $arrUsers;
}

function getUserDetails($userId) {
	global $conn;
	$strQ = "SELECT * FROM `user_details` where user_id='$userId'";
	$result = $conn->query($strQ) or die(mysqli_error($conn));
  $details = [];
  if ($result->num_rows > 0) {
		$details = $result->fetch_assoc();
	}
	return $details;
}

function getUserBillingDetails($userId) {
	global $conn;
	$strQ = "SELECT * FROM `user_billing_details` where user_id='$userId'";
	$result = $conn->query($strQ) or die(mysqli_error($conn));
    $details = [];
    if ($result->num_rows > 0) {
		$details = $result->fetch_assoc();
	}
	return $details;
}

function postlike() {
	global $conn;
	$intUserId = 1;
	$strpostId = addslashes(trim($_POST['postId']));
    $strlikeAction = addslashes(trim($_POST['likeAction']));
    $date = date('Y-m-d H:i:s');

    $strQ = "SELECT * FROM `post_likes` where `user_id`='$intUserId' and `post_id`='$strpostId' limit 1";
	$result = $conn->query($strQ) or die(mysqli_error($conn));

    if ($result->num_rows > 0) {
		$strQQ = "UPDATE `post_likes` SET `action` = '$strlikeAction' WHERE `post_id` = '$strpostId' and `user_id`='$intUserId'";
		$resultUpdate = $conn->query($strQQ) or die(mysqli_error($conn));
    } else {
	    $strQ = "INSERT INTO `post_likes` (`post_id`, `user_id`, `action`, `created_date`) VALUES ( '$strpostId', '$intUserId', '$strlikeAction', '$date')";
		$result = $conn->query($strQ) or die(mysqli_error($conn));
    }
    
    echo getSinglePostAllLike($strpostId);
}

function getSinglePostAllLike($postId) {
	global $conn;
	$strQ = "SELECT * FROM `post_likes` where `post_id`='$postId' and `action`= 0";
	$result = $conn->query($strQ) or die(mysqli_error($conn));
	if ($result->num_rows > 0) {
		return $result->num_rows;
	} else {
		return 0;
	}	
}

/**
 * [getPostUserLike get like if user like post]
 * @return [type] [description]
 */
function getCheckPostLikeUser($userId, $postId) {
	global $conn;
	$strQ = "SELECT * FROM `post_likes` where `post_id`='$postId' and `user_id`= '$userId' and `action`= 0 limit 1";
	$result = $conn->query($strQ) or die(mysqli_error($conn));
	if ($result->num_rows > 0) {
		return true;
	} else {
		return false;
	}		
}

function sharePost() {
	global $conn;
	$intPostId = addslashes(trim($_POST['post_id']));
    $intUserId = addslashes(trim($_POST['user_id']));
    $strMessage = addslashes(trim($_POST['message']));
    $curDatetime = date('Y-m-d H:i:s');

    if(!empty($intPostId) && !empty($intUserId)) {
    	$strQ = "INSERT INTO `post_share` (`user_id`, `post_id`, `message`, `created_date`) VALUES ('$intUserId', '$intPostId', '$strMessage', '$curDatetime')";
    	$result = $conn->query($strQ) or die(mysqli_error($conn));
		if(isset($result)) {
			$_SESSION['sucss_msg'] = "Successfully Post";
			header("Location: ".site_url);
		} else {
			$_SESSION['error_msg'] = "Something went wrong please try again";
			header("Location: ".site_url);
		}
    } else {
    	$_SESSION['error_msg'] = "These fields are required!";	
		header("Location:".site_url);
    }
    die();
}

function addComment() {
	global $conn;
	$intPostId = $_POST['postid'];
	$intParentId = $_POST['userid'];
	$comment_name = $_POST["name"];
	$comment_content = $_POST["comment_content"];
	$comment_id = $_POST["comment_id"];
	$curDate = date('Y-m-d H:i:s');
	if(!empty($intPostId) && !empty($comment_name) && !empty($comment_content)) {
	 	$strQ = "INSERT INTO `post_comments` (`post_id`, `parent_comment_id`, `comment`, `comment_sender_name`, `date`) VALUES ('$intPostId', '$comment_id', '$comment_content', '$comment_name', '$curDate')";
	 	$result = $conn->query($strQ) or die(mysqli_error($conn));
	 	if(isset($result)) {
	 		return true;
	 	} else {
	 		return false;
	 	}
	} else {
		return false;
	}
}

function getAllPostComment($postid) {
  global $conn;
  $strQ = "SELECT * FROM post_comments WHERE parent_comment_id = '0' and post_id='$postid' order by comment_id desc";

  $output = '';
  $strR = $conn->query($strQ) or die(mysqli_error($conn));
  $result = [];
  if ($strR->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($strR)) {
      $output .= '
       <div class="panel panel-default">
        <div class="panel-heading">By <b>'.$row["comment_sender_name"].'</b> on <i>'.$row["date"].'</i></div>
        <div class="panel-body">'.$row["comment"].'</div>
        <div class="panel-footer" align="right"><button type="button" class="btn btn-default reply" id="'.$row["comment_id"].'">Reply</button></div>
       </div>';
     $output .= get_reply_comment($postid, $row["comment_id"]);
    }
  }
  return $output;
}


function get_reply_comment($postid, $parent_id = 0, $marginleft = 0) {
  global $conn;
  $strQ = "SELECT * FROM post_comments WHERE parent_comment_id = '".$parent_id."' and post_id='$postid'";

  $strR = $conn->query($strQ) or die(mysqli_error($conn));
  $result = [];
  if ($strR->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($strR)) {
        $result[] = $row;
    }
  }

  $output = '';

  if($parent_id == 0) {
    $marginleft = 0;
  } else {
    $marginleft = $marginleft + 48;
  }

  if(!empty($result)) {
    foreach($result as $row) {
     $output .= '<div class="panel panel-default" style="margin-left:'.$marginleft.'px">
        <div class="panel-heading">By <b>'.$row["comment_sender_name"].'</b> on <i>'.$row["date"].'</i></div>
        <div class="panel-body">'.$row["comment"].'</div>
        <div class="panel-footer" align="right"><button type="button" class="btn btn-default reply" id="'.$row["comment_id"].'">Reply</button></div>
       </div>';
     $output .= get_reply_comment($postid, $row["comment_id"], $marginleft);
    }
  }
  return $output;
}

?>

