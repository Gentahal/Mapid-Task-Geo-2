<?php

use Illuminate\Http\Request;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';

// Pastikan direktori ini ada dan bisa ditulisi
$storagePath = '/tmp/storage';
if (!is_dir($storagePath)) {
    mkdir($storagePath, 0755, true);
    mkdir($storagePath . '/framework', 0755, true);
    mkdir($storagePath . '/framework/views', 0755, true);
    mkdir($storagePath . '/framework/cache', 0755, true);
}

$app->useStoragePath($storagePath);

$request = Request::capture();
$app->handleRequest($request);