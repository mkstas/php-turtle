<?php

namespace Core\Services;

use Error;

class Router
{
	/**
	 * List of routes
	 *
	 * @var array
	 */
	private static $routes = [];

	/**
	 * Method of creating route
	 *
	 * @param string $uri
	 * @param array $controller
	 * @return void
	 */
	public static function api($uri, $controller)
	{
		self::$routes[] = [
			"uri" => $uri,
			"controller" => $controller[0],
			"method" => $controller[1]
		];
	}

	/**
	 * Method of enabling routes
	 *
	 * @return void
	 */
	public static function enable()
	{
		$uri = $_SERVER["REQUEST_URI"];
		$route_exists = true;

		foreach (self::$routes as $route) {
			if ($route["uri"] === $uri) {
				try {
					$method = $route["method"];
					$controller = new $route["controller"]();
					$controller->$method();
				} catch (Error $e) {
					echo "Controller " . $route["controller"] . " does not exists: " . $e->getMessage();
				}
				die();
			} else {
				$route_exists = false;
			}
		}

		if (!$route_exists) {
			http_response_code(404);
		}
	}
}
