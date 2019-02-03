<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
if(!isset($_SESSION["username"]) or $_SESSION["admin"] != 1) {
	header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html lang="it">
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
				<li><a href="index.php" class="active" tabindex="1">Home</a></li>
				<li><a href="add-trip.php" tabindex="2">Aggiungi gite</a></li>
				<?php if(isset($_SESSION['username'])): ?>
					<li><a href="logout.php">Logout</a></li>
					<li><a href="view-account.php">Account</a></li>
				<?php else: ?>
					<li><a href="login.php" tabindex="3">Accedi</a></li>
					<li><a href="Registrazione.php" tabindex="4">Registrati</a></li>
				<?php endif; ?>
				<li class="icon">
					<a href="#" id="mobile">&#9776;</a>
				</li>
				</ul>
			</div>
			<div id="content">
				<ul class="breadcrumb">
					<li><a href="index.php">Amministrazione</a></li>
				</ul>
				
				</div>
			</div>
			<a id="scroll-top-btn" href="#top">Torna in alto</a>
			<?php include_once('footer.php'); ?>
		</div>
	</body>
</html>
