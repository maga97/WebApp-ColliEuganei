
<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
 ?>

<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="assets/css/style.css" media="all">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script>
			$(document).ready(function() {
				$('.galleryframe').click(function() {
					window.location.href = $(this).find("a").attr("href");
				});
			});
		</script>
		<script src="script.js"></script>
		<title>Home - Colli Digitali</title>
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
		          <li><a href="storia.php">Storia</a></li>
		        </ul>
		      </li>
		        <li class="dropdown"><a href="luoghi.php">Luoghi</a>
		        <ul class="dropdown-content">
		          <li><a href="chiesette.php">7 Chiesette</a></li>
		          <li><a href="catajo.php">Castello del Catajo</a></li>
		          <li><a href="praglia.php">Abbazia di Praglia</a></li>
		          <li><a href="carrareseeste.php">Castello carrarese di Este</a></li>
		          <li><a href="lispida.php">Castello di Lispida</a></li>
		          <li><a href="pelagio.php">Castello San Pelagio</a></li>
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
		   <li>Benvenuto nei Colli Euganei</li>
		 </ul>
		<div class="content">
			<h1>Benvenuto nei Colli Euganei</h1>
			<div class="section">
				<p class="text">
				Percorri uno dei sentieri del parco regionale, ammira antiche ville come il castello del Catajo o luoghi di pellegrinaggio come il viale
				delle 7 chiesette. Visita i colli euganei, scopri come natura, storia e cultura possono fondersi e dar vita ad un magnifico territorio.
				</p>
			</div>
			<div class="gallery">
				<div class="galleryframe">
					<ul>
						<li><img class="pic" src="assets/img/geog.jpg" alt="" /></li>
						<li class="fa fa-chevron-right"><a class="gallery-title" href="geografia.php">Geografia</a></li>
						<li>Scopri la geografia del territorio e come si &egrave; formato.</li>
					</ul>
				</div>
				<div class="galleryframe">
					<ul>
						<li><img class="pic" src="assets/img/clima.jpg" alt="" /></li>
						<li class="fa fa-chevron-right"><a class="gallery-title" href="clima.php">Clima</a></li>
						<li>Scopri come il territorio si presenta nel corso dell'anno.</li>
					</ul>
				</div>
				<div class="galleryframe">
					<ul>
						<li><img class="pic" src="assets/img/storia.jpg" alt="Immagine Rocca di Monselice" /></li>
						<li class="fa fa-chevron-right"><a class="gallery-title" href="storia.php">Storia</a></li>
						<li>Scopri la storia, la cultura e l'arte del territorio</li>
					</ul>
				</div>
			</div>
		</div>
		<?php include_once('footer.php')?> 
	</body>
</html>
