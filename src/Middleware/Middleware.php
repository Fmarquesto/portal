<?php
/**
 * Created by PhpStorm.
 * User: Fede Marquesto
 * Date: 6/9/2018
 * Time: 20:30
 */

namespace App\Middleware;


class Middleware
{
    protected $container;

    function __construct($container)
    {
        $this->container = $container;
    }
}