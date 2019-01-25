<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="../../script.js"></script>
		<title>Il Castello di San Pelagio</title>
	</head>
	<body>
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
	  <div id="menuprincipale-bar">
	    <ul id="menuprincipale">
	      <li><a href="../../index.php">Home</a></li>
	      <li class="dropdown"><a class="active">Luoghi</a>
	        <ul class="dropdown-content">
	          <li><a href="chiesette.php">7 Chiesette</a></li>
	          <li><a href="catajo.php">Castello del Catajo</a></li>
	          <li><a href="praglia.php">Abbazia di Praglia</a></li>
	          <li><a href="carrareseeste.php">Castello carrarese di Este</a></li>
	          <li><a href="lispida.php">Castello di Lispida</a></li>
	          <li><a href="pelagio.php" class="active">Castello San Pelagio</a></li>
	        </ul>
	      </li>
	      <li><a href="../gite.php">Gite</a></li>
	      <?php if(isset($_SESSION['username'])): ?>
	        <li><a href="view-account.php">Account</a></li>
	        <?php else: ?>
	          <li><a href="../login.php">Accedi</a></li>
	          <li><a href="../../Registrazione.php">Registrati</a></li>
	        <?php endif; ?>
	        <li class="icon">
	          <a href="javascript:void(0);" onclick="menuMobile()">&#9776;</a>
	        </li>
	      </ul>
	    </div>
	    <div id="content">
	      <ul class="breadcrumb">
	        <li>Luoghi</li>
	        <li><a href="pelagio.php">Il Castello di San Pelagio</a></li>
	      </ul>
	      <div class="section">
	        <h2>Il Castello di San Pelagio</h2>
	        <div class="float-right">
	          <img class="pic storiapic" src="../../assets/img/pelagio1.jpg" alt="Entrata del Castello di San Pelagio"/>
	        </div>
	        <p class="text">
	          Il Castello di San Pelagio ha origini medievali (XIV sec.) come testimonia la torre costruita dai Da Carrara, Signori di Padova, nella prima metà del Trecento. L’imponente torre merlata, aveva una funzione di prima difesa nei numerosi attacchi da parte degli Scaligeri, Signori di Verona. Nella metà del Settecento la proprietà passa ai Conti Zaborra che ampliano notevolmente l’edificio, rimodernano l’ala padronale per adattarla a residenza signorile e realizzano le barchesse a uso agricolo. Da allora la famiglia dei Conti Zaborra abita il Castello ricco di memorie private e storiche.
	        </p>
	        <p class="text">
	          Da qui, il 9 agosto 1918, partì il poeta Gabriele d´Annunzio per il "folle" Volo su Vienna dove compì la sua celebre imprese: il lancio di migliaia di volantini inneggianti alla resa sopra la capitale austro-ungarica.
	          Nelle stanze del poeta tutto è rimasto come allora perché voi possiate rivivere quei momenti e ripercorrere la storia del volo umano in un Museo unico in Europa.
	          Dal 2018, nel centenario del Volo su Vienna, isole multimediali immersive rendono la visita un’esperienza "emozionale"!
	        </p>
	        <h2>Il giardino</h2>
	        <p class="text">
	         Il giardino storico del Castello è un luogo incantevole tutto da vivere e visitare, passeggiando tra le rose e i suoi labirinti.
	         Dal 1970 il Parco è stato oggetto di un accurato restauro con il censimento di tutte le specie botaniche tutt’ora presenti; i due giardini della villa, nelle loro differenti tipologie,
	         sono stati arricchiti di nuove piante e soprattutto di migliaia di rose che, specie a maggio, ne fanno un grande spettacolo!
	         Tra le piante più antiche una Lagestroemia Indica del 1700 e numerosi esemplari di  Tilia cordata  e  Carpinus betulus ultra-centenari.
	         Nel 2000 è stato creato un labirinto verde di 1200 mq, per raccontare il mito del volo di Icaro, senza dimenticare la funzione dei labirinti delle ville venete.
	         Nel 2007 è sorto il labirinto del “Forse che Si Forse che No” per sottolineare il concetto dannunziano di doppio.
	       </p>
	       <h2>Il museo</h2>
	       <div class="float-right">
	        <img class="pic storiapic" src="../../assets/img/pelagio2.jpg" alt="Museo del volo nel Castello di San Pelagio"/>
	      </div>
	      <p class="text">
	       Dal 1970 la villa è stata oggetto di accurati restauri e ripensata nelle funzioni attuali principalmente come Museo del Volo. Inaugurato nel 1980, ripercorre l’intera storia del volo umano facendo perno sull’impresa dannunziana; a tale volo è dedicata la parte principale del Museo con le stanze abitate dal poeta nel periodo 1917-1919. Completano il percorso museale le sale dedicate a Leonardo, ai Montgolfier, ai Wright, a Ferrarin, a Lindbergh, a Nobile, a Balbo, a Forlanini, a Gagarin e Armstrong… tanti protagonisti per ripercorrere la più straordinaria impresa umana: il volo!
	       Dal 2018, nel centenario del Volo su Vienna, isole multimediali immersive rendono la visita un’esperienza emozionale!
	     </p>
	   </div>
	 </div>
	 <a id="scroll-top-btn" href="#top">Torna in alto</a>
	 <?php include_once('../../footer.php')?>
	 </div>
	</body>
</html>
