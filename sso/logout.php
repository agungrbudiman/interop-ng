<?php
	session_start();
	unset($_SESSION['sso_username']);
	header("Location: " . $_ENV['BASE_URL']);
?>