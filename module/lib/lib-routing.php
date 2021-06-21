<?php
$path = explode('/', $_SERVER['REQUEST_URI']);
$offset = (count(explode('/', parse_url($_ENV['BASE_URL'], PHP_URL_PATH))));
$path = array_slice($path, $offset-2);
// print_r($path);

// app doesn't exist
if ($path[1] == '' || ( isset($path[1]) && !in_array($path[1], array_keys($appname)))) {
    foreach ($appname as $url=>$value) { ?>
        <a href="<?php echo $url?>"><?php echo $value?></a>
        <br>
    <?php }
    exit();
}
$rootdir = __DIR__ . '/../../app/' . $path[1] . '/';
include_once $rootdir . 'menu.php';

// shared module does exist
if (isset($path[2]) && file_exists(__DIR__ . '/../' . $path[2] . '.php')) {
    require_once __DIR__ . '/../' . $path[2] . '.php';
    exit();
}

require_once __DIR__ . '/lib-db.php';

// app module in module folder (without index base)
if (isset ($path[2]) && file_exists($rootdir . '/module/' . $path[2] . '.php')) {
    include_once $rootdir . '/module/' . $path[2] . '.php';
    exit();
}

require_once __DIR__ . "/lib-session.php";
require_once __DIR__ . "/../index-base.php";

// app module in root (with index base)
if (isset ($path[2]) && file_exists($rootdir . $path[2] . '.php')) {
    include_once $rootdir . $path[2] . '.php';
}
// app default page (index-content.php)
else if (file_exists($rootdir .'index-content.php')){
    include_once $rootdir . 'index-content.php';
}
// shared default page
else {
    include_once __DIR__ . '/../index-content.php';
}
?>