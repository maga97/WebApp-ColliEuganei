<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+ARIA 1.0//EN"
  "http://www.w3.org/WAI/ARIA/schemata/xhtml-aria-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/print.css" media="all" />
    <link rel="stylesheet" type="text/css" href="../assets/css/mobile.css" media="all" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
		<title>Il Castello Carrarese di Este - Colli Euganei</title>
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
			<div id="menuprincipale-bar" role="menuBar">
              <ul id="menuprincipale">
                  <li><a href="../index.php" tabindex="0">Home</a></li>
                  <li class="dropdown"><a tabindex="0" class="active" aria-haspopup="true" aria-expanded="false">Luoghi</a>
                      <ul class="dropdown-content button-right" role="menu">
                          <li role="none"><a href="chiesette.php" tabindex="-1" role="menuitem">Sette Chiesette</a></li>
                          <li role="none"><a href="catajo.php" tabindex="-1" role="menuitem">Castello del Catajo</a></li>
                          <li role="none"><a href="praglia.php" tabindex="-1" role="menuitem">Abbazia di Praglia</a></li>
                          <li role="none" class="active" ><a href="carrareseeste.php" tabindex="-1" role="menuitem">Castello carrarese di Este</a></li>
                          <li role="none"><a href="lispida.php" tabindex="-1" role="menuitem">Castello di Lispida</a></li>
                          <li role="none"><a href="pelagio.php" tabindex="-1" role="menuitem">Castello San Pelagio</a></li>
                      </ul>
                  </li>
                  <li><a href="../gite.php" tabindex="0">Gite</a></li>
                  <?php
                  if (isset($_SESSION['username'])):
                  ?>
                     <li class="dropdown button-right"><a aria-haspopup="true" aria-expanded="false" tabindex="0">Account</a>
                          <ul class="dropdown-content" role="menu">
                            <li><a href="../logout.php" tabindex="-1" role="menuitem">Logout</a></li>
                            <li><a href="../view-account.php" tabindex="-1" role="menuitem">Impostazioni</a></li>
                            <li><a href="../view-my-trip.php" tabindex="-1" role="menuitem">Le mie gite</a></li>
                          </ul>
                      </li>

                  <?php
                  else:
                  ?>
                     <li class="button-right"><a href="../login.php" tabindex="0">Accedi</a></li>
                     <li class="button-right"><a  href="../Registrazione.php" tabindex="0">Registrati</a></li>
                  <?php
                  endif;
                  ?>
                 <li class="icon">
                      <a href="#" id="mobile">&#9776;</a>
                  </li>
              </ul>
      </div>
			<div id="content">
				<ul class="breadcrumb">
					<li>Luoghi</li>
					<li><a href="carrareseeste.php">Il Castello Carrarese di Este</a></li>
				</ul>
				<div class="section">
					<h2>Il Castello Carrarese di Este</h2>
					<div class="float-right">
						<img class="pic storiapic" src="../assets/img/este1.jpg" alt="Castello Carrarese di Este"/>
					</div>
					<p class="text">
					Il castello di Este è stato costruito circa nel 1340, per iniziativa del signore di Padova Ubertino da Carrara.
					La costruzione è a pianta quadrata, circondata da una poderosa muraglia intervallata da dodici torresini, questo fortilizio ha di fatto soppiantato il primo castello, quello dei marchesi d’Este,
					sorto sull’area collinare fin dal XI secolo e gravemente danneggiato dalle guerre del ‘200 e del ‘300.
					</p>
					<p class="text">
					Il mastio è sito sul colle, in posizione di controllo sull’intero abitato; culmina con una torre quadrata e presenta a nord-est un castelletto o Rocca del Soccorso, che originariamente costituiva l’accesso alla fortezza.
					Lo spazio compreso all’interno della cinta muraria è oggi adibito a giardino pubblico.
					</p>
					<h2>L'evoluzione del Castello</h2>
					<div class="float-right">
						<img class="pic storiapic" src="../assets/img/este2.jpg" alt="Parco del Castello Carrarese di Este"/>
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
			<?php include_once('../footer.php'); ?>
		</div>
	</body>
</html>
