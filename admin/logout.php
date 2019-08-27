<?php 
 include 'include/config.php';
 include 'include/constants.php';
 
 session_destroy();
 header("Location:".site_url);
?>