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
                height: auto;
                overflow: hidden;
            }
            .me > a {
                color: #fff;
                text-decoration: none;
            }
            .links {
                float: right;
            }
            .links > a {
                max-width: 40px;
                height: 40px;
                padding: 10px;
                float: left;
            }
            .links > a > img {
                max-width: 100%;
            }

            p > code {
                border: 2px solid #aaa;
                padding: 2px 5px;
                border-radius: 5px;
                color: #800;
                background: #f3f3f3;
                border-color: #aaa;
            }
        </style>
    </head>
    <body>
        <header>
            <div class="container">
                <?php // Come up with a heading and link to linkedin / github ?>
                <div class="links">
                    <a href="#">
                        <img src="/github.png" />
                    </a>
                    <a href="#">
                        <img src="/linkedin.png" />
                    </a>
                </div>
            </div>
        </header>
        <main class="container">
            <aside>
                <h3>All Articles</h3>
                <ul>
                    <?php foreach ($pages as $page): ?>
                        <li><a href="/<?= $page ?>"><?= $page ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </aside>
            <section>
                <?= $contents ?>
            </section>
        </main>
         <footer></footer>
         <!-- TODO: improve this mechanism with admin capabilities --> 
         <!-- script to load should match the name of the page -->
        <script src="/<?= $scriptName ?>.js"></script>
    </body>
</html>
