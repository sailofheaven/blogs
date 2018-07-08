<?php

namespace Core;

/**
 * Class App
 * @package Core
 */
class App
{
    /**
     * @param $config
     * @return bool
     */
    static function run($config)
    {
        DB::connect(
            $config['db']['host'],
            $config['db']['username'],
            $config['db']['secret'],
            $config['db']['dbname']
        );

        $controllerName = 'Web';
        $actionName = 'index';

        $request = new Request();
        if ($request->get('route')) {
            $uriParts = explode('/', $request->get('route'));

            if (!empty($uriParts[0])) $controllerName = $uriParts[0];
            if (!empty($uriParts[1])) $actionName = $uriParts[1];
        }
        $controllerName = 'App\\Controllers\\' . $controllerName . 'Controller';
        $actionName = 'action_' . $actionName;

        $controller = strtolower($controllerName) . '.php';
        $controllerPath = "../" . $controller;
        if (file_exists($controllerPath)) {
            include $controllerPath;
        } else {
            return false;
        }

        $controller = new $controllerName();
        call_user_func(array($controller, $actionName));
    }
}