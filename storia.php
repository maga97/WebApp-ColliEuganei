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
	<title>Storia - Colli Digitali</title>
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
	      <li class="dropdown"><a href="index.php" class="active">Home</a>
	        <ul class="dropdown-content">
	          <li><a href="geografia.php">Geografia</a></li>
	          <li><a href="clima.php">Clima</a></li>
	          <li><a href="storia.php" class="active">Storia</a></li>
	        </ul>
	      </li>
	        <li class="dropdown"><a href="luoghi.php">Luoghi</a>
	        <ul class="dropdown-content">
	          <li><a href="luoghi/chiesette.php">7 Chiesette</a></li>
	          <li><a href="luoghi/catajo.php">Castello del Catajo</a></li>
	          <li><a href="luoghi/praglia.php">Abbazia di Praglia</a></li>
	          <li><a href="luoghi/carrareseeste.php">Castello carrarese di Este</a></li>
	          <li><a href="luoghi/lispida.php">Castello di Lispida</a></li>
	          <li><a href="luoghi/pelagio.php">Castello San Pelagio</a></li>
	        </ul>
	      </li>
	        <li><a href="gite.php">Gite</a></li>
	  <?php if(isset($_SESSION['username'])): ?>
	    <li><a href="view-account.php">Account</a></li>
	  <?php else: ?>
	    <li><a href="login.php">Accedi</a></li>
	    <li><a href="Registrazione.php">Registrati</a></li>
	  <?php endif; ?>
	  <li class="icon">
	    <a href="javascript:void(0);" onclick="menuMobile()">&#9776;</a>
	  </li>
	  </ul>
	</div>

	<ul class="breadcrumb">
      <li><a href="index.php">Home</a></li>
      <li>Storia</li>
    </ul>

	<div class="content">
		<div class="section">
			<h1>Una commistione di storia, arte e cultura.</h1>
			<p class="text">I colli prendono il nome dal primo popolo che in epoca preistorica visse in Veneto: gli euganei.
			La storia millenaria dei colli ci dona oggi siti archeologici, antichi palazzi, musei e monumenti dal valore inestimabile.
			</p>
			<h1 class="title">Storia di popoli</h1>
			<div class="floatright">
				<img class="pic storiapic" src="assets/img/atestino.jpg" alt=""/>
			</div>
				<p class="text">
					Dopo gli antichi Euganei, primi abitanti della zona, fu la volta dei Veneti le cui testimonianze &egrave possibile ammirare
					sotto forma di reperti nel Museo Nazionale Atestino di Este, che ospita reperti tra cui vestiti, utensili ed armi risalenti dalla preistoria fino all'et&agrave Romana.
					E proprio all'et&agrave Romana risalgono i primi paesi, preceduti da un villagio palustre sul lago della Costa.
					Con il medioevo la posizione strategica dei colli venne sfruttata per la costruzione di castelli, mura, fortificazioni che ancora oggi sono apprezzabili nella
					loro imponenza. Le ville venete invece risalgono al quindicesimo secolo, quando la Serenissima, repubblica di venezia, assunse il controllo del territorio.
					Giungendo ai giorni nostri, l'incremento dello sfruttamento del territorio ha indotto la regione a creare nel 1989 il parco regionale dei colli euganei
					con lo scopo di preservare il territorio e valorizzarne le qualit&agrave, dai reperti, ai castelli, alle maestose ville, alla natura incontaminata.
				</p>
			<h1 class="title">Il patrimonio culturale</h1>
				<p class="text">
					I centri storici pi&ugrave importanti come Este culla della civilt&agrave
					Paleoveneta, Arqu&agrave Petrarca incantevole borgo medievale e Monselice
					scenografica citt&agrave murata offrono mete imperdibili per gli appasionati di storia ed arte.
					Oltre ai centri storici meravigliose sono le ville venete  come Villa Vescovi a Torreglia
					e Villa Barbarigo a Galzignano, e i suggestivi monasteri di Praglia e del
					Rua, dove il tempo sembra si sia fermato per offrire ai visitatori momenti di profonda
					pace spirituale.
				</p>
				<h1 class="title">L'arte</h1>
				<div class="floatright">
					<img class="pic storiapic" src="assets/img/filmfestival.jpg" alt="" />
				</div>
				<p class="text">
					Per gli amanti dell'arte, mete imperdibili sono i musei come il gi&agrave citato Museo Nazionale Atestino di Este, ma soprattutto le ville
					come il castello del Catajo, che con i loro affreschi e l'architettura costituiscono un patrimonio dal valore inestimabile.
					I colli per&ograve non offrono soltanto occasioni di apprezzare l'arte dell'antichit&agrave ma anche di ammirare nuove opere d'arte:
					dall'Euganea Film Festival, al festival della land art, i colli euganei continuano ad ospitare ed ispirare artisti anche oggi.
				</p>
		</div>
	</div>

		<?php include_once('footer.php')?> 

</body>
</html>
