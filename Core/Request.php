<?php

namespace Core;

/**
 * Class Request
 * @package Core
 */
class Request
{
    /**
     * @param $name
     * @param null $default
     * @return null
     */
    public function get($name, $default = null)
    {
        return $_GET[$name] ?? $default;
    }

    /**
     * @param null $name
     * @param null $default
     * @return null
     */
    public function post($name = null, $default = null)
    {
        if ($name === null) {
            return $_POST;
        }
        return $_POST[$name] ?? $default;
    }
}