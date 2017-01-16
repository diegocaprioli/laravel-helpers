<?php

/*
|--------------------------------------------------------------------------
| Form helper functions
|--------------------------------------------------------------------------
|
| Requires the laravelcollective Form and HTML pacakge to be installed in
| and configured in the main project.
| Please see: https://github.com/LaravelCollective/html
|
*/

if (!function_exists('select_tag')) {

    /**
     * Returns the output of the Form::select function, but alters the array list used as the dropdown options,
     * using the parameters specified in $listOptions. The possible parameters are
     * - select-option: boolean. If true, adds a new "Please select" entry at the top of the list.
     * - select-option-message: if specified, uses this string as the "Please select" text.
     * - select-option-key: if specified, uses this value as the option "key" used for the top "Please select" option.
     *
     * @param $name
     * @param array $list
     * @param null $selected
     * @param array $options
     * @param array $listOptions
     * @return mixed
     */
    function select_tag($name, array $list = [], $selected = null, $options = [], $listOptions = [])
    {
        if (!isset($listOptions['select-option'])) {
            $listOptions['select-option'] = false;
        }

        if ($listOptions['select-option']) {

            if (!isset($listOptions['select-option-message'])) {
                $listOptions['select-option-message'] = "[Please select one option]";
            }

            if (!isset($listOptions['select-option-key'])) {
                $listOptions['select-option-key'] = '0';
            }

            // Add the message to the top of the list
            $list = [ $listOptions['select-option-key'] => $listOptions['select-option-message'] ] + $list;

        }

        return Form::select($name, $list, $selected, $options);
    }

}