<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="assets/css/print.css" media="print"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <title>Gite - Colli Digitali</title>
</head>
<?php
require_once "DataBase/DBConnection.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

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
    <?php include_once('menu.php'); ?>
    <div id="content">
        <ul class="breadcrumb">
            <li><a href="Gite.php">Gite</a></li>
        </ul>
        <div class="card" id="searchform">
            <form action="Gite.php" method="post">
                <fieldset>
                    <legend>Modulo di ricerca delle gite</legend>
                    <div class="form-field">
                        <label for="idricerca" class="log-label">Ricerca gite</label>
                        <input type="text" id="idricerca" name="ricerca" aria-required="true" accesskey="s"
                               maxlength="20"/>
                    </div>
                    <div class="form-field">
                        <input type="submit" value="Cerca" class="btn btn-primary center-block"/>
                    </div>
                </fieldset>
            </form>
        </div>
        <?php
        $db = new database();
        $db->connect();
        $list = array();
        $segnalato = false;
        $empyset = false;
        if (isset($_POST['ricerca'])) {
            if (strlen($_POST['ricerca']) > 0) {
                $list = $db->Ricerca($_POST['ricerca']);
                $empyset = sizeof($list) > 0 ? false : true;
            } else {
                echo "<div class=\"alert show errore button-holder\" role=\"alert\">Nessuna parola chiave inserita. Inserisci una parola chiave o torna alla 
                    <a href=\"Gite.php\">lista delle gite</a></div>" . PHP_EOL;
            }
        } else {
            $list = $db->GetListaAttivita($_SESSION['username']);
        };
        if ($empyset) {
            echo "<div class=\"alert show warning button-holder\" role=\"alert\">La ricerca non ha trovato nessuna gita con questa frase o parola chiave. 
Inserisci un'altra parola chiave o torna <a href=\"Gite.php\">lista delle gite</a></div>" . PHP_EOL;
        }
        if(sizeof($list) == 0) {
            echo "<h3 class='text-center'>Nessuna gita al momento disponibile, torna a trovarci!</h3>" . PHP_EOL;
        }
        if (sizeof($list) > 0) {
            foreach ($list as $node):
                $data = explode("-", $node['Data']);
                $nome = $node['Nome'];
                $node['Ore'] = substr($node['Ore'], 0, 5);
                $node['Data'] = $data[2] . "/" . $data[1] . "/" . $data[0];
                ?>
                <div class="card form-field trip">
                    <?php $immagine = base64_encode($node["Immagine"]); ?>
                    <div class="row">
                        <div class="col-6">
                            <h2><?php echo $nome ?></h2>
                            <p><?php echo $node['Descrizione']; ?></p>
                            <dl class="inline-list">
                                <dt>Prezzo:</dt>
                                <dd><?php echo $node['Prezzo']; ?> &euro;</dd>
                                <dt>Data:</dt>
                                <dd><?php echo $node['Data']; ?></dd>
                                <dt>Ora:</dt>
                                <dd><?php echo $node['Ore'] ?></dd>
                            </dl>
                        </div>
                        <div class="col-6">
                            <img src="data:image/jpeg;base64,<?php echo $immagine ?>"
                                 alt="Immagine <?php echo $nome ?>"
                                 class="responsive-image same-size center-block"/>
                        </div>
                    </div>
                    <div class="form-field">
                        <?php if (isset($_SESSION['username'])): ?>
                            <?php
                            echo "<a href=\"Prenotazione.php?id=" . $node["ID_Attivita"] . "\" class=\"btn btn-primary center-block\">Prenota la gita</a></span>";
                            ?>
                        <?php else: ?>
                            <a href="Accedi.php"
                               aria-label="Accedi per prenotare la gita">Accedi</a> per poter prenotare
                        <?php endif ?>
                    </div>
                </div>
            <?php endforeach;
        } ?>
    </div>
    <?php include_once("footer.php"); ?>
</div>
</body>
</html>
