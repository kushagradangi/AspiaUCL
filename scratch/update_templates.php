<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$updated = 0;

$oldPattern = '/<!-- Controls Menu -->\s*<li class="nav-menu-item dropdown-parent">\s*<a href="\/all-controls" class="nav-menu-link">\s*<span>Controls<\/span>\s*<span class="dropdown-arrow">▾<\/span>\s*<\/a>\s*<div class="dropdown-popover">\s*\{\{all_controls_dropdown_list\}\}\s*<\/div>\s*<\/li>/i';

$newReplacement = "<!-- Controls Menu -->\n                    <li class=\"nav-menu-item\">\n                        <a href=\"/all-controls\" class=\"nav-menu-link\">\n                            <span>Controls</span>\n                        </a>\n                    </li>";

foreach (\App\Models\DomainTemplate::all() as $dt) {
    $content = $dt->html_content;
    $newContent = preg_replace($oldPattern, $newReplacement, $content);
    if ($newContent !== $content) {
        $dt->html_content = $newContent;
        $dt->save();
        $updated++;
        echo "Updated DomainTemplate ID {$dt->id}\n";
    }
}

foreach (\App\Models\ControlTemplate::all() as $ct) {
    $content = $ct->html_content;
    $newContent = preg_replace($oldPattern, $newReplacement, $content);
    if ($newContent !== $content) {
        $ct->html_content = $newContent;
        $ct->save();
        $updated++;
        echo "Updated ControlTemplate ID {$ct->id}\n";
    }
}

foreach (\App\Models\FrameworkTemplate::all() as $ft) {
    $content = $ft->html_content;
    $newContent = preg_replace($oldPattern, $newReplacement, $content);
    if ($newContent !== $content) {
        $ft->html_content = $newContent;
        $ft->save();
        $updated++;
        echo "Updated FrameworkTemplate ID {$ft->id}\n";
    }
}

echo "Done updating database templates. Total updated: $updated\n";
