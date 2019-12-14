<?php
function router_start() {
	$pages_path = 'app/';
	$script_name = 'main';
	$script_params = null;

	$routes = explode('/', $_SERVER['REQUEST_URI']);
	if (!empty($routes[0]))
		$script_name = $routes[0];
	if (!empty($routes[1]))
		$script_params = array_slice($routes, 1);
	if (file_exists($pages_path . $script_name . '.php'))
		require $pages_path . $script_name . '.php';
	else
		errorPage404();
}

function errorPage404() {
	header('HTTP/1.1 404 Not Found');
	header('Status: 404 Not Found');
	header('Location: /404');
}