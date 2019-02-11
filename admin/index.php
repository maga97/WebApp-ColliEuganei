<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
if(!isset($_SESSION["username"]) or $_SESSION["admin"] != 1) {
	header("Location: ../index.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+ARIA 1.0//EN"
  "http://www.w3.org/WAI/ARIA/schemata/xhtml-aria-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css" media="all" />
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="../js/script.js" type="text/javascript"></script>
	<title>Amministrazione - Colli Digitali</title>
</head>
<body>
	<a href="#content" class="skip">Vai al contenuto</a>
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
				<li><a href="index.php" class="active" tabindex="0">Home</a></li>
				<li class="dropdown"><a aria-haspopup="true" tabindex="0">Gestione gite</a>
                  	<ul class="dropdown-content" role="menu">
                      <li><a href="add-trip.php" tabindex="0" role="menuitem">Aggiungi nuova gita</a></li>
                      <li><a href="select-trip-modify.php" tabindex="0" role="menuitem">Modifica dati gita</a></li>
                      <li><a href="remove-trip.php" tabindex="0" role="menuitem">Rimuovi gita</a></li>
                  	</ul>
                </li>
                <li class="dropdown"><a aria-haspopup="true" tabindex="0">Gestione utente</a>
                  	<ul class="dropdown-content" role="menu">
                      <li><a href="add-admin.php" tabindex="0" role="menuitem">Aggiungi admin</a></li>
                      <li><a href="remove-admin.php" tabindex="0" role="menuitem">Rimuovi admin</a></li>
                  	</ul>
                </li>
				<?php if(isset($_SESSION['username'])): ?>
					<li class="dropdown button-right"><a aria-haspopup="true" tabindex="0">Account</a>
	                  	<ul class="dropdown-content" role="menu">
	                      <li><a href="../view-account.php" tabindex="0" role="menuitem">Impostazioni</a></li>
	                      <li><a href="../logout.php" tabindex="0" role="menuitem">Logout</a></li>
	                  	</ul>
                    </li>
				<?php else: ?>
					<li><a href="../login.php" tabindex="0">Accedi</a></li>
					<li><a href="../Registrazione.php" tabindex="0">Registrati</a></li>
				<?php endif; ?>
				<li class="icon">
					<a href="#" id="mobile">&#9776;</a>
				</li>
				</ul>
			</div>
			<div id="content">
				<ul class="breadcrumb">
					<li>Home</li>
				</ul>
				<div>
				 <h3>Gestione gite</h3>
				 <p>Permette di inserire all'interno del sistema una nuova attivit&agrave; o gita disponibile agli utenti, modificarne i dati oppure rimuoverla.</p>
				 <p>Per far ci&ograve; selezionare la rispettiva del menu "Gestione gite".</p>
				 <ul>
				  <li>Aggiungi nuova gita</li>
				  <li>Modifica i dati di una gita</li>
				  <li>Rimuovi una gita</li>
				</ul>
				<h3>Gestione utente</h3>
				 <p>Permette di inserire o rimuovere un admin.</p>
				 <p>Per far ci&ograve; selezionare la rispettiva del menu "Gestione utente".</p>
				 <ul>
				  <li>Aggiungi admin</li>
				  <li>Rimuovi admin</li>
				</ul>
				</div>
			</div>
			</div>
			<a id="scroll-top-btn" href="#top">Torna in alto</a>
			<?php include_once('footer.php'); ?>
		</div>
	</body>
</html>
