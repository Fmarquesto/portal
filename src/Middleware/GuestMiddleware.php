<?php
/**
 * Created by PhpStorm.
 * User: Fede Marquesto
 * Date: 6/9/2018
 * Time: 20:32
 */

namespace App\Middleware;


class GuestMiddleware extends Middleware
{
    function __invoke($request, $response, $next)
    {
        if($this->container->auth->check()){
            return $response->withRedirect($this->container->router->pathFor('dashboard'));
        }
        return $next($request, $response);
    }
}