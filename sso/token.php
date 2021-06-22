<?php
use Firebase\JWT\JWT;

$payload = array(
  "us_username" => $_SESSION['sso_username'],
  "us_email" => 'sso_admin@gmail.com',
  "us_id" => 1,
  "iat" => time(),
  "exp" => time() + $_ENV['SSO_TIMEOUT'],
);

$token = JWT::encode($payload, $_ENV['SSO_KEY']);
?>