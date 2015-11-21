<?php
/**
 * Author: Joris Rietveld <jorisrietveld@protonmail.com>
 * Date: 18-11-15 - 12:41
 */

namespace Framework;

use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Controller\ControllerResolverInterface;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcherInterface;


class Framework
{
	protected $matcher;
	protected $controllerResolver;
	protected $dispatcher;

	public function __construct( EventDispatcher $dispatcher, UrlMatcherInterface $matcher, ControllerResolverInterface $resolver )
	{
		$this->matcher            = $matcher;
		$this->controllerResolver = $resolver;
		$this->dispatcher         = $dispatcher;
	}


	public function handle( Request $request )
	{
		$this->matcher->getContext()->fromRequest( $request );

		try
		{
			$request->attributes->add( $this->matcher->match( $request->getPathInfo() ) );

			$controller = $this->controllerResolver->getController( $request );
			$arguments  = $this->controllerResolver->getArguments( $request, $controller );

			$response = call_user_func_array( $controller, $arguments );
		}
		catch( ResourceNotFoundException $e )
		{
			$response = new Response( 'Not Found', 404 );
		}
		catch( \Exception $e )
		{
			$response = new Response( 'An error occurred', 500 );
		}

		// dispatch a response event
		$this->dispatcher->dispatch( 'response', new ResponseEvent( $response, $request ) );

		return $response;
	}
}