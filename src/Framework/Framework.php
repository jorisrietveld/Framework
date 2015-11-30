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
use Symfony\Component\HttpKernel;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing;


class Framework extends HttpKernel\HttpKernel
{
	/*public function __construct($routes)
	{
		$context = new Routing\RequestContext();
		$matcher = new Routing\Matcher\UrlMatcher($routes, $context);
		$resolver = new HttpKernel\Controller\ControllerResolver();

		$dispatcher = new EventDispatcher();
		$dispatcher->addSubscriber(new HttpKernel\EventListener\RouterListener($matcher));
		$dispatcher->addSubscriber(new HttpKernel\EventListener\ResponseListener('UTF-8'));

		parent::__construct($dispatcher, $resolver);
	}*/

	/**
	 * Handle an request and return an appropriate response.
	 *
	 * @param \Symfony\Component\HttpFoundation\Request $request
	 * @param int                                       $type
	 * @param bool|true                                 $catch
	 * @return mixed|\Symfony\Component\HttpFoundation\Response
	 *//*
	public function handle( Request $request, $type = HttpKernelInterface::MASTER_REQUEST, $catch = true )
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
			ob_start();

			echo "<h3>Great you just broke the internet</h3>";
			echo "<h2>" . $e->getMessage() . "</h2>";

			$response = new Response( ob_get_clean(), 500 );
		}

		// dispatch a response event
		$this->dispatcher->dispatch( 'response', new ResponseEvent( $response, $request ) );

		return $response;
	}*/
}