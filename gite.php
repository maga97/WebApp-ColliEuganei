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
		<style type="text/css">
		.row {
			display: table-row;
		}
		form {
			display: table;
			border-spacing: 1em;
		}
		input, label {
			display: table-cell;
		}
		label {
			text-align: left;
		}
		</style>
		<script src="script.js"></script>
		<title>Home - Colli Digitali</title>
	</head>
	<body>

		<?php include_once('menu.php') ?>



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
