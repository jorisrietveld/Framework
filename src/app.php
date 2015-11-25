<?php
/**
 * Author: Joris Rietveld <jorisrietveld@protonmail.com>
 * Date: 18-11-15 - 10:35
 */

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;


$routes = new RouteCollection();

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
	'home',
	new Route( '/',
	           [
		           '_controller' => "CampuswerkSite\\Controller\\Home::index"
	           ]
	)
);

return $routes;