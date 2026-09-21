<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Domain;
use App\Models\Control;
use App\Models\Framework;

echo "--- DOMAINS & LINKED FRAMEWORKS ---\n";
$domains = Domain::with('frameworks')->get();

foreach ($domains as $d) {
    $fws = $d->frameworks->pluck('name')->toArray();
    $firstCtrl = Control::where('domain_id', $d->id)->orWhere('domain_code', $d->domain_code)->first();
    echo "Domain {$d->domain_code} ({$d->name}):\n";
    echo "  Control: " . ($firstCtrl ? $firstCtrl->control_id : 'None') . "\n";
    echo "  Frameworks (" . count($fws) . "): " . implode(', ', $fws) . "\n";
    echo "-----------------------------------\n";
}
