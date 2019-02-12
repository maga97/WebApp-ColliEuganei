<?php (require_once "DataBase/DBConnection.php") or die("Impossibile connettersi al database");
if(session_status() == PHP_SESSION_NONE) {
 session_start();
}
$dbConnection = new database();
$dbConnection->Connect();
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
    <script src="js/script.js"></script>
    <title>Prenotazione - Colli Digitali</title>
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
              <div id="menuprincipale-bar" role="menubar">
              <ul id="menuprincipale">
                  <li><a href="index.php" tabindex="0">Home</a></li>
                  <li class="dropdown"><a aria-haspopup="true" tabindex="0">Luoghi</a>
                      <ul class="dropdown-content button-right" role="menu">
                          <li role="none"><a href="luoghi/chiesette.php" tabindex="0" role="menuitem">Sette Chiesette</a></li>
                          <li role="none"><a href="luoghi/catajo.php" tabindex="0" role="menuitem">Castello del Catajo</a></li>
                          <li role="none"><a href="luoghi/praglia.php" tabindex="0" role="menuitem">Abbazia di Praglia</a></li>
                          <li role="none"><a href="luoghi/carrareseeste.php" tabindex="0" role="menuitem">Castello carrarese di Este</a></li>
                          <li role="none"><a href="luoghi/lispida.php" tabindex="0" role="menuitem">Castello di Lispida</a></li>
                          <li role="none"><a href="luoghi/pelagio.php" tabindex="0" role="menuitem">Castello San Pelagio</a></li>
                      </ul>
                  </li>
                  <li><a href="gite.php" tabindex="0" class="active">Gite</a></li>
                  <?php
                  if (isset($_SESSION['username'])):
                  ?>
                     <li class="dropdown button-right"><a aria-haspopup="true" tabindex="0">Account</a>
                          <ul class="dropdown-content" role="menu">
                            <li><a href="view-account.php" tabindex="0" role="menuitem">Impostazioni</a></li>
                            <li><a href="view-my-trip.php" tabindex="0" role="menuitem">Le mie gite</a></li>
                            <li><a href="logout.php" tabindex="0" role="menuitem">Logout</a></li>
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
            <li>Prenotazione</li>
          </ul>

          <?php
          if(!isset($_GET['id']) || $_GET['id']=="" ):
            echo "Si è verificato un errore. Torna alla pagina delle gite per effettuare la prenotazione";
          else:
          $attivita=$dbConnection->GetAttivita($_GET["id"]);
          $_SESSION["ID"]=$_GET["id"];
          $_SESSION["prezzo"]=$attivita["Prezzo"];
          $_SESSION["data"]=$attivita["Data"];
          $_SESSION["ora"]=$attivita["Ore"];
          ?>

         <form action="PrenotazioneAction.php" method="POST">
           <?php echo "<input type=\"hidden\" name=\"ID\" value=\"".$_GET["id"]."\">";?>

           <div class="field-container">
             <label for="descrizione" lang="it" class="log-label">Descrizione dell'attività</label>
             <?php echo"<input type=\"text\" id=\"descrizione\" name=\"descrizione\" value=\"".$attivita["Descrizione"]."\" accesskey=\"d\" readonly>";?>
           </div>
           <div class="field-container">
             <label for="prezzo" lang="it" class="log-label">Prezzo(per persona)</label>
             <?php echo"<input type=\"text\" id=\"prezzo\" name=\"prezzo\" value=\"".$attivita["Prezzo"]." Euro\" accesskey=\"p\" readonly>";?>
           </div>
           <div class="field-container">
             <label for="data" lang="it" class="log-label">Data</label>
             <?php echo"<input type=\"text\" id=\"data\" name=\"data\" value=\"".$attivita["Data"]."\" accesskey=\"d\" readonly>";?>
           </div>
           <div class="field-container">
             <label for="ora" lang="it" class="log-label">Orario</label>
             <?php echo"<input type=\"text\" id=\"ora\" name=\"ora\" value='".$attivita["Ore"]."' accesskey=\"p\" readonly>";?>
           </div>
           <div class="field-container">
             <label for="reservePosti" lang="it" class="log-label">Scegli il numero di posti</label>
             <input type="text" id="reservePosti" name="posti"  min="0" accesskey="d" />
           </div>
          <div class="button-holder"> <input type="submit" value="Andiamo!" name="registrazione" class="btn btn-primary" aria-label="Prenotati alla gita"/></div>
         </form>
      </div>
    <?php endif;?>
      <?php include_once('footer.php')?>
    </div>
  </body>
</html>
