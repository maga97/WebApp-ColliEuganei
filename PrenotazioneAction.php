<?php (require_once "DataBase/DBConnection.php") or die("Impossibile connettersi al database");
if(session_status() == PHP_SESSION_NONE) {
 session_start();
}
$dbConnection = new database();
$dbConnection->Connect();
$PrenotazioneOk=$dbConnection->addPrenotazione($_POST["ID"],$dbConnection->GetIDUtente($_SESSION["username"]),
                                               $_POST["data"],$_POST["ora"],$_POST["posti"]
                                             );
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" media="all">
    <link rel="stylesheet" type="text/css" href="assets/css/form.css" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../script.js"></script>
    <title>Login - Colli Digitali</title>
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
  				<li><a href="index.php" tabindex="1">Home</a></li>
  				<li class="dropdown"><a>Luoghi</a>
  					<ul class="dropdown-content button-right">
  						<li><a href="luoghi/chiesette.php">Sette Chiesette</a></li>
  						<li><a href="luoghi/catajo.php">Castello del Catajo</a></li>
  						<li><a href="luoghi/praglia.php">Abbazia di Praglia</a></li>
  						<li><a href="luoghi/carrareseeste.php">Castello carrarese di Este</a></li>
  						<li><a href="luoghi/lispida.php">Castello di Lispida</a></li>
  						<li><a href="luoghi/pelagio.php">Castello San Pelagio</a></li>
  					</ul>
  				</li>
  				<li><a class="active" href="gite.php" tabindex="2">Gite</a></li>
  				<?php if(isset($_SESSION['username'])): ?>
  					<li class="dropdown button-right"><a>Account</a>
  						<ul class="dropdown-content">
  						<li><a href="logout.php">Logout</a></li>
  						<li><a href="view-account.php">Impostazioni</a></li>
  						<li>Le mie gite</li>
  						</ul>
  					</li>

  				<?php else: ?>
  					<li class="button-right"><a href="login.php" tabindex="3">Accedi</a></li>
  					<li class="button-right"><a href="Registrazione.php" tabindex="4">Registrati</a></li>
  				<?php endif; ?>
  				<li class="icon">
  					<a href="#" id="mobile">&#9776;</a>
  				</li>
  				</ul>
  			</div>
        <div id="content">
          <ul class="breadcrumb">
            <li><a href="Gite.php">Gite</a></li>
            <li>Prenotazione</li>
          </ul>
          <?php
            if($PrenotazioneOk){
              echo "La prenotazione è andata a buon fine!";
            }
            else{
              echo "c'è stato un errore";
            }
          ?>
      </div>
      <?php include_once('footer.php')?>
    </div>
  </body>
</html>
