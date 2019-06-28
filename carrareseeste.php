<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+ARIA 1.0//EN"
        "http://www.w3.org/WAI/ARIA/schemata/xhtml-aria-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" media="handled, screen"/>
    <link rel="stylesheet" type="text/css" href="assets/css/print.css" media="print"/>
    <link rel="stylesheet" type="text/css" href="assets/css/mobile768.css" media="screen and (max-width: 768px)"/>
    <link rel="stylesheet" type="text/css" href="assets/css/mobile480.css" media="screen and (max-width: 480px)"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css"/>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <title>Il Castello Carrarese di Este - Colli Euganei</title>
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
            <li><a href="carrareseeste.php">Il Castello Carrarese di Este</a></li>
        </ul>
        <div class="section">
            <h2>Il Castello Carrarese di Este</h2>
            <div class="float-right">
                <img class="pic storiapic" src="assets/img/este1.jpg" alt="Castello Carrarese di Este"/>
            </div>
            <p class="text">
                Il castello di Este è stato costruito circa nel 1340, per iniziativa del signore di Padova Ubertino da
                Carrara.
                La costruzione è a pianta quadrata, circondata da una poderosa muraglia intervallata da dodici
                torresini, questo fortilizio ha di fatto soppiantato il primo castello, quello dei marchesi d’Este,
                sorto sull’area collinare fin dal XI secolo e gravemente danneggiato dalle guerre del ‘200 e del ‘300.
            </p>
            <p class="text">
                Il mastio è sito sul colle, in posizione di controllo sull’intero abitato; culmina con una torre
                quadrata e presenta a nord-est un castelletto o Rocca del Soccorso, che originariamente costituiva
                l’accesso alla fortezza.
                Lo spazio compreso all’interno della cinta muraria è oggi adibito a giardino pubblico.
            </p>
            <h2>L'evoluzione del Castello</h2>
            <div class="float-right">
                <img class="pic storiapic" src="assets/img/este2.jpg" alt="Parco del Castello Carrarese di Este"/>
            </div>
            <p class="text">
                Il Castello fu utilizzato a fini difensivi fino alla spontanea dedizione della città alla Repubblica di
                Venezia, quando l’intera struttura fu venduta ai Mocenigo: furono questi ultimi a far costruire verso la
                fine del Cinquecento il Palazzetto,
                dove attualmente ha sede il Museo Nazionale Atestino.
            </p>
            <p class="text">
                Persa la sua valenza militare, nel 1570 circa, il castello venne acquistato dalla ricca e potente
                famiglia veneziana dei Mocenigo,
                che iniziarono i lavori di costruzione del proprio palazzo sul lato meridionale della fortificazione
                carrarese.
                Originariamente il grandioso palazzo era composto da due edifici speculari, che richiesero la
                demolizione di un paio delle torri medievali. L'ala orientale fu però distrutta da un incendio nel
                Settecento.
            </p>
        </div>
    </div>
    <a id="scroll-top-btn" href="#top">Torna in alto</a>
    <?php include_once('footer.php'); ?>
</div>
</body>
</html>
