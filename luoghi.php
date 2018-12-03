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
	<title>Luoghi - Colli Digitali</title>
</head>
<body>

	<?php include_once('menu.php')?>




	<div class="content">
		<div class="section">
			<h1>Luoghi d'interesse</h1>
			<p class="text">Scopri le meraviglie dei colli euganei</p>

			<div class="place">
					<a href="chiesette.html">
						<img class="pic" src="assets/img/chiesette.jpg" alt="" />
						<h1 class="title">Le 7 chiesette</h1>
					</a>
					<p class="text">Un viale fiancheggiato da 7 chiesette che porta ad una meravigliosa villa.</p>
			</div>

			<div class="place">
					<a href="catajo.html">
						<img class="pic" src="assets/img/catajo.jpg" alt="" />
						<h1 class="title">Il castello del Catajo</h1>
					</a>
					<p class="text">Un palazzo a met&agrave tra la reggia e il forte.</p>
			</div>

			<div class="place">
					<a href="praglia.html">
						<img class="pic" src="assets/img/praglia.jpg" alt="" />
						<h1 class="title">L'abbazia di Praglia</h1>
					</a>
					<p class="text">Un magnifico monastero benedettino.</p>
			</div>

			<div class="place">
					<a href="carrareseeste.html">
						<img class="pic" src="assets/img/este.jpg" alt="" />
						<h1 class="title">Il castello carrarese di Este</h1>
					</a>
					<p class="text">Un antico Castello difensivo.</p>
			</div>

			<div class="place">
					<a href="lispida.html">
						<img class="pic" src="assets/img/lispida.jpg" alt="" />
						<h1 class="title">Il castello di Lispida</h1>
					</a>
					<p class="text">Uno storico castello oggi meta turistica di lusso</p>
			</div>

			<div class="place">
					<a href="pelagio.html">
						<img class="pic" src="assets/img/pelagio.jpg" alt="" />
						<h1 class="title">Il castello di San Pelagio</h1>
					</a>
					<p class="text">Un antico castello, oggi parco e museo</p>
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
