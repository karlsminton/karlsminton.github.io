<?php

$src = __DIR__ . '/src';

$scan = scandir($src);

$files = array_filter($scan, function ($item) {
    return strpos($item, '.') !== 0;
});

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
