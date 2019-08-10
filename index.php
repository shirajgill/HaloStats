<?php
/* Dispatcher, Uses current directory to get JSON configuration:
    config.json
*/  

spl_autoload_register(function ($class) {
	$file = $_SERVER["DOCUMENT_ROOT"]. "\\HaloStats\\Halo\\" .	str_replace('\\', DIRECTORY_SEPARATOR, $class).'.php';
	if (file_exists($file)) {
			require $file;
			return true;
	}
	return false;
});

// Read JSON file
$json = file_get_contents('config.json');

//Decode JSON
$json_data = json_decode($json, true);

foreach ($json_data["Routes"] as $route) {
	echo $_SERVER['REQUEST_URI'];
	echo "__" . $_SERVER['REQUEST_URI']; die;
	if (strpos(strtolower($_SERVER['REQUEST_URI']), strtolower($route["route"])) !== false) {
		include $route["file"];
		call_user_func($route["function"]);
	}
}
?>