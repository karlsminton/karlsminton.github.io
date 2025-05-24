<?php

include_once __DIR__ . '/globals.php';

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


?>
<h1>Articles</h1>
<ul>
    <?php foreach ($files as $file): ?>
        <li>
            <a href="edit.php?name=<?php echo $file; ?>">
                <?= $file; ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
