<?php

namespace Core;

/**
 * Class Controller
 * @package Core
 */
class Controller
{

    protected $request;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->request = new Request();
    }

    /**
     * @param $meth
     * @param $params
     * @return bool
     */
    function __call($meth, $params)
    {
        return false;
    }
}