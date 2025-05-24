<?php

/**
 * Compile '/src' and distribute to '/dist'
 */

include_once __DIR__ . '/globals.php';

function compile(string $file): void {
    ob_start();
    $contents = file_get_contents(PAGES_DIR . '/' . $file);
    include __DIR__ . '/template.php';
    $generated = ob_get_contents();
    ob_end_clean();
    file_put_contents(DIST_DIR . '/' . $file, $generated);
};

$scan = scandir(PAGES_DIR);
$files = array_filter($scan, function ($item) {
    return strpos($item, '.') !== 0;
});

foreach ($files as $file) {
    compile($file);
}
