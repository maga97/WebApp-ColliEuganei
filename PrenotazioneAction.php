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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+ARIA 1.0//EN"
  "http://www.w3.org/WAI/ARIA/schemata/xhtml-aria-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" media="all">
    <link rel="stylesheet" type="text/css" href="assets/css/print.css" media="all">
    <link rel="stylesheet" type="text/css" href="assets/css/mobile.css" media="all">
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
            <div id="menuprincipale-bar" role="menuBar">
              <ul id="menuprincipale">
                  <li><a href="index.php" tabindex="0">Home</a></li>
                  <li class="dropdown"><a aria-haspopup="true" aria-expanded="false" tabindex="0">Luoghi</a>
                      <ul class="dropdown-content button-right" role="menu">
                          <li role="none"><a href="luoghi/chiesette.php" tabindex="-1" role="menuitem">Sette Chiesette</a></li>
                          <li role="none"><a href="luoghi/catajo.php" tabindex="-1" role="menuitem">Castello del Catajo</a></li>
                          <li role="none"><a href="luoghi/praglia.php" tabindex="-1" role="menuitem">Abbazia di Praglia</a></li>
                          <li role="none"><a href="luoghi/carrareseeste.php" tabindex="-1" role="menuitem">Castello carrarese di Este</a></li>
                          <li role="none"><a href="luoghi/lispida.php" tabindex="-1" role="menuitem">Castello di Lispida</a></li>
                          <li role="none"><a href="luoghi/pelagio.php" tabindex="-1" role="menuitem">Castello San Pelagio</a></li>
                      </ul>
                  </li>
                  <li><a href="gite.php" tabindex="0" class="active">Gite</a></li>
                  <?php
                  if (isset($_SESSION['username'])):
                  ?>
                     <li class="dropdown button-right"><a aria-haspopup="true" aria-expanded="false" tabindex="0">Account</a>
                          <ul class="dropdown-content" role="menu">
                            <li><a href="logout.php" tabindex="-1" role="menuitem">Logout</a></li>
                            <li><a href="view-account.php" tabindex="-1" role="menuitem">Impostazioni</a></li>
                            <li><a href="view-my-trip.php" tabindex="-1" role="menuitem">Le mie gite</a></li>
                          </ul>
                      </li>

                  <?php
                  else:
                  ?>
                     <li class="button-right"><a href="login.php" tabindex="0">Accedi</a></li>
                     <li class="button-right"><a href="Registrazione.php" tabindex="0">Registrati</a></li>
                  <?php
                  endif;
                  ?>
                 <li class="icon">
                      <a href="#" id="mobile">&#9776;</a>
                  </li>
              </ul>
      </div>
        <div id="content">
          <ul class="breadcrumb">
            <li><a href="Gite.php">Gite</a></li>
            <li>Riepilogo prenotazione</li>
          </ul>
          <div id="riepilogo">
            <h2> Riepilogo prenotazione </h2>
            <div class="field-container">
               <label for="Nome" lang="it" class="log-label-riep">ATTIVIT&Agrave; </label>
               <p> Gita al castello del catajo </p>
            </div>
            <div class="field-container">
               <label for="Descrizione" lang="it" class="log-label-riep">DESCRIZIONE </label>
               <p> Alla scoperta del Castello del Catajo, il Castello imponente vicino casa di Francesco. </p>
            </div>
            <div class="field-container">
               <label for="Data" lang="it" class="log-label-riep">DATA </label>
               <p> 19/05/2019 </p>
            </div>
            <div class="field-container">
               <label for="Ora" lang="it" class="log-label-riep">ORA </label>
               <p> 14:30:00 </p>
            </div>
            <div class="field-container">
               <label for="Prezzo" lang="it" class="log-label-riep">PREZZO TOTALE </label>
               <p> 140&euro; </p>
            </div>
              <div class="button-holder">
                <form action="" method="POST">
                  <input type="submit" value="Conferma" name="confermaPrenotazione" class="btn btn-riepConferma" />
                </form>
                <form action="" method="POST">
                  <input type="submit" value="Cancella" name="cancellaPrenotazione" class="btn btn-riepCancella" />
                </form>
              </div>
              <div class="success"> La prenotazione &egrave; stata confermata. </div>
            </div>
      </div>
      <?php include_once('footer.php')?>
    </div>
  </body>
</html>
