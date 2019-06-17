<?php
/* Dispatcher, Uses current directory to get JSON configuration:
    config.json
*/  

// Read JSON file
$json = file_get_contents('config.json');

//Decode JSON
$json_data = json_decode($json, true);

foreach ($json_data["Routes"] as $route) {
	if (strpos(strtolower($_SERVER['REQUEST_URI']), strtolower($route["route"])) !== false) {
		include $route["file"];
		call_user_func($route["function"]);
	}
}
  /*
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];
	echo "$uri";
	exit;*/
?>