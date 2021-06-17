<?php
	include_once __DIR__ . '/../../app/' . $path[1] . '/menu.php';

	if (in_array($path[2], $files)) {
		include_once __DIR__ . '/../../app/' . $path[1] . '/' . $path[2] . '.php';
	}
	else {
		include_once __DIR__ . '/../index-content.php';
	}

?>