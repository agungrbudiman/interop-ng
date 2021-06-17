    <base href="<?php echo $_ENV['BASE_URL'] . $path[1] . '/' ?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo strtoupper($path[1])?></title>
    <!-- Bootstrap Core CSS -->
    <link href="./../vendor/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="./../vendor/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="./../vendor/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="./../vendor/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="./../vendor/plugins/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="./../vendor/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="./../vendor/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="./../vendor/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="./../vendor/css/default.css" id="theme" rel="stylesheet">
    <!-- datatables -->
    <link rel="stylesheet" type="text/css" href="./../vendor/plugins/bower_components/datatables/css/dataTables.bootstrap.css">
    
    <link href="./../css/<?php echo $path[1]?>.css" rel="stylesheet">
    
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="./../vendor/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="./../vendor/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="./../vendor/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="./../vendor/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="./../vendor/js/waves.js"></script>
    <!--Counter js -->
    <script src="./../vendor/plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="./../vendor/plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <!-- chartist chart -->
    <script src="./../vendor/plugins/bower_components/chartist-js/dist/chartist.min.js"></script>
    <script src="./../vendor/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="./../vendor/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="./../vendor/js/custom.min.js"></script>
    <script src="./../vendor/plugins/bower_components/toast-master/js/jquery.toast.js"></script>
    <!--Style Switcher -->
    <script src="./../vendor/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
    <!-- Jasny -->
    <script src="./../vendor/js/jasny-bootstrap.js"></script>
    <!-- datatables -->
    <script type="text/javascript" charset="utf8" src="./../vendor/plugins/bower_components/datatables/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="./../vendor/plugins/bower_components/datatables/js/dataTables.bootstrap.js"></script>
    <script type="text/javascript">
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>
    <!-- CK Editor -->
    <script src="./../vendor/plugins/bower_components/ckeditor/ckeditor.js"></script>

    <script src="./../js/<?php echo $path[1]?>.js"></script>
    