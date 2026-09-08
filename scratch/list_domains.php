<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$domains = \App\Models\Domain::orderByRaw('CAST(SUBSTRING_INDEX(domain_id, "-", -1) AS UNSIGNED) ASC, domain_id ASC')->get();
echo "Total Domains: " . $domains->count() . "\n";
foreach ($domains as $d) {
    $controlsCount = $d->getControlsList()->count();
    echo "{$d->domain_id} | Code: {$d->domain_code} | Name: {$d->name} | Owner: {$d->business_owner} | Controls: {$controlsCount}\n";
}
