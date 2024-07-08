<?php

use Klein\Klein;
use Cmd\Services\Endpoints;
use Cmd\Middleware\OnError;
use Cmd\Middleware\OnHttpError;
use Cmd\Middleware\CorsMiddleware;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Max-Age: 86400');

//error_log('Se accedió a la ruta: ');
$app = new Klein();

//| Controlrutas
$app->with('', function () use ($app) {
    Endpoints::initEndpoints($app);
});

//| Control de errores
$app->onError(OnError::ValidationException($app));
$app->onHttpError(OnHttpError::errors($app));

//| Ejecutar la aplicación
$app->dispatch();