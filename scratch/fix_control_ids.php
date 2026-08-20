<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Requirement;

$affected = Requirement::all();
$count = 0;

foreach ($affected as $req) {
    $controlId = $req->control_id;
    // Check if control_id starts with '=' or is empty or contains Excel formula
    if (empty($controlId) || str_starts_with(trim($controlId), '=') || str_contains($controlId, 'LEFT(') || str_contains($controlId, 'FIND(')) {
        // Extract control_id from requirement_id (e.g. EXC-001-R010 -> EXC-001)
        $cleanControlId = preg_replace('/-R\d+$/i', '', $req->requirement_id);
        
        // If regex didn't change it, fallback to hyphen splitting
        if ($cleanControlId === $req->requirement_id && str_contains($req->requirement_id, '-')) {
            $parts = explode('-', $req->requirement_id);
            if (count($parts) > 1 && preg_match('/^R\d+$/i', end($parts))) {
                array_pop($parts);
                $cleanControlId = implode('-', $parts);
            }
        }

        $req->control_id = $cleanControlId;
        $req->save();
        $count++;
        echo "Fixed [ID {$req->id}]: {$req->requirement_id} => {$cleanControlId}\n";
    }
}

echo "\nTotal records updated: {$count}\n";
