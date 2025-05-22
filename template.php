<!DOCTYPE html>
<html>
    <head>
        <title>Tutorial 01</title>
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
        <div class="container">
            <!-- BODY -->
             <?= $contents ?>
            <!-- BODY END -->
         </div>
         <footer></footer>
        <script src="index.js"></script>
    </body>
</html>
