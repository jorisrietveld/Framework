<?php
/**
 * Author: Joris Rietveld <jorisrietveld@protonmail.com>
 * Date: 18-11-15 - 10:35
 */

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;


$routes = new RouteCollection();

$routes->add(
	'home',
	new Route( '/',
	           [
		           '_controller' => "CampuswerkSite\\Controllers\\Home::index"
	           ]
	)
);

$routes->add(
	'homeName',
	new Route( '/{name}',
	           [
		           'name'        => "Anonymous",
		           '_controller' => "CampuswerkSite\\Controllers\\Home::name"
	           ]
	)
);

return $routes;