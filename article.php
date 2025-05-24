<?php

$title = $_POST['title'] ?? null;
$html = $_POST['html'] ?? null;

if (empty($title)) {
    throw new Exception("title can't be empty");
}

if (empty($html)) {
    throw new Exception("html can't be empty");
}

//$handle = fopen(__DIR__ . '/src/' . $title, 'w');
//fwrite($handle, $html);
//fclose($handle);
file_put_contents(__DIR__ . '/src/pages' . $title , $html);

header("Location: index.php");
exit;
