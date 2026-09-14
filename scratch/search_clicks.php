<?php

$file = 'resources/views/aspiaUcl/domains/domain_template.html';
$content = file_get_contents($file);
$lines = explode("\n", $content);
foreach ($lines as $num => $line) {
    if (stripos($line, 'click') !== false || stripos($line, 'nav') !== false || stripos($line, 'dropdown') !== false) {
        if (stripos($line, 'click') !== false || stripos($line, 'event') !== false || stripos($line, 'menu') !== false) {
            echo ($num + 1) . ": " . trim($line) . "\n";
        }
    }
}
