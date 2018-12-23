<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
  <link type="text/javascript" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="../../script.js"></script>
  <title>Le 7 chiesette</title>
</head>
<body>
  <div id="container">
    <a id="top"></a>
    <div class="header">
      <div class="header-picture"></div>
      <div class="header-title">
        <h1>Colli Euganei</h1>
        <h2>Natura e storia in digitale</h2>
      </div>
    </div>
    <div class="topnav-bar">
      <ul class="topnav">
        <li><a href="../../index.php">Home</a></li>
        <li class="dropdown"><a class="active">Luoghi</a>
          <ul class="dropdown-content">
            <li><a href="chiesette.php" class="active">7 Chiesette</a></li>
            <li><a href="catajo.php">Castello del Catajo</a></li>
            <li><a href="praglia.php">Abbazia di Praglia</a></li>
            <li><a href="carrareseeste.php">Castello carrarese di Este</a></li>
            <li><a href="lispida.php">Castello di Lispida</a></li>
            <li><a href="pelagio.php">Castello San Pelagio</a></li>
          </ul>
        </li>
        <li><a href="../gite.php">Gite</a></li>
        <?php if(isset($_SESSION['username'])): ?>
          <li><a href="view-account.php">Account</a></li>
          <?php else: ?>
            <li><a href="../login.php">Accedi</a></li>
            <li><a href="../../Registrazione.php">Registrati</a></li>
          <?php endif; ?>
          <li class="icon">
            <a href="javascript:void(0);" onclick="menuMobile()">&#9776;</a>
          </li>
        </ul>
      </div>
      <div id="content">
        <ul class="breadcrumb">
          <li>Luoghi</li>
          <li><a href="chiesette.php">Le 7 Chiesette</a></li>
        </ul>
        <div class="section">
          <h2>La via delle 7 chiesette</h2>
          <div class="float-right">
            <img class="pic storiapic" src="../../assets/img/7chiesette.jpg" alt="Il Castello nel XVIII secolo"/>
          </div>
          <p class="text">
            La via delle sette chiesette è un breve percorso e meta di pellegrinaggio in quel di Monselice.
            Il viale, in leggera salita, è affiancato da 6 cappellette, ognuna dedicata ad una chiesa romana.
          </p>
          <h2>Le chiesette</h2>
          <p class="text">
            Ognuna delle cappellette, ha al suo interno una pala d'altare dipinta da Jacopo Palma il Giovane
            raffigurante la basilica romana a cui è dedicata. La settima chiesa è il Santuario di San Giorgio nel quale si
            trovano le salme di 25 martiri cristiani e altre reliquie trasferitevi a metà del XVII secolo.
          </p>
          <div class="float-right">
            <img class="pic storiapic" src="../../assets/img/santuario2.jpg" alt="Il Castello nel XVIII secolo"/>
          </div>
          <h2>Villa Duodo e il Mastio Federiciano</h2>
          <p class="text">
           Al termine del percorso si trova la villa Duodo, appartenuta a Pietro Duodo, nobile di origini Veneziane, il quale fece costruire
           le 6 cappellette per complementare la cappella privata della villa.
           La strada prosegue verso il Mastio Federiciano, una roccaforte del XIII secolo voluta dall'imperatore Federico II ora adibita a museo con terrazza panoramica.
         </p>
       </div>
     </div>
     <a id="scroll-top-btn" href="#top">Torna in alto</a>
     <?php include_once('../../footer.php'); ?>
   </div>
 </body>
 </html>
