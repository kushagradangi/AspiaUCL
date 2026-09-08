<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$t = \App\Models\FrameworkTemplate::find(1);
if ($t) {
    preg_match_all('/In Simple Terms.*?</s', $t->html_content, $m);
    print_r($m[0]);
    preg_match_all('/<div class="[^"]*callout[^"]*">.*?<\/div>/s', $t->html_content, $m2);
    print_r($m2[0]);
}
