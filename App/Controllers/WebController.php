<?php

namespace App\Controllers;


use Core\Controller;
use Core\View;

/**
 * Class WebController
 * @package App\Controllers
 */
class WebController extends Controller
{
    /**
     *
     */
    public function action_index()
    {
        $view = new View('index');
        echo $view->render();
    }
}