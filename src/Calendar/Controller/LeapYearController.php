<?php
/**
 * Author: Joris Rietveld <jorisrietveld@protonmail.com>
 * Date: 18-11-15 - 12:34
 */

namespace Calendar\Controller;

use Calendar\Model\LeapYear;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class LeapYearController
{
	public function indexAction( Request $request, $year )
	{
		$leapyear = new LeapYear();

		if( $leapyear->isLeapYear( $year ) )
		{
			return new Response( 'Yep, this is a leap year!' );
		}

		return new Response( 'Nope, this is not a leap year.' );
	}
}