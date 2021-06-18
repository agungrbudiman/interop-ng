<?php
//lanjutkan session yang sudah dibuat sebelumnya
session_start();

//hapus session yang sudah dibuat
unset($_SESSION[$path[1] . 'id']);
unset($_SESSION[$path[1] . 'us_username']);
unset($_SESSION[$path[1] . 'us_email']);

//redirect ke halaman signin
$id = 'success';
header('location:signin/'.$id);
?>
