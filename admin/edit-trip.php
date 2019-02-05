<?php
require_once "../DataBase/DBConnection.php";
if (session_status() == PHP_SESSION_NONE) {
   session_start();
  }
if(!isset($_SESSION["username"]) or $_SESSION["admin"] != 1 or !isset($_GET['id'])) {
    header("Location: ../index.php");
  }
$id = $_GET['id'];
$db = new database();
$db->connect();
$gita = $db->GetGita($id);

$nomegita = $gita[0]["Nome"];
$descrizione = $gita[0]["Descrizione"];
$prezzo = $gita[0]["Prezzo"];
$ora = $gita[0]["Ore"];
$data = $gita[0]["Data"];
 ?>
<html lang="it">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css" media="all">
    <link rel="stylesheet" type="text/css" href="../assets/css/form.css" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/script.js"></script>
    <title>Modifica gita - Colli Digitali</title>
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
          <li><a href="add-trip.php" tabindex="2">Aggiungi gita</a></li>
          <li><a href="select-trip-modify.php" class="active" tabindex="3">Modifica gita</a></li>
          <?php if(isset($_SESSION['username'])): ?>
            <li><a href="pages/view-account.php">Account</a></li>
            <li><a href="" >Impostazioni</a></li>
			<li><a href="view-account.php?logout=true" tabindex="4" xml:lang="en">Logout</a></li>
            <?php else: ?>
              <li><a href="pages/login.php" tabindex="4">Accedi</a></li>
              <li><a href="Registrazione.php" tabindex="5">Registrati</a></li>
            <?php endif; ?>
            <li class="icon">
              <a href="#" id="mobile">&#9776;</a>
            </li>
          </ul>
        </div>
    <div id="content">
    <ul class="breadcrumb">
					<li><a href="index.php">Amministrazione</a></li>
          <li><a href="select-trip-modify.php">Modifica gita</a></li>
		</ul>
    <div class="form">
    <form action="edit-trip-script.php" name="form-modify-trip" method="POST">
		<div class="log-field-container">
			<legend>Modifica gita "<?php echo $nomegita; ?>"</legend>
      <input type="hidden" name="id" value="<?php echo $id; ?>" />
			<label for="nomegita">Titolo</label>
			<input type="text" name="nomegita" id="idnomegita" value="<?php echo $nomegita; ?>" required="required" />
		</div>
		<div class="log-field-container">
			<label for="descrizione">Descrizione</label>
			<textarea rows="5" cols="40" name="descrizione" required><?php echo $descrizione; ?></textarea>
		</div>
		<div class="log-field-container">
		  <label for="data">Data</label>
		  <?php $today = getdate();
		  $today = $today["year"] . "-" . $today["mon"] . "-" . $today["mday"];
		  ?>
		  <input type="date" name="data" required min="<?php echo $today; ?>"  value="<?php echo $data; ?>" />
		</div>
		<div class="log-field-container">
			<label for="ora">Ora</label>
			<input type="time" name="ora" required value="<?php echo $ora; ?>" />
		</div>
		<div class="log-field-container">
			<label for="prezzo">Prezzo</label>
			<input type="number" min="0" id="prezzoAddTrip" name="prezzo" step=".10" required="required" value="<?php echo $prezzo; ?>" />
		</div>
		  <div class="button-holder">
			  <input type="reset" value="Cancella dati" name="cancelladati" class="btn btn-tripCancel" />
			  <input type="submit" value="Modifica" name="modificaiGita" class="btn btn-tripInsert" />
		  </div>
		  </fieldset>
    </form>
    </div>
      </div>
      <?php echo include_once("../footer.php"); ?>
    </div>
  </body>
</html>
