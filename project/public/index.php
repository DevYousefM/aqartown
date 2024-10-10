<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap the application...
$app = require_once __DIR__.'/../bootstrap/app.php';

// Handle the incoming request...
$request = Request::capture();
$response = $app->make(Illuminate\Contracts\Http\Kernel::class)->handle($request);
$response->send();

// Terminate the application...
$app->terminate($request, $response);