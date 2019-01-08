<?php
require_once "../DBConnection.php";
if (session_status() == PHP_SESSION_NONE) { session_start(); }
$db = new database();
$db->connect();
/*
if(isset($_GET['logout']) && $_GET['logout'] == "true"){
  session_unset();
  session_destroy();
  header("Location: login.php");
  exit();
}

Nome: <?php echo $db->GetName($_SESSION['username'])?> <br>
Cognome: <?php echo $db->GetSurname($_SESSION['username'])?></br>
Indirizzo: <?php echo $db->GetAddress($_SESSION['username'])?></br>
Civico: <?php echo $db->GetCivico($_SESSION['username'])?></br>

}*/
 ?>
<html>
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
          <li><a href="index.php">Home</a></li>
          <li><a href="geografia.php">Geografia</a></li>
          <li><a href="clima.php">Clima</a></li>
          <li><a href="storia.php">Storia</a></li>
          <li><a href="">Impostazioni</a></li>
          <li><a href="view-account.php?logout=true" xml:lang="en">Logout</a></li>
        </ul>
      </div>
      <div id="content">
        <h3>Benvenuto Recchia Recchione</h3>
        <p>Pronto per prenotare la tua prossima gita?</p>
        <div class="gallery">
        <?php
          $list = $db->GetListaAttivita();
          foreach ($list as $node): ?>
        <div class="galleryframe">
          <dl>
            <dt><?php echo $node['Nome']; ?></dt>
            <dd><?php echo $node['Descrizione']; ?></dd>
            <dd><?php echo $node['Prezzo']; ?> &euro;</dd>
            <dd><?php echo $node['Data']; ?></dd>
            <dd><?php echo $node['Ora']; ?></dd>
          </dl>
          <button
        </div>
        <?php endforeach; ?>
        </div>
      </div>
      <?php echo include_once("../footer.php"); ?>
    </div>
  </body>
</html>
