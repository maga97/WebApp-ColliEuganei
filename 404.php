<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/print.css" media="print"/>
    <link rel="stylesheet" type="text/css" href="assets/css/mobile768.css" media="screen and (max-width: 768px)"/>
    <link rel="stylesheet" type="text/css" href="assets/css/mobile480.css" media="screen and (max-width: 480px)"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <title>Il Castello di Lispida - Colli Euganei</title>
</head>

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<body>
<div>
    <a href="#content" class="skip">Vai al contenuto</a>
</div>
<div id="container">
    <a id="top"></a>
    <div class="header">
        <div class="header-picture">
            <div class="header-title">
                <h1>Colli Euganei</h1>
                <h2>Natura e storia in digitale</h2>
            </div>
        </div>
    </div>
    <?php include_once('menu.php'); ?>
    <div id="content">
        <div id="not-found-404">
         <img src="assets/img/404-min.png" class="history-picture" alt=""/>
            <div class="text">oooops, sembra che tu ti sia perso!</div>
        </div>
    </div>

    <a id="scroll-top-btn" href="#top">Torna in alto</a>
    <?php include_once('footer.php'); ?>
</div>
</body>
</html>
