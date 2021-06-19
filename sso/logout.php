<?php
	$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
	$dotenv->load();
	session_start();
	unset($_SESSION['sso_username']);
	header("Location: " . $_ENV['BASE_URL']);
?>