<?php
/**
 * Created by PhpStorm.
 * User: Fede Marquesto
 * Date: 6/9/2018
 * Time: 20:42
 */

namespace App\Middleware;


class CsrfViewMiddleware extends Middleware
{
    function __invoke($request, $response, $next)
    {
        $this->container->view->getEnvironment()->addGlobal('csrf',[
            'field' =>'
                <input type="hidden" name="' . $this->container->csrf->getTokenNameKey() . '" value="' . $this->container->csrf->getTokenName() . '">
                <input type="hidden" name="'.$this->container->csrf->getTokenValueKey().'" value="'.$this->container->csrf->getTokenValue().'">
            ',
            'name'=>$this->container->csrf->getTokenName(),
            'value'=>$this->container->csrf->getTokenValue()
        ]);

        return $next($request,$response);
    }
}