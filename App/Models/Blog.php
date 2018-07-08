<?php
/**
 * Created by PhpStorm.
 * User: Holan
 * Date: 08.07.2018
 * Time: 19:35
 */

namespace App\Models;


use Core\Model;

/**
 * Class Blog
 * @package App\Models
 */
class Blog extends Model
{
    protected $table = 'blog';

    /**
     * @var array
     */
    public $fields = [
        'title' => null,
        'upd_dt' => null,
        'text' => null,
        'url_img' => null
    ];


}