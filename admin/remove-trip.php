<?php
require_once "../DataBase/DBConnection.php";
if (session_status() == PHP_SESSION_NONE) { session_start(); }
if(!isset($_SESSION["username"]) or $_SESSION["admin"] != 1) {
	header("Location: ../index.php");
}
$db = new database();
$db->connect();
 ?>
<html lang="it">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css" media="all">
    <link rel="stylesheet" type="text/css" href="../assets/css/form.css" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/script.js"></script>
    <title>Rimuovi gita - Colli Digitali</title>
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
  				<li><a href="index.php" tabindex="1">Amministrazione</a></li>
  				<li><a href="add-trip.php" tabindex="2">Nuova gita</a></li>
          <li><a href="remove-trip.php" class="active" tabindex="3">Rimuovi gita</a></li>
  				<?php if(isset($_SESSION['username'])): ?>
  					<li><a href="view-account.php">Account</a></li>
  				<?php else: ?>
  					<li><a href="login.php" tabindex="4">Accedi</a></li>
  					<li><a href="Registrazione.php" tabindex="5">Registrati</a></li>
  				<?php endif; ?>
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
        <h2><?php echo $node['Nome']; ?></h2>
        <div class="attivita">
          <dl>
            <dt>Descrizione</dt>
            <dd><?php echo $node['Descrizione']; ?></dd>
            <dt>Prezzo</dt>
            <dd><?php echo $node['Prezzo']; ?> &euro;</dd>
            <dt>Data</dt>
            <dd><?php echo $node['Data']; ?></dd>
            <dt>Ore</dt>
            <dd><?php echo $node['Ore']?></dd>
          </dl>
          <?php
          echo "<span class='btnTrip'><a href='remove-trip-script.php?id=".$node["ID_Attivita"]."'>Rimuovi gita</a></span>";
          ?>
        </div>
        <?php
        endforeach; ?>
      </div>
      <?php echo include_once("footer.php"); ?>
    </div>
  </body>
</html>
