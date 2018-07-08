<?php

if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}

if (!defined('ROOT')) {
    define('ROOT', dirname(dirname(__FILE__)));
}

require_once ROOT . DS . "autoload.php";
$config = require_once ROOT . DS . 'Config' . DS . 'config.php';

\Core\App::run($config);
