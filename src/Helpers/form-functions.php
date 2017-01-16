<?php

if (!function_exists('select_tag')) {

    function select_tag($name, $list = [], $selected = null, $options = [], $listOptions = [])
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