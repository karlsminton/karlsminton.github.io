<?php

// Compile '/src' and distribute to '/dist'

$contents = '';

$src = __DIR__ . '/src';
$dist = __DIR__ . '/dist';

$scan = scandir($src);

$files = array_filter($scan, function ($item) {
    return substr($item, 0, 1) != '.';
});

foreach ($files as $file) {
    ob_start();
    $contents = file_get_contents($src . '/' . $file);
    include __DIR__ . '/template.php';
    $generated = ob_get_contents();
    ob_end_clean();
    file_put_contents($dist . '/' . $file, $generated);
}

