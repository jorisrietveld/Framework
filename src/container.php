<?php
/**
 * Author: Joris Rietveld <jorisrietveld@protonmail.com>
 * Date: 30-11-15 - 17:58
 */

use Symfony\Component\DependencyInjection;
use Symfony\Component\DependencyInjection\Reference;


$sc = new DependencyInjection\ContainerBuilder();
$sc->register( 'context', 'Symfony\Component\Routing\RequestContext' );

$sc->register( 'matcher', 'Symfony\Component\Routing\Matcher\UrlMatcher' )
	->setArguments( [ $routes, new Reference( 'context' ) ] );

$sc->register( 'resolver', 'Symfony\Component\HttpKernel\Controller\ControllerResolver' );

$sc->register( 'listener.router', 'Symfony\Component\HttpKernel\EventListener\RouterListener' )
	->setArguments( [ new Reference( 'matcher' ) ] );

$sc->register( 'listener.response', 'Symfony\Component\HttpKernel\EventListener\ResponseListener' )
	->setArguments( [ 'UTF-8' ] );

$sc->register( 'listener.exception', 'Symfony\Component\HttpKernel\EventListener\ExceptionListener' )
	->setArguments( [ 'CampuswerkSite\Controller\ErrorController::exceptionAction' ] );

$sc->register( 'dispatcher', 'Symfony\Component\EventDispatcher\EventDispatcher' )
	->addMethodCall( 'addSubscriber', [ new Reference( 'listener.exception' ) ] )
	->addMethodCall( 'addSubscriber', [ new Reference( 'listener.router' ) ] )
	->addMethodCall( 'addSubscriber', [ new Reference( 'listener.response' ) ] );

$sc->register( 'framework', 'Framework\Framework' )
	->setArguments( [ new Reference( 'dispatcher' ), new Reference( 'resolver' ) ] );

return $sc;