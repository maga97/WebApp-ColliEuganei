<?php require_once __DIR__.DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR."DBConnection.php";

if(session_status() == PHP_SESSION_NONE) {
   session_start();
}
$dbConnection = new database();
$dbConnection->Connect();
//$dbConnection->insert_user('giulio', 'p', 'ciaociao', 'c', 'a', '3', '3');
$wronglogin = false;
$wrongloginmessage = '<div>Dati errati!</div>';

if(isset($_POST['email']) && isset($_POST['password']))
	if($dbConnection->user_login( $_POST['email'], $_POST['password'])) {
		$_SESSION['login'] = true;
		$_SESSION['username'] = $_POST['email'];
    header("Location: view-account.php");
  }
else{
  $wronglogin = true;
}
$dbConnection->Close();
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

		<?php  include_once('menu.php') ?>
    <?php
				if($wronglogin)
					echo($wrongloginmessage);
		?>
    <div class="content">
      <form name="auth" id="autenticazione" method="post" action="login.php">
        <fieldset>
          <legend>Autenticazione</legend>
          <div class="row">
            <label for="email">Indirizzo email</label>
            <input type="text" required="required" id="email" name="email" placeholder="pincopallino@domain.it"/>
          </div>
          <div class="row">
            <label for="password">Password</label>
            <input type="password" required="required" id="password" name="password"/>
          </div>
          <input type="submit" name="submit" value="Entra">
        </fieldset>
      </form>
    </div>

 </body>
 </html>
