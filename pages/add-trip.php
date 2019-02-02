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
          <li><a href="index.php">Home</a></li>
          <li><a href="geografia.php">Geografia</a></li>
          <li><a href="clima.php">Clima</a></li>
          <li><a href="storia.php">Storia</a></li>
          <li><a href="">Impostazioni</a></li>
          <li><a href="view-account.php?logout=true" xml:lang="en">Logout</a></li>
        </ul>
      </div>
      <div id="content">
        <form action="add-trip-script.php" id="add-trip">
          <fieldset>
          <div class="formrow">
            <legend>Aggiunta nuova gita</legend>
            <label for="nomegita">Titolo gita</label>
            <input type="text" name="nomegita" id="idnomegita" placeholder="Gita al castello del Catajo" required="required" />
          </div>
          <div class="formrow">
            <label for="descrizione">Descrizione</label>
            <textarea name="descrizione" required="required"></textarea>
          </div>
          <div class="formrow">
          <label for="data">Data</label>
          <?php $today = getdate();
          $today = $today["year"] . "-" . $today["mon"] . "-" . $today["mday"];
          ?>
          <input type="date" name="data" required="required" min="<?php echo $today; ?>" />
          </div>
          <div class="formrow">
            <label for="ora">Ora</label>
            <input type="time" name="ora" required />
          </div>
          </fieldset>
        </form>
      </div>
      <?php echo include_once("../footer.php"); ?>
    </div>
  </body>
</html>
