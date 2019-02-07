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
      <meta charset="UTF-8" />
    <title>Aggiunta amministratore - Colli Digitali</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css" media="all">
    <link rel="stylesheet" type="text/css" href="../assets/css/form.css" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/script.js"></script>
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
          <li class="dropdown"><a href="index.php" tabindex="1">Amministrazione</a></li>
          <li><a href="pages/gite.php" class="active" tabindex="2">Aggiungi gita</a></li>
          <?php if(isset($_SESSION['username'])): ?>
            <li><a href="pages/view-account.php">Account</a></li>
            <li><a href="" >Impostazioni</a></li>
			<li><a href="view-account.php?logout=true" xml:lang="en">Logout</a></li>
            <?php else: ?>
              <li><a href="pages/login.php" tabindex="3">Accedi</a></li>
              <li><a href="Registrazione.php" tabindex="4">Registrati</a></li>
            <?php endif; ?>
            <li class="icon">
              <a href="#" id="mobile">&#9776;</a>
            </li>
          </ul>
        </div>
      <div id="content">
      <table class="zebra" id="admin-table">
      <caption>Elenco utenti</caption>
          <thead>
              <tr>
                  <th>Nome</th>
                  <th>Cognome</th>
                  <th>Email</th>
                  <th>Tipo</th>
                  <th>Cambio ruolo</th>
              </tr>
          </thead>
          <tbody>
    <?php
        $db = new database();
        $db->connect();
        $users = $db->GetUsers("utente");
        if(sizeof($users) == 0):
        echo '<tr><td colspan="5">Nessun utente che pu&ograve; diventare amministratore.</td></tr>' . PHP_EOL;
        endif;
        foreach($users as $user):
    ?>
            <tr>
                <td><?php echo $user["Nome"] ?></td>
                <td><?php echo $user["Cognome"] ?></td>
                <td><?php echo $user["Email"] ?></td>
                <td><?php echo $user["Tipo"] ?></td>
                <?php
                 $id = $user["ID_Utente"];
                ?>
                <td><a aria-label="Aggiungi <?php echo $user["Nome"] . " " . $user["Cognome"]; ?> come amministratore" href="edit-user-role.php?action=promote&id=<?php echo $id; ?>">Aggiungi amministratore</a></td>
            </tr>
    <?php endforeach; ?>
    <tfoot>
        <tr>
            <td>Nome</td>
            <td>Cognome</td>
            <td>Email</td>
            <td>Tipo</td>
            <td>Cambio ruolo</td>
        </tr>
    </tfoot>
    </table>
    </div>
    <?php echo include_once("../footer.php"); ?>
    </div>
  </body>
</html>
