<?php

/*
|--------------------------------------------------------------------------
| Array helper functions
|--------------------------------------------------------------------------
|
|
|
*/


if (!function_exists('array_has_all')) {

    /**
     * Returns true if all the $keys are present in the $array
     *
     * @param array $search Array to search into
     * @param array $keys the keys that should be present in $array
     * @return bool
     */
    function array_has_all(array $search, array $keys)
    {
        foreach ($keys as $key) {
            if (!array_key_exists($key, $search)) {
                return false;
            }
        }
        return true;
    }

}

if (!function_exists('array_has_any')) {

    /**
     * Returns true if any of the $keys is present in the $array
     *
     * @param array $search
     * @param array $keys
     * @return bool
     */
    function array_has_any(array $search, array $keys) {
        foreach ($keys as $key) {
            if (array_key_exists($key, $search)) {
                return true;
            }
        }
        return false;
    }

}
