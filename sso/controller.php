<?php
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

if (isset($_GET['logout'])) {
  require_once __DIR__ . '/logout.php';
  exit();
}

if (isset($_SESSION['sso_username']) && isset($_GET['callback_url'])) {
  require_once __DIR__ . '/token.php';
  header('Location: ' . $_GET['callback_url'] . '?token=' . urlencode($token));
  exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $callback_url = $_GET['callback_url'];
  if ($username == 'admin' && $password == 'admin') {
    $_SESSION['sso_username'] = 'admin';
    require_once __DIR__ . '/token.php';
    header('Location: ' . $callback_url . '?token=' . urlencode($token));
  }
  else {
    header('Location: ' . $_ENV['BASE_URL'] . '?callback_url=' . $callback_url . '&failed');
  }
  exit();
}
?>