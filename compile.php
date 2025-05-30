<?php

/**
 * Compile '/src' and distribute to '/dist'
 */

include_once __DIR__ . '/globals.php';

$files = getPages();

// var_dump($files);
// die();

foreach ($files as $file) {
    compile($file);
}
