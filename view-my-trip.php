<?php
require_once "DataBase/DBConnection.php";
if (session_status() == PHP_SESSION_NONE) { session_start(); }
$db = new database();
$db->connect();
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
  				<li><a href="gite.php" tabindex="2">Gite</a></li>
  				<?php if(isset($_SESSION['username'])): ?>
  					<li class="dropdown button-right"><a class="active">Account</a>
  						<ul class="dropdown-content">
  						<li><a href="logout.php">Logout</a></li>
  						<li><a href="view-account.php">Impostazioni</a></li>
  						<li><a href="view-my-trip.php">Le mie gite</a></li>
  						</ul>
  					</li>
  				<?php
        else:
          ?>
  					<li class="button-right"><a href="login.php" tabindex="3">Accedi</a></li>
  					<li class="button-right"><a href="Registrazione.php" tabindex="4">Registrati</a></li>
  				<?php
        endif;
          ?>
  				<li class="icon">
  					<a href="#" id="mobile">&#9776;</a>
  				</li>
  				</ul>
  		</div>
      <div id="content">
        <?php
          $list = $db->getListaPrenotazioni($_SESSION["username"]);
          $size = sizeof($list);
          if($size == 0) {
            echo "<h3>Non hai nessuna gita in programma!</h3>" . PHP_EOL;
          }
          foreach ($list as $node):
          $data = explode("-", $node['data']);
          $node['Ore'] = substr($node['ore'], 0, 5);
          $node['Data'] = $data[2] . "/" . $data[1] . "/" . $data[0];
        ?>
        <h2><?php echo $node['nome']; ?></h2>
        <div class="attivita">
          <dl>
            <dt>ID Prenotazione</dt>
            <dd><?php echo $node['id']; ?></dd>
            <dt>Prezzo</dt>
            <dd><?php echo $node['nome']; ?> &euro;</dd>
            <dt>Data</dt>
            <dd><?php echo $node['data']; ?></dd>
            <dt>Ore</dt>
            <dd><?php echo $node['Ore']?></dd>
          </dl>
        <button class="btn red"><a href="delete-gita-Action.php">Voglio disdire questa prenotazione</a></button>
        </div>
        <?php
        endforeach;
        ?>

      </div>
      <?php echo include_once("footer.php"); ?>
    </div>
  </body>
</html>
<?php
$db->close();
?>
