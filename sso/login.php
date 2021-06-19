<?php $callback_url = isset($_GET['callback_url']) ? $_GET['callback_url'] : $_ENV['BASE_URL']?>
<p class="login-box-msg">Sign in to start your session</p>
<form id="formlogin" action="?callback_url=<?php echo $callback_url?>" method="post">
  <?php if (isset($_GET['failed'])) { ?>
    <div id="alertlogin" class="alert alert-danger alert-dismissible" role="alert">
      Login failed!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php } ?>
  <div class="input-group mb-3">
    <input id="formusername" type="text" name="username" class="form-control" placeholder="Username" >
    <div class="input-group-append">
      <div class="input-group-text">
        <span class="fas fa-user"></span>
      </div>
    </div>
  </div>
  <div class="input-group mb-3">
    <input id="formpassword" type="password" name="password" class="form-control" placeholder="Password" >
    <div class="input-group-append">
      <div class="input-group-text">
        <span class="fas fa-lock"></span>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
    </div>
  </div>
</form>