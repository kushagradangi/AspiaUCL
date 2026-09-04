<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$controlHtmlPath = resource_path('views/aspiaUcl/controls/control_template.html');
if (file_exists($controlHtmlPath)) {
    $controlHtml = file_get_contents($controlHtmlPath);
    $controlTemplate = \App\Models\ControlTemplate::first();
    if ($controlTemplate) {
        $controlTemplate->update(['html_content' => $controlHtml]);
        echo "Successfully updated ControlTemplate DB record!\n";
    } else {
        \App\Models\ControlTemplate::create([
            'name' => 'Default Control Template',
            'html_content' => $controlHtml
        ]);
        echo "Successfully created ControlTemplate DB record!\n";
    }
}
