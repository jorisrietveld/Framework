<?php
/**
 * Author: Joris Rietveld <jorisrietveld@protonmail.com>
 * Date: 25-11-15 - 8:48
 */

namespace CampuswerkSite\Models;

class ThemeModel
{
	const VIEW_DIR = __DIR__ ."/../Views/";

	public function getTheme(  )
	{

	}

	public function getTwigLoaderFilesystem(  )
	{
		$twigFileLoader = new \Twig_Loader_Filesystem( self::VIEW_DIR );
		return $twigFileLoader;
	}
}