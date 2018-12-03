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
	<title>Clima - Colli Digitali</title>
</head>
<body>

	<?php  include_once('menu.php') ?>



	<div class="content">
		<div class="section">
			<h1>Il Clima</h1>
			<p class="text">I colli euganei, trovandosi nel cuore della pianura padana, godono di un clima di tipo continentale,
			con inverni freddi ed estati calde ed umide. La presenza delle colline per&ograve da luogo a fenomeni interessanti e particolari
			e a panorami di rara bellezza.
			<div class="floatright">
				<img class="pic climapic" id="invernopic"src="assets/img/inverno.jpg" alt="" width="512" height="332">
			</div>
			<h1 class="title">Autunno e Inverno</h1>
			<p class="text">
				L'autunno e l'inverno dei colli euganei sono caratterizzati dalla nebbia. Poich&egrave la nebbia raramente supera i 200 metri sul livello del mare
				spesso le cime dei colli ne sono al di sopra dando luogo a paesaggi mozzafiato. L'esposizione al sole inoltre fa si che le cime delle colline
				presentino temperature pi&ugrave alte rispetto alla pianura immersa nella nebbia. D'inverno la neve contrasta con gli interni caldi di trattorie e case
				che risultano ancora pi&ugrave accoglienti e confortevoli.
			</p>

			<div class="floatright">
				<img class="pic climapic" src="assets/img/primavera.jpg" alt="" width="512" height="332">
			</div>
			<h1 class="title">Primavera ed Estate</h1>
			<p class="text">
				In primavera i colli si riempiono di colori: i boschi di robinia, le piante di ginestra e le rute padovane contribuiscono con i colori bianco, arancione e giallo
				insieme ai prati e alle chiome degli alberi verdi a formare un quadro allegro e vitale.
				D'estate le colline offrono ombra e vento contro le temperature e l'umidit&agrave tipiche della pianura padana.
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
