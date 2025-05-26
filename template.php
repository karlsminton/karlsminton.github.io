<!DOCTYPE html>
<html>
    <head>
        <title><?= $title ?></title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.11.1/styles/default.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.11.1/highlight.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.11.1/languages/go.min.js"></script>
        <script>hljs.highlightAll();</script>
        <style>
            body {
                font-family: Calibri, Arial;
            }
            .container {
                max-width: 1200px;
                margin: auto;
            }
        </style>
    </head>
    <body>
        <header></header>
        <main>
            <aside>
                <h3>All Articles</h3>
                <ul>
                    <?php foreach ($pages as $page): ?>
                        <li><a href="<?= $page ?>"><?= $page ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </aside>
            <section class="container">
                <!-- BODY -->
                 <?= $contents ?>
                <!-- BODY END -->
            </section>
        </main>
         <footer></footer>
        <script src="index.js"></script>
    </body>
</html>
