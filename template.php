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
                margin: 0;
            }
            .container {
                max-width: 1200px;
                margin: auto;
            }
            main {
                display: flex;
            }
            aside {
                min-width: 300px;
                padding: 15px;
            }
            header {
                background: rgb(0, 0, 127.5);
                margin-bottom: 15px;
                color: #fff;
            }
            .me > a {
                color: #fff;
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <header>
            <div class="container">
                <!-- Come up with a heading and link to linkedin / github -->
            </div>
        </header>
        <main class="container">
            <aside>
                <h3>All Articles</h3>
                <ul>
                    <?php foreach ($pages as $page): ?>
                        <li><a href="<?= $page ?>"><?= $page ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </aside>
            <section>
                <!-- BODY -->
                 <?= $contents ?>
                <!-- BODY END -->
            </section>
        </main>
         <footer></footer>
        <script src="index.js"></script>
    </body>
</html>
