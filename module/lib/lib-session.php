<?php 
	session_start();
	if(empty($_SESSION[$path[1] . 'us_username']))
	{
	    $id = 'warning';
		header('location: ' . $_ENV['BASE_URL'] . $path[1] . '/signin/' . $id);
	}
?>