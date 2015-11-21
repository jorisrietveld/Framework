<?php
/**
 * Author: Joris Rietveld <jorisrietveld@protonmail.com>
 * Date: 18-11-15 - 10:35
 */

use Symfony\Component\Routing;
use Symfony\Component\Routing\Route;


$routes = new Routing\RouteCollection();

$routes->add(
	'leap_year',
	new Route( '/is_leap_year/{year}',
	           [
		           'year'        => null,
		           '_controller' => 'Calendar\\Controller\\LeapYearController::indexAction',
	           ]
	)
);

$routes->add(
	'hello',
	new Route( '/{name}',
	           [
		           'name'        => 'Anonymous',
		           '_controller' => "Calendar\\Controller\\HomeController::indexAction"
	           ]
	)
);

$routes->add(
	'home',
	new Route( '/',
	           [
		           'name'        => 'Anonymous',
		           '_controller' => "Calendar\\Controller\\HomeController::indexAction"
	           ]
	)
);

return $routes;