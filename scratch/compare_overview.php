<?php

$dom = file_get_contents('resources/views/aspiaUcl/domains/domains_overview.html');
$ctrl = file_get_contents('resources/views/aspiaUcl/controls/controls_overview.html');

echo "DOM size: " . strlen($dom) . " bytes\n";
echo "CTRL size: " . strlen($ctrl) . " bytes\n";

preg_match_all('/<section[^>]*id=["\']([^"\']+)["\'][^>]*>/i', $dom, $domSecs);
preg_match_all('/<section[^>]*id=["\']([^"\']+)["\'][^>]*>/i', $ctrl, $ctrlSecs);

echo "DOM Sections:\n - " . implode("\n - ", $domSecs[1]) . "\n\n";
echo "CTRL Sections:\n - " . implode("\n - ", $ctrlSecs[1]) . "\n\n";

// Compare CSS classes present in DOM but missing in CTRL
preg_match_all('/class=["\']([^"\']+)["\']/', $dom, $domClasses);
preg_match_all('/class=["\']([^"\']+)["\']/', $ctrl, $ctrlClasses);

$domClassList = array_unique(array_merge(...array_map(function($c) { return explode(' ', $c); }, $domClasses[1])));
$ctrlClassList = array_unique(array_merge(...array_map(function($c) { return explode(' ', $c); }, $ctrlClasses[1])));

$missingInCtrl = array_diff($domClassList, $ctrlClassList);
echo "Classes in DOM missing in CTRL: " . implode(', ', $missingInCtrl) . "\n";
