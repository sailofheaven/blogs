<?php
/**
 * Created by PhpStorm.
 * User: Holan
 * Date: 08.07.2018
 * Time: 20:57
 */

namespace Core;

/**
 * Class View
 * @package Core
 */
class View
{

    private $viewDir = ROOT . DS . 'App' . DS . 'Views';
    private $viewFile;

    /**
     * View constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $file = $this->viewDir . DS . "{$name}.php";

        if (file_exists($file)) {
            $this->viewFile = $file;
        }

    }

    /**
     * @param array $data
     * @return string
     */
    public function render($data = [])
    {
        ob_start();
        ob_implicit_flush(false);
        extract($data, EXTR_OVERWRITE);
        require($this->viewFile);
        return ob_get_clean();
    }
}