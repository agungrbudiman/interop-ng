<?php
	include_once __DIR__ . '/../../app/' . $paths[1] . '/menu.php';

	if (in_array($paths[2], $menukey)) {
		include_once __DIR__ . '/../../app/' . $paths[1] . '/' . $paths[2] . '.php';
	}
	else {
		include_once __DIR__ . '/../index-content.php';
	}

?>