<?php
/**
 * Created by PhpStorm.
 * User: Holan
 * Date: 08.07.2018
 * Time: 19:34
 */

namespace App\Controllers;


use App\Models\Blog;
use Core\Controller;
use Core\Request;
use Core\Response;

/**
 * Class BlogController
 * @package App\Controllers
 */
class BlogController extends Controller
{
    /**
     * @return bool
     */
    public function action_index()
    {
        $blogs = new Blog();

        return Response::json($blogs->findAll());
    }

    /**
     * @return bool
     */
    public function action_view()
    {
        $blog = new Blog($this->request->get('id'));

        return Response::json($blog);
    }

    /**
     * @return bool
     */
    public function action_create()
    {
        $b = new Blog();
        $this->setRequestBlog($b);
        $b->save();
        return Response::json($b);
    }

    /**
     * @return bool
     */
    public function action_update()
    {
        $b = new Blog($this->request->get('id'));
        $this->setRequestBlog($b);
        $b->update();
        return Response::json($b);
    }

    /**
     * @return bool
     */
    public function action_delete()
    {
        $blog = new Blog($this->request->get('id'));
        $blog->remove();
        return Response::json($blog);
    }

    /**
     * @param $b
     */
    private function setRequestBlog(&$b)
    {
        $b->set($this->request->post());
        $b->upd_dt = date("Y-m-d H:i:s");
    }
}