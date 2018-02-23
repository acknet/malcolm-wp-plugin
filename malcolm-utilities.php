<?php

if (! function_exists('array_get')) {
    /**
     * Convienience method for getting objects from an array or object.
     *
     * @param array|object
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function array_get($array, $key, $default = null)
    {
        if (is_array($array) && array_key_exists($key, $array)) {
            return $array[$key];
        } elseif (is_object($array) && property_exists($array, $key)) {
            return $array->{$key};
        }

        return $default;
    }
}

if (!function_exists('dd')) {
    /**
     * Dump out variables in a human readable format.
     *
     * @return mixed
     */
    function dd()
    {
        foreach (func_get_args() as $arg) {
            echo '<pre>';
            if (is_bool($arg)) {
                echo $arg === true ? 'true' : 'false';
            } elseif (is_numeric($arg)) {
                echo $arg;
            } elseif (is_string($arg)) {
                echo '"' . $arg . '"';
            } else {
                print_r($arg);
            }
            echo '</pre>';
        }
        die;
    }
}

if (! function_exists('form_val')) {
    /**
     * Sanitise a value before outputting it.
     *
     * @return bool
     */
    function form_val($value)
    {
        $value = urldecode($value);
        $value = html_entity_decode($value);
        $value = trim($value);
        $value = htmlentities($value, ENT_QUOTES, 'UTF-8');

        return $value;
    }
}
