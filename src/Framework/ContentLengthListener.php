<?php
/**
 * Author: Joris Rietveld <jorisrietveld@protonmail.com>
 * Date: 24-11-15 - 14:30
 */

namespace Framework;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;


class ContentLengthListener implements EventSubscriberInterface
{
	public function onResponse( ResponseEvent $event )
	{
		$response = $event->getResponse();
		$headers = $response->headers;

		if( !$headers->has('Content-Length') && !$headers->has('Transfer-Encoding') )
		{
			$headers->set('Content-Length', strlen( $response->getContent() ));
		}
	}

	public static function getSubscribedEvents(  )
	{
		return [ 'response' => [ 'onResponse', -255 ] ];
	}
}