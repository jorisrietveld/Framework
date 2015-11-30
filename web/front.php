<?php
/**
 * Author: Joris Rietveld <jorisrietveld@protonmail.com>
 * Date: 18-11-15 - 10:23
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing;

$request = Request::createFromGlobals();

$routes = include __DIR__ . '/../src/app.php';
$sc = include __DIR__ . '/../src/container.php';

$request = Request::createFromGlobals();

$response = $sc->get('framework')->handle($request);

$response->send();