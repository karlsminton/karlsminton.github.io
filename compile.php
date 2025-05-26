<?php

/**
 * Compile '/src' and distribute to '/dist'
 */

include_once __DIR__ . '/globals.php';

$scan = scandir(PAGES_DIR);
$files = array_filter($scan, function ($item) {
    return strpos($item, '.') !== 0;
});

foreach ($files as $file) {
    compile($file);
}
