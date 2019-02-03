<?php (require_once "DataBase/DBConnection.php") or die("Impossibile connettersi al database");
if(session_status() == PHP_SESSION_NONE) {
 session_start();
}
$dbConnection = new database();
$dbConnection->Connect();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" media="all">
    <link rel="stylesheet" type="text/css" href="assets/css/form.css" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <title>Prenotazione - Colli Digitali</title>
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
  					<ul class="dropdown-content">
  						<li><a href="luoghi/chiesette.php">Sette Chiesette</a></li>
  						<li><a href="luoghi/catajo.php">Castello del Catajo</a></li>
  						<li><a href="luoghi/praglia.php">Abbazia di Praglia</a></li>
  						<li><a href="luoghi/carrareseeste.php">Castello carrarese di Este</a></li>
  						<li><a href="luoghi/lispida.php">Castello di Lispida</a></li>
  						<li><a href="luoghi/pelagio.php">Castello San Pelagio</a></li>
  					</ul>
  				</li>
          <li><a href="gite.php" class="active" tabindex="2">Gite</a></li>
          <?php if(isset($_SESSION['username'])): ?>
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
            <li><a href="Gite.php">Gite</a></li>
            <li>Prenotazione</li>
          </ul>

          <?php
          if(!isset($_GET['id']) || $_GET['id']=="" ):
            echo "Si è verificato un errore. Torna alla pagina delle gite per effettuare la prenotazione";
          else:
          $attivita=$dbConnection->GetAttivita($_GET["id"]);?>

         <form action="PrenotazioneAction.php" method="POST">
           <?php echo "<input type='hidden' name='ID' value='".$_GET["id"]."'>"; ?>

           <div class="field-container">
             <label for="Descrizione" lang="it" class="log-label">Descrizione dell'attività</label>
             <?php echo"<input type='text' id='descrizione' name='descrizione' value='".$attivita["Descrizione"]."' accesskey='d' readonly>";?>
           </div>
           <div class="field-container">
             <label for="Prezzo" lang="it" class="log-label">Prezzo(per persona)</label>
             <?php echo"<input type='text' id='prezzo' name='prezzo' value='".$attivita["Prezzo"]." Euro' accesskey='p' readonly>";?>
           </div>
           <div class="field-container">
             <label for="Data" lang="it" class="log-label">Data</label>
             <?php echo"<input type='text' id='data' name='data' value='".$attivita["Data"]."' accesskey='d' readonly>";?>
           </div>
           <div class="field-container">
             <label for="Ora" lang="it" class="log-label">Orario</label>
             <?php echo"<input type='text' id='ora' name='ora' value='".$attivita["Ore"]."' accesskey='p' readonly>";?>
           </div>
           <div class="field-container">
             <label for="Posti" lang="it" class="log-label">Scegli il numero di posti</label>
             <input type='number' id='posti' name='posti'  accesskey='d' >
           </div>
          <div class="button-holder">  <input type="submit" value="Andiamo!" name="registrazione" class="btn btn-primary"></div>
         </form>
      </div>
    <?php endif;?>
      <?php include_once('footer.php')?>
    </div>
  </body>
</html>
