<?php
/**
 * Author: Joris Rietveld <jorisrietveld@protonmail.com>
 * Date: 30-11-15 - 18:03
 */

namespace CampuswerkSite\Controllers;

use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Response;


class ErrorController
{
	public function exceptionAction( $exception )
	{
		$msg = 'Something went wrong! (' . $exception->getMessage() . ')';

		return new Response( $msg, $exception->getStatusCode() );
	}
}