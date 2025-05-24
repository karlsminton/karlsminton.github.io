<?php
include_once __DIR__ . '/globals.php';
$article = $_GET['name'] ?? null;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Edit</title>
        <script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script><!-- Header -->
        <script src="https://cdn.jsdelivr.net/npm/@editorjs/simple-image@latest"></script><!-- Image -->
        <script src="https://cdn.jsdelivr.net/npm/@editorjs/delimiter@latest"></script><!-- Delimiter -->
        <script src="https://cdn.jsdelivr.net/npm/@editorjs/list@latest"></script><!-- List -->
        <script src="https://cdn.jsdelivr.net/npm/@editorjs/checklist@latest"></script><!-- Checklist -->
        <script src="https://cdn.jsdelivr.net/npm/@editorjs/quote@latest"></script><!-- Quote -->
        <script src="https://cdn.jsdelivr.net/npm/@editorjs/code@latest"></script><!-- Code -->
        <script src="https://cdn.jsdelivr.net/npm/@editorjs/embed@latest"></script><!-- Embed -->
        <script src="https://cdn.jsdelivr.net/npm/@editorjs/table@latest"></script><!-- Table -->
        <script src="https://cdn.jsdelivr.net/npm/@editorjs/link@latest"></script><!-- Link -->
        <script src="https://cdn.jsdelivr.net/npm/@editorjs/warning@latest"></script><!-- Warning -->
        <script src="https://cdn.jsdelivr.net/npm/@editorjs/marker@latest"></script><!-- Marker -->
        <script src="https://cdn.jsdelivr.net/npm/@editorjs/inline-code@latest"></script><!-- Inline Code -->
        <!-- Load Editor.js's Core -->
        <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
    </head>
    <body>
        <form action="/article.php" method="POST">
            <label for="title">
                <input type="text" name="title" value="<?= $article ?>">
            </label>
            <label name="html">
                <textarea name="html"><?= file_get_contents(PAGES_DIR . '/' . $article) ?></textarea>
            </label>
            <input type="submit">Submit</form>
        </form>

        <!--<div id="editor"></div>-->
        <!--<script type="module">
            // import EditorJS from '@editorjs/editorjs';

            const editor = new EditorJS({
                holder: 'editor',
                tools: {
                    header: {
                        class: Header,
                        inlineToolbar: true
                    },
                    list: {
                        class: List,
                        inlineToolbar: true
                    }
                }
            });
        </script>-->
    </body>
</html>
