<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
 ?>
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
	<script src="script.js"></script>
	<title>Il Castello Carrarese di Este</title>
</head>

<body>

  <?php include_once('menu.php')?>



  <div class="content">
    <div class="section">
      <h1>Il Castello Carrarese di Este</h1>
      <div class="floatright">
          <img class="pic storiapic" src="assets/img/este1.jpg" alt=""/>
      </div>
      <p class="text">
        Il castello di Este è stato costruito circa nel 1340, per iniziativa del signore di Padova Ubertino da Carrara.
        La costruzione è a pianta quadrata, circondata da una poderosa muraglia intervallata da dodici torresini, questo fortilizio ha di fatto soppiantato il primo castello, quello dei marchesi d’Este,
        sorto sull’area collinare fin dal XI secolo e gravemente danneggiato dalle guerre del ‘200 e del ‘300.
        Il mastio è sito sul colle, in posizione di controllo sull’intero abitato; culmina con una torre quadrata e presenta a nord-est un castelletto o Rocca del Soccorso, che originariamente costituiva l’accesso alla fortezza.
        Lo spazio compreso all’interno della cinta muraria è oggi adibito a giardino pubblico.
        </p>
        <p class="text">
          Il Castello fu utilizzato a fini difensivi fino alla spontanea dedizione della città alla Repubblica di Venezia, quando l’intera struttura fu venduta ai Mocenigo: furono questi ultimi a far costruire verso la fine del Cinquecento il Palazzetto,
          dove attualmente ha sede il Museo Nazionale Atestino.
        </p>
        <div class="floatright">
            <img class="pic storiapic" src="assets/img/este2.jpg" alt=""/>
        </div>
        <p class="text">
          Persa la sua valenza militare, nel 1570 circa, il castello venne acquistato dalla ricca e potente famiglia veneziana dei Mocenigo,
          che iniziarono i lavori di costruzione del proprio palazzo sul lato meridionale della fortificazione carrarese.
          Originariamente il grandioso palazzo era composto da due edifici speculari, che richiesero la demolizione di un paio delle torri medievali. L'ala orientale fu però distrutta da un incendio nel Settecento.
      </p>
    </div>
  </div>

  <div class="footer">
        <span id="copyright"> &copy; 2018 Colli Digitali </span>
        <span id="social">
          <a href="#"><i class="fa fa-facebook-official"></i></a>
          <a href="#"><i class="fa fa-youtube"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
        </span>
      <span id="fast-link"><p>About | Ciao</p></span>
  </div>
</body>
</html>
