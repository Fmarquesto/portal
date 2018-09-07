<?php
$container['AuthController'] = function($container){
    return new \App\Controller\Auth\AuthController($container);
};

$container['DashboardController'] = function($container){
    return new \App\Controller\DashboardController($container);
};