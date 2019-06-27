<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+ARIA 1.0//EN"
        "http://www.w3.org/WAI/ARIA/schemata/xhtml-aria-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css" media="handled, screen"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/print.css" media="print"/>
    <link rel="stylesheet" type="text/css" href="assets/css/mobile768.css" media="screen and (max-width: 768px)"/>
    <link rel="stylesheet" type="text/css" href="assets/css/mobile480.css" media="screen and (max-width: 480px)"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css"/>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
    <title>Il Castello del Catajo - Colli Euganei</title>
</head>
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
    <?php include_once('../menu.php'); ?>
    <div id="content">
        <ul class="breadcrumb">
            <li>Luoghi</li>
            <li><a href="catajo.php">Il Castello del Catajo</a></li>
        </ul>
        <div class="section">
            <h2>Il Castello del Catajo</h2>
            <div class="float-right">
                <img class="pic storiapic" src="../assets/img/catajo-XVIIIsec.jpg" alt="Il Castello nel XVIII secolo"/>
            </div>
            <p class="text">
                Il castello del Catajo, situato nei pressi di Battaglia Terme, è un imponente palazzo cinquecentesco,
                oggi aperto al pubblico.
                Inizialmente una semplice villa, venne esteso largamente dal marchese Pio Enea I degli Obizzi dal 1570
                in poi che affidò il progetto
                all'architetto Andrea Da Valle.
                Sebbene gran parte dei lavori di espansione avvennero in pochi anni, gli ampliamenti proseguirono fino a
                metà del XIX secolo.
            </p>
            <p class="text">
                L'edificio sta a metà tra il castello militare e la villa principesca, indubbiamente per volere stesso
                del committente, che pensò
                il Catajo come una grande macchina di rappresentanza dove intrattenere ospiti da tutta Europa con feste,
                balli e rappresentazioni teatrali</p>
            <h2>L'origine del nome</h2>
            <p class="text">
                L'origine del nome è incerta: mentre alcune fonti attribuiscono l'origine del nome al luogo in cui fu
                costruito (vicino ad un canale), altre fanno riferimento
                a come veniva indicata la Cina nel medioevo: "catai" e vedrebbero Pio Enea ispirato da "Il Milione" di
                Marco Polo.
            </p>
            <h2>Descrizione</h2>
            <div class="float-right">
                <img class="pic storiapic" src="../assets/img/affreschi2.jpg" alt="Affreschi del XVIII secolo"/>
            </div>
            <p class="text">
                La villa con le sue 350 stanze, ha l'aspetto del castello, con alte mura caratterizzate da merletti,
                nonostante ciò non fu mai usato come un forte, al contrario,
                l'edificio doveva rappresentare il potere e il prestigio della famiglia, che teneva feste e riceveva
                ospiti da tutta europa.
                Il piano nobile conserva uno dei più importanti esempi di pittura autocelebrativa del nord Italia, opera
                di Giovanni Battista Zelotti.
            </p>
            <p class="text">
                Nel grande salone affrescato spicca l'albero genealogico della famiglia Obizzi, dal capostipite Obicio I
                fino al costruttore del castello Pio Enea I.
                Alle pareti sono dipinte varie battaglie, terrestri e navali: sono illustrate le crociate, cui
                parteciparono i membri della famiglia.
            </p>
        </div>
    </div>
    <a id="scroll-top-btn" href="#top">Torna in alto</a>
    <?php include_once('../footer.php'); ?>
</div>
</body>
</html>
