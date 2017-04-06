<?php

/*
|--------------------------------------------------------------------------
| HTML helper functions
|--------------------------------------------------------------------------
|
|
|
*/

if (!function_exists('human_number_tag')) {

	function human_numer_tag($float, $dataToogle = 'tooltip', $dataPlacement = 'top')
	{
		$formated = human_format($float);
		$tag = '<span data-tootgle="' . $dataToogle . '" ' . 
			'data-placement="' . $dataPlacement . '">' . 
			$formated . '</span>';
	}

}