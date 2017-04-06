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



	/**
	 * Returns the human formatted number enclosed in a Bootstrap 4 span tag 
	 * that will have a tooltip with the complete number.
	 * Beware that this feature requires the activation of the tooltip in your 
	 * project!
	 * 
	 * @param  float $float          Number to format
	 * @param  string $dataToogle    As defined by bootstrap 4 in it's property data-toogle
	 * @param  string $dataPlacement As defined by bootstrap 4 in it's property data-placement
	 * @return string
	 */
	function human_number_tag($float, $dataToogle = 'tooltip', $dataPlacement = 'top')
	{
		$formated = human_format($float);
		return '<span data-tootgle="' . $dataToogle . '" ' . 
			'data-placement="' . $dataPlacement . '" title="' . $float . '">' . 
			$formated . '</span>';			
	}

}