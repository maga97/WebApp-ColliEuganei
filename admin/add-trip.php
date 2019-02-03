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
<html lang="it">
  <head>
    <meta charset="UTF-8">
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
		  <?php $today = getdate();
		  $today = $today["year"] . "-" . $today["mon"] . "-" . $today["mday"];
		  ?>
		  <input type="date" name="data" required="required" min="<?php echo $today; ?>" />
		</div>
		<div class="log-field-container">
			<label for="ora">Ora</label>
			<input type="time" name="ora" required />
		</div>
		<div class="log-field-container">
			<label for="prezzo">Prezzo</label>
			<input type="number" min="0" name="prezzo" step=".10" required />
		</div>
		  <div class="button-holder">
			  <input type="reset" value="Cancella dati" name="cancelladati" class="btn btn-tripCancel">
			  <input type="submit" value="Inserisci" name="aggiungiGita" class="btn btn-tripInsert">
		  </div>
		  </fieldset>
    </form>
    </div>
      </div>
      <?php echo include_once("../footer.php"); ?>
    </div>
  </body>
</html>
