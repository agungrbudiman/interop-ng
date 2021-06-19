<?php
  session_start();
  require_once __DIR__ . '/../../vendor/autoload.php';
  require_once __DIR__ . '/../controller.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once __DIR__ . '/../head.php'; ?>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Single Sign-On</b></a>
    </div>
    <div class="card-body">
      <?php
      if (isset($_SESSION['sso_username'])) {
        require_once __DIR__ . '/../dashboard.php';
      }
      else {
        require_once __DIR__ . '/../login.php';
      }
      ?>
    </div>
  </div>
</div>
<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
<!-- Custom JS -->
<script src="js/main.js"></script>
</body>
</html>
