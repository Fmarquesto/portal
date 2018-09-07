<?php
/*$app->add(new \App\Middleware\ValiationErrorsMiddleware($container));
$app->add(new \App\Middleware\OldInputMiddleware($container));
*/
$app->add(new \App\Middleware\CsrfViewMiddleware($container));
$app->add($container->csrf);