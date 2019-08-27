<?php 
if(isset($_SESSION['error_msg'])) {
?>
<div class="alert alert-danger">
  <?php echo $_SESSION['error_msg']; ?>
</div>
<?php }

if(isset($_SESSION['sucss_msg'])) {
?>
<div class="alert alert-success">
  <?php echo $_SESSION['sucss_msg']; ?>
</div>
<?php } ?>
