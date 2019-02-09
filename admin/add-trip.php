<?php
require_once "../DataBase/DBConnection.php";
if (session_status() == PHP_SESSION_NONE) {
   session_start();
  }
if(!isset($_SESSION["username"]) or $_SESSION["admin"] != 1) {
    header("Location: ../index.php");
  }
$db = new database();
$db->connect();
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+ARIA 1.0//EN"
 "http://www.w3.org/WAI/ARIA/schemata/xhtml-aria-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css" media="all">
    <link rel="stylesheet" type="text/css" href="../assets/css/form.css" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/script.js"></script>
    <title>Aggiungi gita - Colli Digitali</title>
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
      <div id="menuprincipale-bar">
        <ul id="menuprincipale">
          <li class="dropdown"><a href="index.php" tabindex="1">Amministrazione</a></li>
          <li><a href="pages/gite.php" class="active" tabindex="2">Aggiungi gita</a></li>
          <?php if(isset($_SESSION['username'])): ?>
            <li><a href="pages/view-account.php">Account</a></li>
            <li><a href="" >Impostazioni</a></li>
			<li><a href="view-account.php?logout=true" xml:lang="en">Logout</a></li>
            <?php else: ?>
              <li><a href="pages/login.php" tabindex="3">Accedi</a></li>
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
          <li><a href="add-trip.php">Aggiunta gita</a></li>
		</ul>
    <div class="form">
    <?php
      if($_GET["done"] == true) {
        echo "<div class=\"alertnojs success\">Inserimento avvenuto correttamente</div>" . PHP_EOL;
      }
      if(isset($_GET["error"])) {
        echo "<div class=\"alertnojs errore login\" aria-live=\"assertive\" role=\"alert\" aria-atomic=\"true\"><p>Errore: " . $_GET["error"] . "</p></div>" . PHP_EOL;
      }
    ?>
    <form action="add-trip-script.php" name="form-add-trip" method="POST">
		<div class="log-field-container">
			<legend>Aggiungi nuova gita</legend>
			<label for="nomegita">Titolo</label>
			<input type="text" name="nomegita" id="idnomegita" placeholder="Gita al castello del Catajo" required="required" />
		</div>
		<div class="log-field-container">
			<label for="descrizione">Descrizione</label>
			<textarea rows="5" cols="40" name="descrizione" required="required"></textarea>
		</div>
		<div class="log-field-container">
		  <label for="data">Data</label>
		  <input type="text" name="data" required="required" placeholder="gg/mm/aaaa" />
		</div>
		<div class="log-field-container">
			<label for="ora">Ora</label>
			<input type="text" name="ora" required="required" placeholder="hh:mm" />
		</div>
		<div class="log-field-container">
			<label for="prezzo">Prezzo</label>
			<input type="text" min="0" id="prezzoAddTrip" name="prezzo" required="required" placeholder="10.50" />
		</div>
		  <div class="button-holder">
			  <input type="reset" value="Cancella dati" name="cancelladati" class="btn btn-tripCancel" />
			  <input type="submit" value="Inserisci" name="aggiungiGita" class="btn btn-tripInsert" />
		  </div>
		  </fieldset>
    </form>
    </div>
      </div>
      <?php echo include_once("../footer.php"); ?>
    </div>
  </body>
</html>
