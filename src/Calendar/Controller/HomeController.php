<?php
/**
 * Author: Joris Rietveld <jorisrietveld@protonmail.com>
 * Date: 18-11-15 - 13:43
 */

namespace Calendar\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController
{
	public function indexAction( Request $request, $name )
	{
		return new Response( "<h1>home page - hello: {$name}</h1>" );
	}
}