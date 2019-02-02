<?php
require_once "../DBConnection.php";
if (session_status() == PHP_SESSION_NONE) { session_start(); }
$db = new database();
$db->connect();
 ?>
<html lang="it">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css" media="all">
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
          <li><a href="index.php" tabindex="1">Home</a></li>
          <li class="dropdown" ><a>Luoghi</a></li>
            <ul class="dropdown-content">
              <li><a href="luoghi/chiesette.php">Sette Chiesette</a></li>
              <li><a href="luoghi/catajo.php">Castello del Catajo</a></li>
              <li><a href="luoghi/praglia.php">Abbazia di Praglia</a></li>
              <li><a href="luoghi/carrareseeste.php">Castello carrarese di Este</a></li>
              <li><a href="luoghi/lispida.php">Castello di Lispida</a></li>
              <li><a href="luoghi/pelagio.php">Castello San Pelagio</a></li>
            </ul>
          </li>
          <li><a href="gite.php" tabindex="2">Gite</a></li>
          <?php if(isset($_SESSION['username'])): ?>
            <li><a href="view-account.php" class="active" >Account</a></li>
            <li><a href="">Impostazioni</a></li>
			<li><a href="view-account.php?logout=true" xml:lang="en">Logout</a></li>
          <?php else: ?>
            <li><a href="login.php" tabindex="3">Accedi</a></li>
            <li><a href="../Registrazione.php" tabindex="4">Registrati</a></li>
          <?php endif; ?>
          <li class="icon">
            <a href="javascript:void(0);" onclick="menuMobile()">&#9776;</a>
          </li>
        </ul>
      </div>
      <div id="content">
        <h3>Benvenuto <?php echo $_SESSION['username']; ?></h3>
        <p>Pronto per prenotare la tua prossima gita?</p>
        <?php
          $list = $db->GetListaAttivita();
          $size = sizeof($list);
          if($size == 0) {
            echo "<h3>Nessuna gita da visualizzare</h3>" . PHP_EOL;
          }
          echo "<div class=\"gridcontainer\">" . PHP_EOL;
          foreach ($list as $node):
          $data = explode("-", $node['Data']);
          $node['Ora'] = substr($node['Ora'], 0, 5);
          $node['Data'] = $data[2] . "/" . $data[1] . "/" . $data[0];
        ?>
        <div class="griditem">
          <dl>
            <dd><?php echo $node['Nome']; ?></dd>
            <dt>Descrizione</dt>
            <dd><?php echo $node['Descrizione']; ?></dd>
            <dt>Prezzo</dt>
            <dd><?php echo $node['Prezzo']; ?> &euro;</dd>
            <dt>Data</dt>
            <dd><?php echo $node['Data']; ?></dd>
            <dt>Ore</dt>
            <dd><?php echo $node['Ora']?></dd>
          </dl>
        </div>
        <?php
        endforeach; ?>
      </div>
    </div>
      <?php echo include_once("../footer.php"); ?>
    </div>
  </body>
</html>
