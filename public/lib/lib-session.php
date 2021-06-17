<?php 
	session_start();
	if(empty($_SESSION['us_username']))
	{
	    $id = 'warning';
		header('location: ' . $_ENV['BASE_URL'] . $paths[1] . '/signin/' . $id);
	}
?>