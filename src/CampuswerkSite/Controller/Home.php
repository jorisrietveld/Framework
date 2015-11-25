<?php
/**
 * Author: Joris Rietveld <jorisrietveld@protonmail.com>
 * Date: 25-11-15 - 8:45
 */

namespace CampuswerkSite\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class Home
{
	private $page;

	public function index( Request $request )
	{
		$html = '<!DOCTYPE html><html><head><title>webpage</title></head><body><h1>Your ip is:' . $request->getClientIp() . '</h1></body></html>';

		return new Response( $html );
	}
}