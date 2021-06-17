<?php
require_once(__DIR__.'/config.php');

$pages = array('signin', 'signin-check', 'signout', 'forgot', 'reset');
$app = array('sikap', 'sidak', 'sas', 'gpp');
$appname = array(
    "sikap"=>"Sistem Informasi Kehadiran Pegawai",
    "sidak"=>"Sistem Informasi Data Kepegawaian",
    "sas"=>"Sistem Aplikasi Satker",
    "gpp"=>"Gaji Pegawai Pusat",
);

$path = explode('/', $_SERVER['REQUEST_URI']);
$path = array_slice($path, $_ENV['BASE_URL_OFFSET']);

if (!in_array($path[1], $app)) {
    echo "app not found";
    exit();
}
include_once __DIR__ . '/../app/' . $path[1] . '/menu.php';
require_once __DIR__ . '/lib/lib-db.php';

if (isset ($path[2]) && in_array($path[2], $pages)) {
    require_once __DIR__ . '/' . $path[2] . '.php';
    exit();
}

require_once __DIR__ . "/lib/lib-session.php";

if (isset ($path[2]) && in_array($path[2], $direct)) {
    include_once __DIR__ . '/../app/' . $path[1] . '/' . $path[2] . '.php';
    exit();
}

require_once __DIR__ . "/index-base.php";
?>

