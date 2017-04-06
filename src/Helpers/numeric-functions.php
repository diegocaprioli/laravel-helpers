<?php

/*
|--------------------------------------------------------------------------
| Numeric helper functions
|--------------------------------------------------------------------------
|
|
|
*/

if (!function_exists('human_format')) {



    function human_format($float)
    {

        if (!is_numeric($float)) {
            return $float;
        }
        
        if ($float < 1000) {
            return round($float, 2);
        } elseif ($float >= 1000 and $float < 1000000) {
            return round($float / 1000, 2) . 'k';            
        } else {
            return round($float / 1000000, 2) . 'm';
        }

    }


    

}
