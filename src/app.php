<?php
/**
 * Created by PhpStorm.
 * User: Fede Marquesto
 * Date: 6/9/2018
 * Time: 20:01
 */
session_start();
require __DIR__ . '/../vendor/autoload.php';
$config = [
    'settings' => [
        'addContentLengthHeader' => false,
        'displayErrorDetails' => true,
        'db' => [
            'driver'=>'mysql',
            'host'=>'localhost',
            'database'=>'portal',
            'username'=>'root',
            'password'=>'',
            'charset'=>'utf8',
            'collation'=>'utf8_unicode_ci',
            'prefix'=>''
        ]
    ],
];

$app = new \Slim\App($config);
$container = $app->getContainer();
require_once __DIR__ . '/db.php';

$container['validator'] = function ($container) {
    return new \App\Validation\Validator;
};
$container['csrf'] = function ($container) {
    return new \Slim\Csrf\Guard;
};
$container['auth'] = function ($container) {
    return new App\Auth\Auth($container);
};
$container['flash'] = function ($container) {
    return new \Slim\Flash\Messages();
};

$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(__DIR__ . '/../templates/', [
        //'cache' => '../src/templates/cache'
        'cache' => false
    ]);

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));
    $view->getEnvironment()->addGlobal('auth',[
        'check' => $container->auth->check(),
        'user' => $container->auth->user(),
    ]);
    $view->getEnvironment()-> addGlobal('flash', $container->flash);
    return $view;
};

require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/middleware.php';
require_once __DIR__ . '/routes.php';