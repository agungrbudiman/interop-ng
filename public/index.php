<?php
require_once(__DIR__.'/config.php');
$pages = array('signin', 'signin-check', 'signout', 'forgot', 'reset');
$app = array('sikap', 'sidak', 'sas', 'gpp');
$apps = array(
    "sikap"=>"Sistem Informasi Kehadiran Pegawai",
    "sidak"=>"Sistem Informasi Data Kepegawaian",
    "sas"=>"Sistem Aplikasi Satker",
    "gpp"=>"Gaji Pegawai Pusat",
);

$paths = explode('/', $_SERVER['REQUEST_URI']);

if (!in_array($paths[1], $app)) {
    echo "app not found";
    exit();
}

if (isset ($paths[2]) && in_array($paths[2], $pages)) {
    require_once __DIR__ . '/' . $paths[2] . '.php';
    exit();
}

require_once __DIR__ . "/lib/lib-session.php";
require_once __DIR__ . "/index-base.php";
?>

