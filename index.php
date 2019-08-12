<?php
/* Dispatcher, Uses current directory to get JSON configuration:
    config.json
*/  
function __autoload($class) {
	
	$file = $_SERVER["DOCUMENT_ROOT"]. "/HaloStats/Halo/" .	str_replace('\\', DIRECTORY_SEPARATOR, $class).'.php';
	if (file_exists($file)) {
			require $file;
			return true;
	}
	return false;
}


// Read JSON file
$json = file_get_contents('config.json');

//Decode JSON
$json_data = json_decode($json, true);

foreach ($json_data["Routes"] as $route) {
	if (strpos(strtolower($_SERVER['REQUEST_URI']), strtolower($route["route"])) !== false) {
		if (strpos(strtolower($route["route"]), "player" !== false)) {
		echo "__" . $_SERVER['REQUEST_URI']; die;
		}
		
		include $route["file"];
		call_user_func($route["function"]);
	}
}
?>