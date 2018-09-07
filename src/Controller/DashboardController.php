<?php
/**
 * Created by PhpStorm.
 * User: Fede Marquesto
 * Date: 6/9/2018
 * Time: 21:03
 */

namespace App\Controller;


class DashboardController extends Controller
{
    public function index($request, $response)
    {
        return $this->view->render($response, 'dashboard.twig');
    }
}