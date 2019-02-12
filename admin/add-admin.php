<?php require_once("../DataBase/DBConnection.php");
if (session_status() == PHP_SESSION_NONE) {
   session_start();
  }
if(!isset($_SESSION["username"]) or $_SESSION["admin"] != 1) {
    header("Location: ../index.php");
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+ARIA 1.0//EN"
  "http://www.w3.org/WAI/ARIA/schemata/xhtml-aria-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/mobile.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../assets/css/form.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/print.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css"/>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
    <title>Aggiunta amministratore - Colli Digitali</title>
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
      <div id="menuprincipale-bar">
      <ul id="menuprincipale">
        <li><a href="index.php" tabindex="0">Home</a></li>
        <li class="dropdown"><a aria-haspopup="true" tabindex="0">Gestione gite</a>
                    <ul class="dropdown-content" role="menu">
                      <li><a href="add-trip.php" tabindex="0" role="menuitem">Aggiungi nuova gita</a></li>
                      <li><a href="select-trip-modify.php" tabindex="0" role="menuitem">Modifica dati gita</a></li>
                      <li><a href="remove-trip.php" tabindex="0" role="menuitem">Rimuovi gita</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a class="active" aria-haspopup="true" tabindex="0">Gestione utente</a>
                    <ul class="dropdown-content" role="menu">
                      <li class="active"><a href="add-admin.php" tabindex="0" role="menuitem">Aggiungi admin</a></li>
                      <li><a href="remove-admin.php" tabindex="0" role="menuitem">Rimuovi admin</a></li>
                    </ul>
                </li>
                <?php if(isset($_SESSION['username'])): ?>
          <li class="dropdown button-right"><a aria-haspopup="true" tabindex="0">Account</a>
                      <ul class="dropdown-content" role="menu">
                        <li><a href="view-account-admin.php" tabindex="0" role="menuitem">Impostazioni</a></li>
                        <li><a href="../logout.php" tabindex="0" role="menuitem">Logout</a></li>
                      </ul>
                    </li>
        <?php else: ?>
          <li><a href="../login.php" tabindex="0">Accedi</a></li>
          <li><a href="../Registrazione.php" tabindex="0">Registrati</a></li>
        <?php endif; ?>
        <li class="icon">
          <a href="#" id="mobile">&#9776;</a>
        </li>
        </ul>
      </div>
      <div id="content">
    <ul class="breadcrumb">
      <li>Gestione utente </li>
      <li>Aggiungi admin</li>
    </ul>
    <?php 
        if(isset($_GET["done"]) && $_GET["done"] == true) {
          echo '<div class="alert success" aria-live="assertive" role="alert" aria-atomic="true">Aggiunta avvenuta correttamente</div>' . PHP_EOL;
        }
        if(isset($_GET["error"])):
        ?>
        <div class="alert errore" aria-live="assertive" role="alert" aria-atomic="true"><?php echo htmlspecialchars($_GET["error"]) ?></div> 
        <?php
        endif; 
        $db = new database();
        $db->connect();
        $users = $db->GetUsers("utente");
        if(sizeof($users) == 0):
        echo '<div class="alert warning">Nessun utente che pu&ograve; diventare amministratore.<div>' . PHP_EOL;
        endif;
        $i = 0;
        $open = false;
        foreach($users as $user):
        if($i%3 == 0):
         echo '<div class="flex-container">' . PHP_EOL ;
         $open = true;
        endif;
         $i = $i + 1;
    ?>
    <div class="admin-div">
        <ul>
            <li><?php echo $user["Nome"] ?></li>
            <li><?php echo $user["Cognome"] ?></li>
            <li><?php echo $user["Email"] ?></li>
            <li><?php echo $user["Tipo"] ?></li>
                <?php
                 $id = $user["ID_Utente"];
                ?>
        </ul>
        <a aria-label="Aggiungi <?php echo $user["Nome"] . " " . $user["Cognome"]; ?> come amministratore" href="edit-user-role.php?action=promote&amp;id=<?php echo $id; ?>">Aggiungi amministratore</a>
        </div>
    <?php 
    if($i%3 == 0):
      echo "</div>" . PHP_EOL;
      $open = false;
    endif;
    endforeach; 
    if($open == true):
      echo "</div>" . PHP_EOL;
    endif;
    ?>
    </div>
    <?php echo include_once("../footer.php"); ?>
  </div>
  </body>
</html>
