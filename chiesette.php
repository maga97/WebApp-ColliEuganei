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
    <title>Le 7 chiesette - Colli Euganei</title>
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
        <div class="header-picture"></div>
        <div class="header-title">
            <h1>Colli Euganei</h1>
            <h2>Natura e storia in digitale</h2>
        </div>
    </div>
    <?php include_once('menu.php'); ?>
    <div id="content">
        <ul class="breadcrumb">
            <li>Luoghi</li>
            <li><a href="chiesette.php">Le 7 Chiesette</a></li>
        </ul>
        <div class="section">
            <h2>La via delle 7 chiesette</h2>
            <div class="float-right">
                <img class="pic storiapic" src="assets/img/7chiesette.jpg" alt="Le 7 chiesette"/>
            </div>
            <p class="text">
                La via delle sette chiesette è un breve percorso e meta di pellegrinaggio in quel di Monselice.
                Il viale, in leggera salita, è affiancato da 6 cappellette, ognuna dedicata ad una chiesa romana.
            </p>
            <h2>Le chiesette</h2>
            <p class="text">
                Ognuna delle cappellette, ha al suo interno una pala d'altare dipinta da Jacopo Palma il Giovane
                raffigurante la basilica romana a cui è dedicata. La settima chiesa è il Santuario di San Giorgio nel
                quale si
                trovano le salme di 25 martiri cristiani e altre reliquie trasferitevi a metà del XVII secolo.
            </p>
            <div class="float-right">
                <img class="pic storiapic" src="assets/img/santuario2.jpg" alt="Il santuario"/>
            </div>
            <h2>Villa Duodo e il Mastio Federiciano</h2>
            <p class="text">
                Al termine del percorso si trova la villa Duodo, appartenuta a Pietro Duodo, nobile di origini
                Veneziane, il quale fece costruire
                le 6 cappellette per complementare la cappella privata della villa.
                La strada prosegue verso il Mastio Federiciano, una roccaforte del XIII secolo voluta dall'imperatore
                Federico II ora adibita a museo con terrazza panoramica.
            </p>
        </div>
    </div>
    <a id="scroll-top-btn" href="#top">Torna in alto</a>
    <?php include_once('footer.php'); ?>
</div>
</body>
</html>
