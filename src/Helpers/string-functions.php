<?php

/*
|--------------------------------------------------------------------------
| String helper functions
|--------------------------------------------------------------------------
|
|
|
*/

if (!function_exists('concatenate')) {

    /**
     * Concatenates all the values of the array into a single string, glued by $glue.
     * The glue is NOT used the first time, when the string is still empty.
     *
     * @param array $words
     * @param string $glue
     * @return string
     */
    function concatenate(array $words, $glue = " ")
    {
        $string = "";
        foreach ($words as $word) {
            if ($string == "") {
                $string .= $word;
            } else {
                $string .= $glue . $word;
            }
        }
        return $string;
    }

}


if (!function_exists('tokenize_search_terms')) {

    /**
     * Returns an array with each word in the $string, tokenized as search terms.
     * It splits the $string by blank spaces. If some words are between double quotes, all words
     * inside the quotes will be treated as a single term. Any other symbol will be treated as a simple character.
     * Examples:
     * - hello World!               => ["hello", "World!"]
     * - "say hi" to "the World!"   => ["say hi", "to", "the World!"]
     * - rosemary's willoughby      => ["rosemary's", "willoughby"]
     *
     * @param $string
     * @return array
     */
    function tokenize_search_terms($string)
    {

        // Empty string is empty array:
        if (empty($string)) {
            return [];
        }

        // put spaces between the double quotes, so it's tokenized properly for the processing below
        $string = str_replace("\"", " \" ", $string);

        // Separate by spaces
        $tokenized = explode(" ", $string);

        $final = [];
        $opened = false;
        $memory = "";

        foreach ($tokenized as $word) {

            $word = trim($word);

            if ($word == "") {
                continue;
            }

            if ($word == "\"") {
                // It's a delimiter

                if ($opened) {
                    // Close it and save memory as word
                    if ($memory != "") {
                        $final[] = $memory;
                        $memory = "";
                    }
                    $opened = false;
                } else {
                    $opened = true;
                }

            } else {
                // It's a word

                if ($opened) {
                    $memory = concatenate([$memory, $word], " ");
                } else {
                    $final[] = $word;
                }

            }

        }

        // If is still open, dump memory and finish
        if ($opened) {
            $final[] = $memory;
        }

        return $final;
    }

}


if (!function_exists('emptyVal')) {

    /**
     * Evaluates the $value and if it's empty returns the specified $default. If it's NOT empty, returns the $value
     * itself.
     *
     * @param mixed $value
     * @param mixed $default
     * @return mixed
     */
    function emptyVal($value, $default = '')
    {
        if (empty($value)) {
            return $default;
        } else {
            return $value;
        }
    }

}


if (!function_exists('truncate_by_token')) {

    /**
     * Truncates a string to a maximum of $maxLength chars, chopping only at the
     * position where the specified $token is.
     * 
     * @param  string  $string
     * @param  integer $maxLength
     * @param  string  $token
     * @return string
     */
    function truncate_by_token($string, $maxLength = 100, $token = ' ', $posfix = '...')
    {

        if (strlen($string) > $maxLength) {
            //Log::info("Limiting length");
            $exploded = explode($token, $string);
            //Log::info('Exploded: ' . var_export($exploded, true));
            $partsToInclude = [];
            $currentLength = 0;
            foreach ($exploded as $part) {
                if ($currentLength + strlen($part) <= $maxLength) {
                    $partsToInclude[] = $part;
                    $currentLength += strlen($part) + strlen($token); // To account for the token len too!
                } else {
                    // No more space to fit another part
                    break;
                }
            }
            //Log::info('Final parts: ' . var_export($partsToInclude, true));
            $return = implode($token, $partsToInclude) . $posfix;
            return $return;
        } else {
            return $string;
        }
    }


}