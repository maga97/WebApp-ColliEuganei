
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


	<?php

	include_once('menu.php') ?>


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
						<li><img class="picture" src="assets/img/geog.jpg" alt="" /></li>
						<li class="fa fa-chevron-right"><a class="gallery-title" href="clima.html">Geografia</a></li>
						<li>Scopri la geografia del territorio e come si &egrave; formato.</li>
					</ul>
				</div>
				<div class="galleryframe">
					<ul>
						<li><img class="picture" src="assets/img/clima.jpg" alt="" /></li>
						<li class="fa fa-chevron-right"><a class="gallery-title" href="clima.html">Clima</a></li>
						<li>Scopri come il territorio si presenta nel corso dell'anno.</li>
					</ul>
				</div>
				<div class="galleryframe">
					<ul>
						<li><img class="picture" src="assets/img/storia.jpg" alt="Immagine Rocca di Monselice" /></li>
						<li class="fa fa-chevron-right"><a class="gallery-title" href="storia.html">Storia</a></li>
						<li>Scopri la storia, la cultura e l'arte del territorio</li>
					</ul>
				</div>
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
