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
     * Returns true if all the $values are present in the $array
     *
     * @param array $search Array to search into
     * @param array $values The values that should be present in $search
     * @return bool
     */
    function array_has_all(array $search, array $values)
    {
        foreach ($values as $value) {
            if (array_search($value, $search) === false) {
                return false;
            }
        }
        return true;
    }

}

if (!function_exists('array_has_any')) {

    /**
     * Returns true if any of the $values is present in the $array
     *
     * @param array $search
     * @param array $values
     * @return bool
     */
    function array_has_any(array $search, array $values) 
    {
        foreach ($values as $value) {
            if (array_search($value, $search) !== false) {
                return true;
            }
        }
        return false;
    }

}

if (!function_exists('array_key_has_all')) {

    /**
     * Returns true if all the $keys are present in the $array
     *
     * @param array $search Array to search into
     * @param array $keys The keys that should be present in $search
     * @return bool
     */
    function array_key_has_all(array $search, array $keys)
    {
        foreach ($keys as $key) {
            if (!array_key_exists($key, $search)) {
                return false;
            }
        }
        return true;
    }

}

if (!function_exists('array_key_has_any')) {

    /**
     * Returns true if any of the $keys is present in the $array
     *
     * @param array $search Array to search into
     * @param array $keys The keys that should be present in $search
     * @return bool
     */
    function array_key_has_any(array $search, array $keys) 
    {
        foreach ($keys as $key) {
            if (array_key_exists($key, $search)) {
                return true;
            }
        }
        return false;
    }

}

if (!function_exists('array_key_has_any_value')) {

    /**
     * Returs true if any of the $keys in the $search array exists and is NOT
     * empty.
     * 
     * @param  array $search [description]
     * @param  array $keys The keys that should have value in $search
     * @return bool
     */
    function array_key_has_any_value(array $search, array $keys) 
    {
        foreach ($keys as $key) {
            if (array_key_exists($key, $search)) {
                if (!empty($search[$key])) {
                    return true;
                }
            }
        }
        return false;
    }

}