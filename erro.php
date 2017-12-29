
<!DOCTYPE html>
<html>
<?php 
require "head.php"; 
require_once "modal.php";
?>

<body class="hold-transition login-page">
<div class="login-box">
 
  
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
 <script>
  document.getElementById("demo").innerHTML = 
$(document).ready(function(){
    $("#msg_erro").modal();
});
</script>
</body>
</html>
