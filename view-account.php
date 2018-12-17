<?php
require_once __DIR__.DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR."DBConnection.php";
if (session_status() == PHP_SESSION_NONE) { session_start();
$db= new database();
$db->connect();

if(isset($_GET['logout']) && $_GET['logout'] == "true"){
  session_unset();
  session_destroy();
  header("Location: login.php");
  exit();
}

}
 ?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="assets/css/style.css" media="all">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.galleryframe').click(function() {
        window.location.href = $(this).find("a").attr("href");
      });
    });
  </script>
  <script src="script.js"></script>
  <title>Home - Colli Digitali</title>
</head>
<body>
  <?php
  include_once("header.php");
  include_once('menu.php');
  ?>
  <center>
  <div id="content">
  Nome: <?php echo $db->GetName($_SESSION['username'])?> <br>
  Cognome: <?php echo $db->GetSurname($_SESSION['username'])?></br>
  Indirizzo: <?php echo $db->GetAddress($_SESSION['username'])?></br>
  Civico: <?php echo $db->GetCivico($_SESSION['username'])?></br>
  <a href="view-account.php?logout=true" xml:lang="en">Logout</a>
  </div>
</center>

</body>
</html>
