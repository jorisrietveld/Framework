<?php
/**
 * Author: Joris Rietveld <jorisrietveld@protonmail.com>
 * Date: 24-11-15 - 14:18
 */

namespace Framework;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;


class GoogleListener implements EventSubscriberInterface
{
	public function onResponse( ResponseEvent $event )
	{
		$response = $event->getResponse();

		if( $response->isRedirect()
			|| $response->headers->has( 'Content-Type' )
			&& false == strpos( $response->headers->get( 'Content-Type' ), 'html' )
			|| 'html' !== $event->getRequest()->getRequestFormat()
		)
		{
			return;
		}

		$googleAdSenseCode = '<script>console.log(\'Google spy code added \')</script>';

		$response->setContent( $response->getContent() . $googleAdSenseCode );
	}

	public static function getSubscribedEvents()
	{
		return [ 'response' => 'onResponse' ];
	}
}