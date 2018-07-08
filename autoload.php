<?php
spl_autoload_register(function ($class) {
    if (!class_exists($class, false)) {

        $file = str_replace('\\', DS, $class) . '.php';

        if (file_exists(ROOT . DS . $file)) {
            require_once $file;
        }
    }
});