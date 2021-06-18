        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
                </div>
                <ul class="nav" id="side-menu">
                    <li style="padding: 70px 0 0;"><a href="."><i class="fa fa-home fa-fw" aria-hidden="true"></i> Home</a></li>
                    <?php
                    include_once __DIR__ . '/../../app/' . $path[1] . '/menu.php';
                    foreach ($menus as $url=>$value) { ?>
                        <li><a href="<?php echo $url?>"><i class="fa fa-file-text-o fa-fw" aria-hidden="true"></i><?php echo $value?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>