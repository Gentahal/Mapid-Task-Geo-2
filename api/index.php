<?php

require __DIR__.'/../vendor/autoload.php';

$app = require_once __DIR__.'/../bootstrap/app.php';

// Paksa setup path
$app->useStoragePath('/tmp');
$app->useBootstrapPath('/tmp');

try {
    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
    $response = $kernel->handle($request = Illuminate\Http\Request::capture());
    $response->send();
    $kernel->terminate($request, $response);
} catch (Exception $e) {
    // Tampilkan error jika inisialisasi kernel gagal
    echo "<h1>Kernel Error</h1><pre>";
    echo $e->getMessage();
    echo "</pre>";
    exit(1);
}