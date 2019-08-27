<?php

  include '../include/functions.php'; 

$postid = trim($_POST['postid']);
if(!empty($postid)) {
  echo getAllPostComment($postid);
}

?>
