<?php
/**
 * Author: Joris Rietveld <jorisrietveld@protonmail.com>
 * Date: 18-11-15 - 12:33
 */

namespace Calendar\Model;

class LeapYear
{
	public function isLeapYear($year = null)
	{
		if (null === $year) {
			$year = date('Y');
		}

		return 0 == $year % 400 || (0 == $year % 4 && 0 != $year % 100);
	}
}