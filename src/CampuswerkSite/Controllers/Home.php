<?php
/**
 * Author: Joris Rietveld <jorisrietveld@protonmail.com>
 * Date: 25-11-15 - 8:45
 */

namespace CampuswerkSite\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class Home extends BaseController
{
	private $page;

	public function index( Request $request )
	{
		$html = '
			<!DOCTYPE html>
			<html>
				<head>
					<title>webpage</title>
				</head>
				<body>
					<h1>Your ip is: ' . $request->getClientIp() . '</h1>
					<div id="content"></div>
				</body>
			</html>';

		return new Response( $html );
	}

	public function name( Request $request, $name )
	{
		$response   = $this->index( $request );
		$appendHtml = '
		<style>
		body{
			background-color: ' . $this->getColor() . ';
		}
		</style>
		<script>
			var div = document.getElementById("content");
			div.innerHTML = div.innerHTML + "Your name is: ' . $name . '";
		</script>';

		$htmlPage = $response->getContent() . $appendHtml;
		$response->setContent( $htmlPage );

		return $response;
	}

	private function getColor()
	{
		$color = "#";
		for( $i = 0; 2 >= $i; $i++ )
		{
			$color .= sprintf( "%02x", rand( 0, 255 ) );
		}

		return $color;
	}


}