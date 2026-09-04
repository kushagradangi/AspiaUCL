<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle($request = Illuminate\Http\Request::create('/controls/GOV-001', 'GET'));
echo "Status: " . $response->getStatusCode() . "\n";
$content = $response->getContent();
echo "Has 'View Domain:': " . (strpos($content, 'View Domain:') !== false ? 'YES' : 'NO') . "\n";
