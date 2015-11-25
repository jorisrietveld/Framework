<?php
/**
 * Author: Joris Rietveld <jorisrietveld@protonmail.com>
 * Date: 18-11-15 - 10:23
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Framework\Framework;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\Routing;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;


$request = Request::createFromGlobals();

// This page an instance of an RouteCollection.
$routes = include __DIR__ . '/../src/app.php';

ob_start();

// This holds information from the request that will be used in the url matcher to match the route.
$context = new RequestContext();
$context->fromRequest( $request );

// The matcher will be injected into the framework so it can be used to match routes to the context of the request.
$matcher = new UrlMatcher( $routes, $context );

// This will be injected into the framework to call the appropriate controller based on the matched route.
$resolver = new ControllerResolver();

$dispatcher = new EventDispatcher();

/*$dispatcher->addListener( 'response', [ new \Framework\GoogleListener(), 'onResponse' ] );
$dispatcher->addListener( 'response', [ new \Framework\ContentLengthListener(), 'onResponse' ], -255 );*/

$framework = new Framework( $dispatcher, $matcher, $resolver );
//$framework = new \Symfony\Component\HttpKernel\HttpCache\HttpCache( $framework, new \Symfony\Component\HttpKernel\HttpCache\Store(__DIR__. '/../case'));

$response = new \Symfony\Component\HttpFoundation\Response();
$response->setContent( ob_get_clean() );
//$response = $framework->handle( $request );

$response->prepare( $request );
$response->send();