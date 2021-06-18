        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="index">
                        <!-- Logo icon image, you can use font-icon also --><b>
                        <!--This is light logo icon--><img src="./../images/<?php echo $path[1]?>-lg.png" alt="home" class="light-logo" style="max-height: 31px;" /></b>
                        <!-- Logo text image you can use text also --><span class="hidden-xs">
                        <!--This is light logo text--><img src="./../images/<?php echo $path[1]?>-tx.png" alt="home" class="light-logo" style="max-height: 15px;" /></span> 
                    </a>
                </div>
                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-left">
                    <li><a href="javascript:void(0)" class="open-close waves-effect waves-light"><i class="ti-menu"></i></a></li>
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="./../images/user/<?php echo $_SESSION[$path[1] . 'us_username']?>.png" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?php echo $_SESSION[$path[1] . 'us_username']?> </b><span class="caret"></span> </a>
                        <ul class="dropdown-menu dropdown-user animated flipInY">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-img"><img src="./../images/user/<?php echo $_SESSION[$path[1] . 'us_username']?>.png" alt="user" /></div>
                                    <div class="u-text">
                                        <h4><?php echo $_SESSION[$path[1] . 'us_username']?></h4>
                                        <p class="text-muted" style="font-size: 12px;"><?php echo $_SESSION[$path[1] . 'us_email']?></p>
                                        <a href="signout" class="btn btn-rounded btn-danger btn-sm"><i class="fa fa-power-off"></i> &nbsp;Sign Out</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>