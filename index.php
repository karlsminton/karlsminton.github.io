<?php

include_once __DIR__ . '/globals.php';

$files = getPages();

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
