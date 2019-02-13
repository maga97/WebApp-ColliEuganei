<?php
require_once "DataBase/DBConnection.php";
if (session_status() == PHP_SESSION_NONE) { session_start(); }
$db = new database();
$db->connect();
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+ARIA 1.0//EN"
 "http://www.w3.org/WAI/ARIA/schemata/xhtml-aria-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/print.css" media="all" />
    <link rel="stylesheet" type="text/css" href="assets/css/mobile.css" media="all" />
    <link rel="stylesheet" type="text/css" href="assets/css/form.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <title>Gite - Colli Digitali</title>
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
                  <li><a href="gite.php" class="active" tabindex="0">Gite</a></li>
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
    			<li><a href="gite.php">Gite</a></li>
    		</ul>
        <?php

          $list = $db->GetListaAttivita();
          $size = sizeof($list);
          if($size == 0) {
            echo "<h3>Momentaneamente non sono disponibili gite</h3>" . PHP_EOL;
          }
          foreach ($list as $node):
          $data = explode("-", $node['Data']);
          $node['Ore'] = substr($node['Ore'], 0, 5);
          $node['Data'] = $data[2] . "/" . $data[1] . "/" . $data[0];
        ?>
        <div class="attivita">
        <?php $immagine = base64_encode($node["Immagine"]); ?>
          <img src="data:image/jpeg;base64,<?php echo $immagine?>" alt="Immagine <?php echo $nome ?>" class="responsive-image gite-image" />
          <h2><?php echo $node['Nome']; ?></h2>
          <p><?php echo $node['Descrizione']; ?></p>
          <dl>
            <dt>Prezzo:</dt>
            <dd><?php echo $node['Prezzo']; ?> &euro;</dd>
            <dt>Data:</dt>
            <dd><?php echo $node['Data']; ?></dd>
            <dt>Ora:</dt>
            <dd><?php echo $node['Ore']?></dd>
          </dl>
          <?php if(isset($_SESSION['username'])):?>
          <?php
            echo"<span class=\"btnTrip\"><a href=\"Prenotazione.php?id=".$node["ID_Attivita"]."\">Prenota la gita</a></span>";
          ?>
        <?php else: ?>
			    <span class="btnTrip"><a href="login.php" aria-label="Accedi per prenotare la gita">Accedi</a> per poter prenotare</span>
        <?php endif ?>
          </div>
      <?php endforeach; ?>
      </div>
      <?php include_once("footer.php"); ?>
    </div>
  </body>
</html>
