<?php
require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../config');
$dotenv->load();
require_once(__DIR__.'/../config/global.php');
require_once __DIR__ . '/../module/lib/lib-routing.php';
?>

