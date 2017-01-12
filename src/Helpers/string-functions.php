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
     * It splits the $string by blank spaces. If some words are between single or double quotes, all words
     * inside the quotes will be treated as a single term. Any other symbol will be treated as a simple character.
     * Examples:
     * - hello World!               => ['hello', 'World!']
     * - "say hi" to "the World!"   => ['say hi', 'to', 'the World!']
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

        // replace any double quotes with single quotes for simpler processing
        $string = str_replace('"', "'", $string);
        // put spaces between the single quotes, so it's tokenized properly for the processing below
        $string = str_replace("'", " ' ", $string);

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

            if ($word == "'") {
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

