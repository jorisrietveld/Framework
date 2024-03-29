<?php
/**
 * Author: Joris Rietveld <jorisrietveld@protonmail.com>
 * Date: 18-11-15 - 15:15
 */

namespace Framework\Tests;

use Framework\Framework;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;


class FrameworkTest extends \PHPUnit_Framework_TestCase
{
	public function testNotFoundHandling()
	{
		$framework = $this->getFrameworkForException( new ResourceNotFoundException() );

		$response = $framework->handle( new Request() );

		$this->assertEquals( 404, $response->getStatusCode() );
	}

	protected function getFrameworkForException( $exception )
	{
		$matcher = $this->getMock( 'Symfony\Component\Routing\Matcher\UrlMatcherInterface' );
		$matcher
			->expects( $this->once() )
			->method( 'match' )
			->will( $this->throwException( $exception ) );
		$matcher
			->expects( $this->once() )
			->method( 'getContext' )
			->will( $this->returnValue( $this->getMock( 'Symfony\Component\Routing\RequestContext' ) ) );
		$resolver = $this->getMock( 'Symfony\Component\HttpKernel\Controller\ControllerResolverInterface' );

		return new Framework( $matcher, $resolver );
	}
}
