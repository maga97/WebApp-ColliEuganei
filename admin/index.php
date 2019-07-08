<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/print.css" media="print"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/script.js"></script>
    <title>Amministrazione - Colli Digitali</title>
</head>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["username"]) or $_SESSION["admin"] != 1) {
    header("Location: ../index.php");
}
?>
<body>
<div>
    <a href="#content" class="skip">Vai al contenuto</a>
</div>
<div id="container">
    <a id="top"></a>
    <div class="header">
        <div class="header-picture">
            <div class="header-title">
                <h1>Colli Euganei</h1>
                <h2>Natura e storia in digitale</h2>
            </div>
        </div>
    </div>
    <?php include_once("menuAdmin.php"); ?>
    <div id="content">
        <ul class="breadcrumb">
            <li>Home</li>
        </ul>
        <div>
            <h3>Gestione gite</h3>
            <p>Permette di inserire all'interno del sistema una nuova attivit&agrave; o gita disponibile agli utenti,
                modificarne i dati oppure rimuoverla.</p>
            <p>Per far ci&ograve; selezionare la rispettiva voce del menu "Gestione gite".</p>
            <ul>
                <li>Aggiungi nuova gita</li>
                <li>Modifica i dati di una gita</li>
                <li>Rimuovi una gita</li>
            </ul>
            <h3>Gestione utente</h3>
            <p>Permette di inserire o rimuovere un admin.</p>
            <p>Per far ci&ograve; selezionare la rispettiva voce del menu "Gestione utente".</p>
            <ul>
                <li>Aggiungi admin</li>
                <li>Rimuovi admin</li>
            </ul>
        </div>
    </div>
    <?php include_once '../footer.php'; ?>
</div>
<div>
    <a id="scroll-top-btn" href="#top">Torna in alto</a>
</div>
</body>
</html>
