<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>" . PHP_EOL;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="../../script.js"></script>
	<title>Il Castello Carrarese di Este</title>
</head>
<body>
  <div id="container">
  <a id="top"></a>
  <div class="header">
    <div class="header-picture"></div>
    <div class="header-title">
      <h1>Colli Euganei</h1>
      <h2>Natura e storia in digitale</h2>
    </div>
  </div>
  <div class="topnav-bar">
    <ul class="topnav">
      <li><a href="../index.php">Home</a></li>
      <li class="dropdown"><a href="../luoghi.php" class="active">Luoghi</a>
        <ul class="dropdown-content">
          <li><a href="chiesette.php">7 Chiesette</a></li>
          <li><a href="catajo.php">Castello del Catajo</a></li>
          <li><a href="praglia.php">Abbazia di Praglia</a></li>
          <li><a href="carrareseeste.php" class="active">Castello carrarese di Este</a></li>
          <li><a href="lispida.php">Castello di Lispida</a></li>
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
    <div id="content">
      <ul class="breadcrumb">
        <li><a href="../luoghi.php">Luoghi</a></li>
        <li>Il Castello Carrarese di Este</li>
      </ul>
      <div class="section">
        <h2>Il Castello Carrarese di Este</h2>
        <div class="float-right">
          <img class="pic storiapic" src="../../assets/img/este1.jpg" alt=""/>
        </div>
        <p class="text">
          Il castello di Este è stato costruito circa nel 1340, per iniziativa del signore di Padova Ubertino da Carrara.
          La costruzione è a pianta quadrata, circondata da una poderosa muraglia intervallata da dodici torresini, questo fortilizio ha di fatto soppiantato il primo castello, quello dei marchesi d’Este,
          sorto sull’area collinare fin dal XI secolo e gravemente danneggiato dalle guerre del ‘200 e del ‘300.
          Il mastio è sito sul colle, in posizione di controllo sull’intero abitato; culmina con una torre quadrata e presenta a nord-est un castelletto o Rocca del Soccorso, che originariamente costituiva l’accesso alla fortezza.
          Lo spazio compreso all’interno della cinta muraria è oggi adibito a giardino pubblico.
        </p>
        <h2>L'evoluzione del Castello</h2>
        <div class="float-right">
          <img class="pic storiapic" src="../../assets/img/este2.jpg" alt=""/>
        </div>
        <p class="text">
          Il Castello fu utilizzato a fini difensivi fino alla spontanea dedizione della città alla Repubblica di Venezia, quando l’intera struttura fu venduta ai Mocenigo: furono questi ultimi a far costruire verso la fine del Cinquecento il Palazzetto,
          dove attualmente ha sede il Museo Nazionale Atestino.
        </p>
        <p class="text">
          Persa la sua valenza militare, nel 1570 circa, il castello venne acquistato dalla ricca e potente famiglia veneziana dei Mocenigo,
          che iniziarono i lavori di costruzione del proprio palazzo sul lato meridionale della fortificazione carrarese.
          Originariamente il grandioso palazzo era composto da due edifici speculari, che richiesero la demolizione di un paio delle torri medievali. L'ala orientale fu però distrutta da un incendio nel Settecento.
        </p>
      </div>
    </div>
    <a id="scroll-top-btn" href="#top">Torna in alto</a>
    <?php include_once('../../footer.php'); ?> 
  </div>
  </body>
  </html>
