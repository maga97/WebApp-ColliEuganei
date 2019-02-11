<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+ARIA 1.0//EN"
  "http://www.w3.org/WAI/ARIA/schemata/xhtml-aria-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/print.css" media="all" />
    <link rel="stylesheet" type="text/css" href="../assets/css/mobile.css" media="all" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
    <title>Le 7 chiesette - Colli Euganei</title>
  </head>
  <body>
    <div>
      <a href="#content" class="skip">Vai al contenuto</a>
    </div>
    <div id="container">
      <a id="top"></a>
      <div class="header">
        <div class="header-picture"></div>
        <div class="header-title">
          <h1>Colli Euganei</h1>
          <h2>Natura e storia in digitale</h2>
        </div>
      </div>
            <div id="menuprincipale-bar" role="menubar">
              <ul id="menuprincipale">
                  <li><a href="../index.php" tabindex="0">Home</a></li>
                  <li class="dropdown"><a tabindex="0" class="active" aria-haspopup="true">Luoghi</a>
                      <ul class="dropdown-content button-right" role="menu">
                          <li role="none" class="active" ><a href="chiesette.php" tabindex="0" role="menuitem">Sette Chiesette</a></li>
                          <li role="none"><a href="catajo.php" tabindex="0" role="menuitem">Castello del Catajo</a></li>
                          <li role="none"><a href="praglia.php" tabindex="0" role="menuitem">Abbazia di Praglia</a></li>
                          <li role="none"><a href="carrareseeste.php" tabindex="0" role="menuitem">Castello carrarese di Este</a></li>
                          <li role="none"><a href="lispida.php" tabindex="0" role="menuitem">Castello di Lispida</a></li>
                          <li role="none"><a href="pelagio.php" tabindex="0" role="menuitem">Castello San Pelagio</a></li>
                      </ul>
                  </li>
                  <li><a href="../gite.php" tabindex="0">Gite</a></li>
                  <?php
                  if (isset($_SESSION['username'])):
                  ?>
                     <li class="dropdown button-right"><a aria-haspopup="true"  tabindex="0">Account</a>
                          <ul class="dropdown-content" role="menu">
                            <li><a href="../view-account.php" tabindex="0" role="menuitem">Impostazioni</a></li>
                            <li><a href="../view-my-trip.php" tabindex="0" role="menuitem">Le mie gite</a></li>
                            <li><a href="../logout.php" tabindex="0" role="menuitem">Logout</a></li>
                          </ul>
                      </li>

                  <?php
                  else:
                  ?>
                     <li class="button-right"><a href="../login.php" tabindex="0">Accedi</a></li>
                     <li class="button-right"><a  href="../Registrazione.php" tabindex="0">Registrati</a></li>
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
            <li>Luoghi</li>
            <li><a href="chiesette.php">Le 7 Chiesette</a></li>
          </ul>
          <div class="section">
            <h2>La via delle 7 chiesette</h2>
            <div class="float-right">
              <img class="pic storiapic" src="../assets/img/7chiesette.jpg" alt="Il Castello nel XVIII secolo"/>
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
              <img class="pic storiapic" src="../assets/img/santuario2.jpg" alt="Il Castello nel XVIII secolo"/>
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
       <?php include_once('../footer.php'); ?>
    </div>
  </body>
</html>
