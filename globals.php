<?php

const APP_DIR = __DIR__;

const SRC_DIR = __DIR__ . '/src';

const PAGES_DIR = SRC_DIR . '/pages';

const DIST_DIR = __DIR__ . '/dist';

function compile(string $file): void {
    ob_start();
    $contents = file_get_contents(PAGES_DIR . '/' . $file);

    preg_match('/<h1>(.*?)<\/h1>/', $contents, $matches);
    $titleArrayKey = array_key_last($matches);
    $title = $matches[$titleArrayKey] ?? 'Page'; // todo get better default value

    $pages = getPages();

    include __DIR__ . '/template.php';
    $generated = ob_get_contents();
    ob_end_clean();
    file_put_contents(DIST_DIR . '/' . $file, $generated);
};

function getPages(): array {
    $iterator = new RecursiveDirectoryIterator(PAGES_DIR);

    $files = [];
    /** @var SplFileInfo $file */
    foreach(new RecursiveIteratorIterator($iterator) as $file) {
        if (
            !$file->isFile()
            || $file->getExtension() !== 'html'
        ) {
            continue;
        }

        $filename = str_replace(
            PAGES_DIR,
            '',
            $file->getRealPath()
        );
        $files[] = ltrim($filename, '/');
    }
    return $files;
}
