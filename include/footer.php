<?php if(isset($_SESSION['error_msg'])) {
  unset($_SESSION['error_msg']);
}

if(isset($_SESSION['sucss_msg'])) {
  unset($_SESSION['sucss_msg']);
} 
ob_end_flush();
?>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="assets/js/custom.js"></script>

</body>
</html>