<?php
  session_start();
  
  require_once(__DIR__.'/lib/lib-db.php');

  $username = $_POST['username'];
  $password = $_POST['password'];

  $sqluser = "SELECT * FROM user WHERE us_username='$username' and us_password='$password'";
  $sqlpegawai = "SELECT * FROM pegawai WHERE pe_email='$username' and pe_no_hp='$password'";
  $checkuser = $conn->query($sqluser)->rowCount();
  $checkpegawai = $conn->query($sqlpegawai)->rowCount();
  if ($checkuser > 0) 
  {
    //buat session dengan nama username dengan isi nama user yang login
    $data = $conn->query($sqluser)->fetch(PDO::FETCH_OBJ);
    $_SESSION[$path[1] . 'id'] = $data->us_id;
    $_SESSION[$path[1] . 'us_username'] = $data->us_username;
    $_SESSION[$path[1] . 'us_email'] = $data->us_email;
    //redirect ke halaman index
    header('location: ' . $_ENV['BASE_URL'] . $path[1] . '/');
  } 
  else if ($checkpegawai > 0)
  {
    //buat session dengan nama username dengan isi nama user yang login
    $data = $conn->query($sqlpegawai)->fetch(PDO::FETCH_OBJ);
    $_SESSION[$path[1] . 'id'] = $data->pe_id;
    $_SESSION[$path[1] . 'us_username'] = $data->pe_nama;
    $_SESSION[$path[1] . 'us_email'] = $data->pe_email;
    //redirect ke halaman index
    header('location: ' . $_ENV['BASE_URL'] . $path[1] . '/');
  }
  else
  {
    $id = 'failed';
    //redirect ke halaman signin
    header('location: ' . $_ENV['BASE_URL'] . $path[1] . '/signin/' . $id);
  }
?>