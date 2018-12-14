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
	<script src="script.js"></script>
	<title>Luoghi - Colli Digitali</title>
</head>
<body>
<div id="container">
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
			<li><a href="../index.php">Home</a></li>
			<li><a href="geografia.php">Geografia</a></li>
			<li><a href="clima.php">Clima</a></li>
			<li><a href="storia.php">Storia</a></li>
			<li class="dropdown"><a href="luoghi.php" class="active">Luoghi</a>
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
		<div class="content">
		<ul class="breadcrumb">
			<li><a href="luoghi.html">Luoghi</a></li>
			<li>Luoghi d'interesse</li>
		</ul>
			<div class="section">
				<h1>Luoghi d'interesse</h1>
				<p class="text">Scopri le meraviglie dei colli euganei</p>

				<div class="gallery">
					<div class="galleryframe">
						<ul>
							<li><a class="gallery-title" href="luoghi/chiesette.php"><img class="pic-luoghi" src="../assets/img/chiesette.jpg" alt="" /></li>
								<li class="fa fa-chevron-right"><a class="gallery-title" href="luoghi/chiesette.php">Le 7 chiesette</a></li>
								<li>Un viale fiancheggiato da 7 chiesette.</li>
							</ul>
						</div>
						<div class="galleryframe">
							<ul>
								<li> <a class="gallery-title" href="luoghi/catajo.php"> <img class="pic-luoghi" src="../assets/img/catajo.jpg" alt="" /></li>
									<li class="fa fa-chevron-right"><a class="gallery-title" href="luoghi/catajo.php">Il castello del Catajo</a></li>
									<li>Un palazzo a met&agrave tra la reggia e il forte.</li>
								</ul>
							</div>
						</div>
						<div class="gallery">
							<div class="galleryframe">
								<ul>
									<li><a class="gallery-title" href="luoghi/praglia.php"><img class="pic-luoghi" src="../assets/img/praglia.jpg" alt="" /></li>
										<li class="fa fa-chevron-right"><a class="gallery-title" href="luoghi/praglia.php">L'abbazia di Praglia</a></li>
										<li>Un magnifico monastero benedettino.</li>
									</ul>
								</div>
								<div class="galleryframe">
									<ul>
										<li><a class="gallery-title" href="luoghi/carrareseeste.php"><img class="pic-luoghi" src="../assets/img/este.jpg" alt="" /></li>
											<li class="fa fa-chevron-right"><a class="gallery-title" href="luoghi/carrareseeste.php">Il castello carrarese di Este</a></li>
											<li>Un antico Castello difensivo.</li>
										</ul>
									</div>
								</div>
								<div class="gallery">
									<div class="galleryframe">
										<ul>
											<li><a class="gallery-title" href="luoghi/lispida.php"><img class="pic-luoghi" src="../assets/img/lispida.jpg" alt="" /></li>
												<li class="fa fa-chevron-right"><a class="gallery-title" href="luoghi/lispida.php">Il castello di Lispida</a></li>
												<li>Uno storico castello oggi meta turistica di lusso.</li>
											</ul>
										</div>
										<div class="galleryframe">
											<ul>
												<li><a class="gallery-title" href="luoghi/pelagio.php"><img class="pic-luoghi" src="../assets/img/pelagio.jpg" alt="" /></li>
													<li class="fa fa-chevron-right"><a class="gallery-title" href="luoghi/pelagio.php">Il castello di San Pelagio</a></li>
													<li>Un antico castello, oggi parco e museo.</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
			<!--
			<div class="place">
					<a href="chiesette.php">
						<img class="pic" src="assets/img/chiesette.jpg" alt="" />
						<h1 class="title">Le 7 chiesette</h1>
					</a>
					<p class="text">Un viale fiancheggiato da 7 chiesette che porta ad una meravigliosa villa.</p>
			</div>

			<div class="place">
					<a href="catajo.php">
						<img class="pic" src="assets/img/catajo.jpg" alt="" />
						<h1 class="title">Il castello del Catajo</h1>
					</a>
					<p class="text">Un palazzo a met&agrave tra la reggia e il forte.</p>
			</div>

			<div class="place">
					<a href="praglia.php">
						<img class="pic" src="assets/img/praglia.jpg" alt="" />
						<h1 class="title">L'abbazia di Praglia</h1>
					</a>
					<p class="text">Un magnifico monastero benedettino.</p>
			</div>

			<div class="place">
					<a href="carrareseeste.php">
						<img class="pic" src="assets/img/este.jpg" alt="" />
						<h1 class="title">Il castello carrarese di Este</h1>
					</a>
					<p class="text">Un antico Castello difensivo.</p>
			</div>

			<div class="place">
					<a href="lispida.php">
						<img class="pic" src="assets/img/lispida.jpg" alt="" />
						<h1 class="title">Il castello di Lispida</h1>
					</a>
					<p class="text">Uno storico castello oggi meta turistica di lusso</p>
			</div>

			<div class="place">
					<a href="pelagio.php">
						<img class="pic" src="assets/img/pelagio.jpg" alt="" />
						<h1 class="title">Il castello di San Pelagio</h1>
					</a>
					<p class="text">Un antico castello, oggi parco e museo</p>
			</div>

		</div>
	</div> -->
	<?php include_once('../footer.php')?> 
	</div>
</body>
</html>
