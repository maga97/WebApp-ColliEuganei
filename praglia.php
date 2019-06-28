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
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" media="handled, screen"/>
    <link rel="stylesheet" type="text/css" href="assets/css/print.css" media="print"/>
    <link rel="stylesheet" type="text/css" href="assets/css/mobile768.css" media="screen and (max-width: 768px)"/>
    <link rel="stylesheet" type="text/css" href="assets/css/mobile480.css" media="screen and (max-width: 480px)"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css"/>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <title>L'Abbazia di Praglia - Colli Euganei</title>
</head>
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
            <li><a href="praglia.php">L'Abbazia di Praglia</a></li>
        </ul>
        <div class="section">
            <h2>L'Abbazia di Praglia</h2>
            <div class="float-right">
                <img class="pic storiapic" src="assets/img/praglia1.jpg" alt="Abbazia di Praglia"/>
            </div>
            <p class="text">
                L'abbazia di Praglia è un monastero benedettino situato nel comune di Teolo, in prossimità di Abano
                Terme. Ospita attualmente la Biblioteca nazionale, che è un monumento nazionale italiano.
                È attualmente retta dall'abate dom. Norberto Villa e la comunità conta 49 monaci.
                Si tratta di un monastero benedettino molto antico, fondato nell’XI secolo per iniziativa della nobile
                famiglia vicentina dei Maltraversi. Il suo nome deriva dal termine medievale “pratalea” (località tenuta
                a prati)
                e si rifà probabilmente alla grande opera di bonifica e di messa a coltura di terre paludose della zona
                avviata proprio dai Benedettini nel Medioevo.
                L'intera abbazia fu ricostruita a partire dal 1469 e nel 1490 i benedettini vi aggiunsero la "chiesa
                dell'Assunta", realizzata su disegno di Tullio Lombardo (poi radicalmente trasformata da Andrea Moroni).
                L'abbazia è divenuta un centro di eccellenza nel settore del restauro dei libri antichi. </p>
            <h2>I chiostri</h2>
            <div class="float-right">
                <img class="pic storiapic" src="assets/img/praglia2.jpg" alt="Il monastero dall'interno"/>
            </div>
            <p class="text">
                All'interno della cinta muraria il monastero si divide in quattro chiostri: doppio, detto anche della
                clausura, botanico, pensile e rustico (nel quale si depositavano gli attrezzi agricoli).
                Alla seconda metà del XV secolo risalgono il chiostro botanico, un tempo destinato alla coltivazione
                delle piante medicinali e oggi elegante giardino, il chiostro doppio circondato dalle celle dei monaci e
                il chiostro pensile
                o “del Paradiso”, collocato al primo piano e caratterizzato da colonne e capitelli finemente lavorati.
                Più tardo il chiostro rustico su cui affacciano la foresteria e il centro per conferenze e attività
                culturali.
            </p>
            <h2>L'abbazia oggi</h2>
            <p class="text">
                L'Abbazia di Praglia, ancora oggi abitata da monaci benedettini e meta di un costante turismo religioso,
                ospita al suo interno anche una Biblioteca Monumentale Nazionale, che contiene circa 100.000 volumi.
                La sala al piano superiore è impreziosita da 17 tele di G.B. Zelotti, pittore del tardo Cinquecento,
                inserite negli scomparti del soffitto in legno.
                Altre tele dello stesso artista, con temi biblici, si trovano ora nel refettorio.
                Il laboratorio di restauro dei libri e codici antichi è un altro fiore all’occhiello dell’Abbazia.
            </p>
        </div>
    </div>
    <a id="scroll-top-btn" href="#top">Torna in alto</a>
    <?php include_once('footer.php'); ?>
</div>
</body>
</html>
