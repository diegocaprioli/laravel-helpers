<?php

/*
|--------------------------------------------------------------------------
| Collection helper functions
|--------------------------------------------------------------------------
|
|
|
*/


if (!function_exists('convertToOptions')) {

    /**
     * Returns an array to be used as options for a select html tag. The array will be indexed by each of
     * the collection's object (id field), and the value will the the __toString() representation of the
     * object
     *
     * @param $collection
     * @param string $includeOnlyInstancesOf
     * @return array
     * @throws
     */
    function convertToOptions($collection, $includeOnlyInstancesOf = null)
    {

        if( !is_array($collection) && !$collection instanceof Traversable) {
            throw \Exception("The collection must be an array or be a Traversable class");
        }

        $options = [];
        foreach ($collection as $object) {

            if (is_object($object)) {

                // try to get the id
                $objectId = null;
                try {
                    $objectId = $object->id;
                } catch (\Exception $e) {
                    trigger_error("Cannot access the id property of the object instance (" . get_class($object) . ")", E_USER_WARNING);
                    continue;
                }

                // try to get the __toString()
                $objectString = null;
                if (!method_exists($object, '__toString')) {
                    trigger_error("Cannot access the __toString() method of the object instance (" . get_class($object) . ")", E_USER_WARNING);
                    continue;
                }
                $objectString = $object->__toString();

                if (!empty($includeOnlyInstancesOf)) {
                    if (!is_a($object, $includeOnlyInstancesOf)) {
                        continue;
                    }
                }
                $options[$objectId] = $objectString;

            }

        }
        return $options;

    }

}

