<?php
/**
 * Created by PhpStorm.
 * User: Fede Marquesto
 * Date: 6/9/2018
 * Time: 20:07
 */

$app->group('', function()use($app){
    $app->get('/auth/signin','AuthController:getSignIn')->setName('auth.signin');
    $app->post('/auth/signin','AuthController:postSignIn');

})->add(new \App\Middleware\GuestMiddleware($container));

$app->group('', function ()use($app){
    $app->get('/','DashboardController:index')->setName('dashboard');
    $app->get('/auth/signout', 'AuthController:getSignOut')->setName('auth.signout');
})->add(new \App\Middleware\AuthMiddleware($container));