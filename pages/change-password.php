<?php
  if(session_status() == PHP_SESSION_NONE)
    session_start();
  $databaseConnection = new database();
  $databaseConnection->Connect();
  if(isset($_POST['password']) && isset($_POST['password-confirm'])
   && isset($_SESSION['username']) && password_verify($_POST['password'], $_POST['password-verify'])):
   if($databaseConnection->AggiornaPWDUtente($_POST['username'], $_POST['password'])):
     header("Location: settings.php?esito=true&messaggio=Password+cambiata+correttamente.");
   else:
     header("Location: settings.php?esito=false&messaggio=Impossibile+cambiare+la+password.");
  else:
    $_SESSION = array();
    session_destroy();
    header("Location: ../index.php");
  endif;
  $databaseConnection->Close();
 ?>
