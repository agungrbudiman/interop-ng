<?php
  session_start();
  
  require_once(__DIR__.'/lib/lib-db.php');

  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM user WHERE us_username='$username' and us_password='$password'";
  $query = $conn->query($sql);
  $check = $query->rowCount();
  if ($check >= 1) 
  {
    //buat session dengan nama username dengan isi nama user yang login
    $data = $query->fetch(PDO::FETCH_OBJ);
    $_SESSION['id'] = $data->us_id;
    $_SESSION['us_username'] = $data->us_username;
    $_SESSION['us_email'] = $data->us_email;
    //redirect ke halaman index
    header('location: ' . $_ENV['BASE_URL'] . $paths[1] . '/');
  } 
  else 
  {
    $id = 'failed';
    //redirect ke halaman signin
    header('location: ' . $_ENV['BASE_URL'] . $paths[1] . '/signin/' . $id);
  }
?>