<?php
require_once "../DBConnection.php";
if (session_status() == PHP_SESSION_NONE) { session_start(); }
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
    <script src="../script.js"></script>
    <title>Pannello Utente - Colli Digitali</title>
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
          <li class="dropdown"><a href="index.php" tabindex="1">Home</a></li>
          <li class="dropdown"><a>Luoghi</a>
            <ul class="dropdown-content">
              <li><a href="pages/luoghi/chiesette.php">7 Chiesette</a></li>
              <li><a href="pages/luoghi/catajo.php">Castello del Catajo</a></li>
              <li><a href="pages/luoghi/praglia.php">Abbazia di Praglia</a></li>
              <li><a href="pages/luoghi/carrareseeste.php">Castello carrarese di Este</a></li>
              <li><a href="pages/luoghi/lispida.php">Castello di Lispida</a></li>
              <li><a href="pages/luoghi/pelagio.php">Castello San Pelagio</a></li>
            </ul>
          </li>
          <li><a href="pages/gite.php" tabindex="2">Gite</a></li>
          <?php if(isset($_SESSION['username'])): ?>
            <li><a href="pages/view-account.php">Account</a></li>
            <li><a href="" class="active">Impostazioni</a></li>
			<li><a href="view-account.php?logout=true" xml:lang="en">Logout</a></li>
            <?php else: ?>
              <li><a href="pages/login.php" tabindex="3">Accedi</a></li>
              <li><a href="Registrazione.php" tabindex="4">Registrati</a></li>
            <?php endif; ?>
            <li class="icon">
              <a href="javascript:void(0);" onclick="menuMobile()">&#9776;</a>
            </li>
          </ul>
        </div>
      <div id="content">
        <form action="add-trip-script.php" id="add-trip">
          <fieldset>
          <div class="form">
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
			  <div class="button-holder">  <input type="submit" value="Aggiungi" name="aggiungiGita" class="btn btn-primary"></div>
			</div>
          </fieldset>
        </form>
      </div>
      <?php echo include_once("../footer.php"); ?>
    </div>
  </body>
</html>
