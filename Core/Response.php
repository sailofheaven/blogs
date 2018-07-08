<?php

namespace Core;

/**
 * Class Response
 * @package Core
 */
class Response
{
    /**
     * @param $data
     * @return bool
     */
    static function json($data)
    {
        header('Content-type:application/json;charset=utf-8');
        echo json_encode($data);
        return true;
    }
}