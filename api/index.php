<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

require __DIR__.'/../vendor/autoload.php';

$app = require_once __DIR__.'/../bootstrap/app.php';

// Mengarahkan folder storage Laravel ke /tmp (Wajib untuk Vercel)
$app->useStoragePath('/tmp/storage');

$request = Request::capture();
$app->handleRequest($request);