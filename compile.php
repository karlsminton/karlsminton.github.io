<?php

// Compile '/src' and distribute to '/dist'

$src = __DIR__ . '/src';
$dist = __DIR__ . '/dist';

$compile = function(string $src, string $dist, string $file): void {
    ob_start();
    $contents = file_get_contents($src . '/' . $file);
    include __DIR__ . '/template.php';
    $generated = ob_get_contents();
    ob_end_clean();
    file_put_contents($dist . '/' . $file, $generated);
    $contents = '';
    return;
};

$scan = scandir($src);

$files = array_filter($scan, function ($item) {
    return strpos($item, '.') !== 0;
});

foreach ($files as $file) {
    $compile($src, $dist, $file);
}
