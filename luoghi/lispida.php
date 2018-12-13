<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
?>
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
	<script src="../script.js"></script>
	<title>Il Castello di Lispida</title>
</head>
<body>
  <div class="header">
    <div class="header-picture">
      <div class="header-title">
        <h1>Colli Euganei</h1>
        <h2>Natura e storia in digitale</h2>
      </div>
    </div>
  </div>
  <div class="topnav-bar">
    <ul class="topnav">
      <li class="dropdown"><a href="../index.php">Home</a>
        <ul class="dropdown-content">
          <li><a href="../geografia.php">Geografia</a></li>
          <li><a href="../clima.php">Clima</a></li>
          <li><a href="../storia.php">Storia</a></li>
        </ul>
      </li>
      <li class="dropdown"><a href="../luoghi.php" class="active">Luoghi</a>
        <ul class="dropdown-content">
          <li><a href="chiesette.php">7 Chiesette</a></li>
          <li><a href="catajo.php">Castello del Catajo</a></li>
          <li><a href="praglia.php">Abbazia di Praglia</a></li>
          <li><a href="carrareseeste.php">Castello carrarese di Este</a></li>
          <li><a href="lispida.php" class="active">Castello di Lispida</a></li>
          <li><a href="pelagio.php">Castello San Pelagio</a></li>
        </ul>
      </li>
      <li><a href="../gite.php">Gite</a></li>
      <?php if(isset($_SESSION['username'])): ?>
        <li><a href="view-account.php">Account</a></li>
        <?php else: ?>
          <li><a href="../login.php">Accedi</a></li>
          <li><a href="../Registrazione.php">Registrati</a></li>
        <?php endif; ?>
        <li class="icon">
          <a href="javascript:void(0);" onclick="menuMobile()">&#9776;</a>
        </li>
      </ul>
    </div>
    <ul class="breadcrumb">
      <li><a href="../luoghi.php">Luoghi</a></li>
      <li>Il Castello di Lispida</li>
    </ul>
    <div class="content">
      <div class="section">
        <h1>Il Castello di Lispida</h1>
        <div class="floatright">
          <img class="pic storiapic" src="../assets/img/lispida1.jpg" alt=""/>
        </div>
        <p class="text">
          Il castello di Lispida, situato nei pressi di Monselice, nel cuore del Parco Regionale dei Colli Euganei,
          offre sistemazioni rustiche in un verdeggiante ambiente naturale, una piscina coperta, 2 vasche idromassaggio
          all'aperto e biciclette a uso gratuito. Gli appartamenti e le camere di questo edificio in pietra presentano arredi in stile rustico e soffitti
          con travi in legno a vista. Alcuni appartamenti vantano arredi classici, un caminetto o un tavolo da biliardo.
          Il Castello di Lispida ospita una propria cantina, dove potrete dedicarvi a una degustazione di vini (su richiesta e senza costi aggiuntivi) per poi eventualmente acquistarli.
        Questa grande struttura dispone di attrezzature per barbecue, ampi giardini e sale per eventi e conferenze. </p>
        <h1 class="title">I dintorni</h1>
        <p class="text">
          A 4 km troverete la stazione ferroviaria e il castello di Monselice, mentre con un tragitto di 2 km raggiungerete la più vicina fermata dell'autobus pubblico.
          Il personale può organizzare escursioni e gite in bicicletta nel parco.
        </p>
        <h1 class="title">Descrizione</h1>
        <div class="floatright">
          <img class="pic storiapic" src="../assets/img/lispida2.jpg" alt=""/>
        </div>
        <p class="text">
          Custodita nel cuore del Parco Naturale dei Colli Euganei, la Tenuta di Lispida ricomprende un lago termale con sorgenti calde e si estende per 90 ettari fra boschi, vigneti e uliveti.
          ll castello, complesso monumentale eretto nel medioevo e riedificato nel XIX secolo, ospita l’azienda vinicola, gli antichi edifici con appartamenti dalla sobria eleganza e i granai dagli
          ampi spazi per feste ed eventi.
          Papa Eugenio III nel 1150  conferma all’ordine monastico di Sant’Agostino il possesso del colle e di una chiesa dedicata a S.Maria di Ispida. Il monastero di Lispida, sorto in posizione isolata e tranquilla, fu sempre un luogo ricco di fascino, oltre che un ambiente ideale per la coltivazione della vite e dell’olivo. Nel 1485 il Doge della Repubblica di Venezia Giovanni Mocenigo confisca ai monaci la proprietà : “affinché le vigne, gli olivi e i campi non siano abbandonati, siano seminati e coltivati nella giusta stagione, e la pietra del colle ci venga mandata con regolarità”. La storia monastica di Lispida si interrompe nel 1792. La proprietà viene in seguito acquistata dai conti Corinaldi, i quali sui resti del vetusto monastero edificano le costruzioni che oggi vediamo, le dotano di cantine imponenti e iniziano la produzione di vini rinomati in tutta Europa. Durante la prima guerra mondiale il Castello di Lispida ospita il quartier generale del re Vittorio Emanuele III°.  Alla fine degli anni ‘50 , con l’impianto di nuovi vigneti e con programmi di vinificazione legati ai tradizionali processi produttivi preindustriali, l’azienda riprende la sua vocazione vitivinicola.
        </p>
      </div>
    </div>
    <?php include_once('../footer.php'); ?> 
  </body>
  </html>
