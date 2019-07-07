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
    <title>Il Castello di San Pelagio - Colli Euganei</title>
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
            <li><a href="pelagio.php">Il Castello di San Pelagio</a></li>
        </ul>
        <div class="section">
            <h2>Il Castello di San Pelagio</h2>
                <img class="responsive-image history-picture float-right" src="assets/img/pelagio1.jpg"
                     alt="Entrata del Castello di San Pelagio"/>
            <p class="text">
                Il Castello di San Pelagio ha origini medievali (XIV sec.) come testimonia la torre costruita dai Da
                Carrara, Signori di Padova, nella prima met&agrave; del Trecento. L’imponente torre merlata, aveva una funzione
                di prima difesa nei numerosi attacchi da parte degli Scaligeri, Signori di Verona. Nella met&agrave; del
                Settecento la propriet&agrave; passa ai Conti Zaborra che ampliano notevolmente l’edificio, rimodernano l’ala
                padronale per adattarla a residenza signorile e realizzano le barchesse a uso agricolo. Da allora la
                famiglia dei Conti Zaborra abita il Castello ricco di memorie private e storiche.
            </p>
            <p class="text">
                Da qui, il 9 agosto 1918, partì il poeta Gabriele d'Annunzio per il "folle" Volo su Vienna dove compì la
                sua celebre imprese: il lancio di migliaia di volantini inneggianti alla resa sopra la capitale
                austro-ungarica.
                Nelle stanze del poeta tutto &egrave; rimasto come allora perch&eacute; voi possiate rivivere quei momenti e
                ripercorrere la storia del volo umano in un Museo unico in Europa.
                Dal 2018, nel centenario del Volo su Vienna, isole multimediali immersive rendono la visita
                un’esperienza "emozionale"!
            </p>
            <h2>Il giardino</h2>
            <p class="text">
                Il giardino storico del Castello &egrave; un luogo incantevole tutto da vivere e visitare, passeggiando tra le
                rose e i suoi labirinti.
                Dal 1970 il Parco &egrave; stato oggetto di un accurato restauro con il censimento di tutte le specie botaniche
                tutt’ora presenti; i due giardini della villa, nelle loro differenti tipologie,
                sono stati arricchiti di nuove piante e soprattutto di migliaia di rose che, specie a maggio, ne fanno
                un grande spettacolo!
                Tra le piante pi&ugrave; antiche una Lagestroemia Indica del 1700 e numerosi esemplari di Tilia cordata e
                Carpinus betulus ultra-centenari.
                Nel 2000 &egrave; stato creato un labirinto verde di 1200 mq, per raccontare il mito del volo di Icaro, senza
                dimenticare la funzione dei labirinti delle ville venete.
                Nel 2007 &egrave; sorto il labirinto del “Forse che Si Forse che No” per sottolineare il concetto dannunziano
                di doppio.
            </p>
            <h2>Il museo</h2>
                <img class="responsive-image history-picture float-right" src="assets/img/pelagio2.jpg"
                     alt="Museo del volo nel Castello di San Pelagio"/>
            <p class="text">
                Dal 1970 la villa &egrave; stata oggetto di accurati restauri e ripensata nelle funzioni attuali principalmente
                come Museo del Volo. Inaugurato nel 1980, ripercorre l’intera storia del volo umano facendo perno
                sull’impresa dannunziana; a tale volo &egrave; dedicata la parte principale del Museo con le stanze abitate dal
                poeta nel periodo 1917-1919. Completano il percorso museale le sale dedicate a Leonardo, ai Montgolfier,
                ai Wright, a Ferrarin, a Lindbergh, a Nobile, a Balbo, a Forlanini, a Gagarin e Armstrong… tanti
                protagonisti per ripercorrere la pi&ugrave; straordinaria impresa umana: il volo!
                Dal 2018, nel centenario del Volo su Vienna, isole multimediali immersive rendono la visita
                un’esperienza emozionale!
            </p>
        </div>
    </div>
    <a id="scroll-top-btn" href="#top">Torna in alto</a>
    <?php include_once('footer.php'); ?>
</div>
</body>
</html>
