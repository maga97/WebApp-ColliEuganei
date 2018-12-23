<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <script src="script.js"></script>
    <title>Home - Colli Digitali</title>
  </head>
  <body>
    <div class="header">
      <div class="header-picture">
        <div class="header-title">
          <h1>Colli Euganei</h1>
          <h2>Natura e storia in digitale</h2>
        </div>
      </div>
    </div>
    <div class="topnav-bar">
      <ul class="topnav">
        <li class="dropdown"><a href="../index.php">Home</a></li>
        <li class="dropdown"><a>Luoghi</a>
          <ul class="dropdown-content">
            <li><a href="luoghi/chiesette.php">7 Chiesette</a></li>
            <li><a href="luoghi/catajo.php">Castello del Catajo</a></li>
            <li><a href="luoghi/praglia.php">Abbazia di Praglia</a></li>
            <li><a href="luoghi/carrareseeste.php">Castello carrarese di Este</a></li>
            <li><a href="luoghi/lispida.php">Castello di Lispida</a></li>
            <li><a href="luoghi/pelagio.php">Castello San Pelagio</a></li>
          </ul>
        </li>
        <li><a href="gite.php" class="active">Gite</a></li>
        <?php if(isset($_SESSION['username'])): ?>
          <li><a href="view-account.php">Account</a></li>
        <?php else: ?>
          <li><a href="login.php">Accedi</a></li>
          <li><a href="../Registrazione.php">Registrati</a></li>
        <?php endif; ?>
        <li class="icon">
          <a href="javascript:void(0);" onclick="menuMobile()">&#9776;</a>
        </li>
      </ul>
    </div>
    <ul class="breadcrumb">
      <li><a href="gite.php">Gite</a></li>
    </ul>
    <?php include_once('../footer.php')?>
  </body>
</html>
