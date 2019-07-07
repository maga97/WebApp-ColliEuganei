<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
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
        <ul class="breadcrumb">
            <li>Luoghi</li>
            <li><a href="lispida.php">Castello di Lispida</a></li>
        </ul>
        <div class="section">
            <h2>Il Castello di Lispida</h2>
                <img class="responsive-image history-picture float-right" src="assets/img/lispida1.jpg" alt="Castello di Lispida dall'alto"/>
            <p class="text">
                Il castello di Lispida, situato nei pressi di Monselice, nel cuore del Parco Regionale dei Colli
                Euganei,
                offre sistemazioni rustiche in un verdeggiante ambiente naturale, una piscina coperta, 2 vasche
                idromassaggio
                all'aperto e biciclette a uso gratuito. Gli appartamenti e le camere di questo edificio in pietra
                presentano arredi in stile rustico e soffitti
                con travi in legno a vista. Alcuni appartamenti vantano arredi classici, un caminetto o un tavolo da
                biliardo.
                Il Castello di Lispida ospita una propria cantina, dove potrete dedicarvi a una degustazione di vini (su
                richiesta e senza costi aggiuntivi) per poi eventualmente acquistarli.
                Questa grande struttura dispone di attrezzature per barbecue, ampi giardini e sale per eventi e
                conferenze. </p>
            <h2>I dintorni</h2>
            <p class="text">
                A 4 km troverete la stazione ferroviaria e il castello di Monselice, mentre con un tragitto di 2 km
                raggiungerete la più vicina fermata dell'autobus pubblico.
                Il personale può organizzare escursioni e gite in bicicletta nel parco.
            </p>
            <h2>Descrizione</h2>
                <img class="responsive-image history-picture float-right" src="assets/img/lispida2.jpg"
                     alt="Giardino del Castello di Lispida"/>
            <p class="text">
                Custodita nel cuore del Parco Naturale dei Colli Euganei, la Tenuta di Lispida ricomprende un lago
                termale con sorgenti calde e si estende per 90 ettari fra boschi, vigneti e uliveti.
                ll castello, complesso monumentale eretto nel medioevo e riedificato nel XIX secolo, ospita l’azienda
                vinicola, gli antichi edifici con appartamenti dalla sobria eleganza e i granai dagli
                ampi spazi per feste ed eventi.
                Papa Eugenio III nel 1150 conferma all’ordine monastico di Sant’Agostino il possesso del colle e di una
                chiesa dedicata a S.Maria di Ispida.
            </p>
            <p class="text">
                Il monastero di Lispida, sorto in posizione isolata e tranquilla, fu sempre un luogo ricco di fascino,
                oltre che un ambiente ideale per la coltivazione della vite e dell’olivo. Nel 1485 il Doge della
                Repubblica di Venezia Giovanni Mocenigo confisca ai monaci la proprietà : “affinché le vigne, gli olivi
                e i campi non siano abbandonati, siano seminati e coltivati nella giusta stagione, e la pietra del colle
                ci venga mandata con regolarità”. La storia monastica di Lispida si interrompe nel 1792.
            </p>
                <img class="responsive-image history-picture float-right" src="assets/img/lispida3.jpg"
                     alt="Vigneti del Castello di Lispida"/>
            <p class="text">
                La proprietà viene in seguito acquistata dai conti Corinaldi, i quali sui resti del vetusto monastero
                edificano le costruzioni che oggi vediamo, le dotano di cantine imponenti e iniziano la produzione di
                vini rinomati in tutta Europa. Durante la prima guerra mondiale il Castello di Lispida ospita il
                quartier generale del re Vittorio Emanuele III°. Alla fine degli anni ‘50 , con l’impianto di nuovi
                vigneti e con programmi di vinificazione legati ai tradizionali processi produttivi preindustriali,
                l’azienda riprende la sua vocazione vitivinicola.
            </p>
        </div>
    </div>
    <a id="scroll-top-btn" href="#top">Torna in alto</a>
    <?php include_once('footer.php'); ?>
</div>
</body>
</html>
