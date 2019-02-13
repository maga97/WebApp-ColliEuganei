<?php
require_once "../DataBase/DBConnection.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["username"]) or $_SESSION["admin"] != 1) {
    header("Location: ../index.php");
}
$db = new database();
$db->connect();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+ARIA 1.0//EN"
 "http://www.w3.org/WAI/ARIA/schemata/xhtml-aria-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/form.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/print.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/mobile.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css"/>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
    <title>Aggiungi gita - Colli Digitali</title>
  </head>
  <body>
    <div>
      <a href="#content" class="skip">Vai al contenuto</a>
    </div>
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
        <li><a href="index.php" tabindex="0">Home</a></li>
        <li class="dropdown"><a class="active" aria-haspopup="true" tabindex="0">Gestione gite</a>
                    <ul class="dropdown-content" role="menu">
                      <li class="active"><a href="add-trip.php" tabindex="0" role="menuitem">Aggiungi nuova gita</a></li>
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
          <?php if (isset($_SESSION['username'])): ?>
          <li class="dropdown button-right"><a aria-haspopup="true" tabindex="0">Account</a>
                      <ul class="dropdown-content" role="menu">
                        <li><a href="view-account-admin.php" tabindex="0" role="menuitem">Impostazioni</a></li>
                        <li><a href="../logout.php" tabindex="0" role="menuitem">Logout</a></li>
                      </ul>
                    </li>
        <?php else: ?>
          <li><a href="../login.php" tabindex="0">Accedi</a></li>
          <li><a href="../Registrazione.php" tabindex="0">Registrati</a></li>
        <?php endif;?>
        <li class="icon">
          <a href="#" id="mobile">&#9776;</a>
        </li>
        </ul>
      </div>
    <div id="content">
    <ul class="breadcrumb">
      <li>Gestione gite </li>
      <li>Aggiungi nuova gita</li>
    </ul>
    <div class="form">
    <?php
if (isset($_GET["done"]) == true) {
    echo "<div class=\"alert nojs success\">Inserimento avvenuto correttamente</div>" . PHP_EOL;
}
if (isset($_GET["error"])) {
    echo "<div class=\"alert errore\" aria-live=\"assertive\" role=\"alert\" aria-atomic=\"true\"><p>Errore: " . $_GET["error"] . "</p></div>" . PHP_EOL;
}
?>
    <form action="add-trip-script.php" enctype="multipart/form-data" name="form-add-trip" method="POST">
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
			<label for="immagine">Immagine</label>
      <input type="file" name="immagine" id="idimmagine" placeholder="Selezione immagine gita" required="required" />
		</div>
		<div class="log-field-container">
		  <label for="data">Data</label>
		  <input type="text" name="data" required="required" aria-labelledby="datadesc" />
      <span id="datadesc" tabindex="0">gg/mm/aaaa</span>
		</div>
		<div class="log-field-container">
			<label for="ora">Ora</label>
			<input type="text" name="ora" required="required" aria-labelledby="oradesc" />
      <span id="oradesc" tabindex="0">hh:mm</span>
		</div>
		<div class="log-field-container">
			<label for="prezzo">Prezzo</label>
			<input type="text" min="0" id="prezzoAddTrip" name="prezzo" required="required" aria-labelledby="prezzodesc" />
      <span id="prezzodesc" tabindex="0">10.50</span>
		</div>
		  <div class="button-holder">
			  <input type="reset" value="Cancella dati" name="cancelladati" class="btn btn-tripCancel" />
			  <input type="submit" value="Inserisci" name="aggiungiGita" class="btn btn-tripInsert" />
		  </div>
		  </fieldset>
    </form>
    </div>
      </div>
      <?php echo include_once "../footer.php"; ?>
    </div>
  </body>
</html>