<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once(__DIR__.'/lib/lib-plugins.php'); ?>
</head>
<body>
    <section id="wrapper" class="new-login-register">
        <div class="lg-info-panel">
            <div class="inner-panel"></div>
        </div>
        <div class="new-login-box">
            <div class="white-box">
                <?php
                    if (isset($paths[3])) {
                        $msg = $paths[3];
                        if ($msg == 'warning') {
                            echo "<div class='alert alert-primary'>
                                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                Welcome! Please sign in first.
                              </div>";
                        }
                        elseif ($msg == 'failed') {
                            echo "<div class='alert alert-danger'>
                                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                Username or password that you entered is incorrect. Please input again!
                              </div>";
                        }
                        elseif ($msg == 'success') {
                            echo "<div class='alert alert-success'>
                                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                You have successfully signed out.
                              </div>";
                        }                     
                    }
                ?>
                <br>
                <h3 class="box-title m-b-0"><?php echo $apps[$paths[1]]?></h3>
                <form class="form-horizontal new-lg-form" id="loginform" method="post" action="<?php echo $_ENV['BASE_URL'] . $paths[1] . '/signin-check'?>">
                    <div class="form-group m-t-20">
                        <div class="col-xs-12">
                            <label>Username</label>
                            <input class="form-control" type="text" name="username" required="" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label>Password</label>
                            <input class="form-control" type="password" name="password" required="" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <a href="<?php echo $_ENV['BASE_URL'] . $paths[1] . '/forgot' ?>" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot password?</a> </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="submit" name="signin">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
