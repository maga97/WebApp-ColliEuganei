<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="assets/css/print.css" media="print"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/confirm.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <title>Pannello Utente - Colli Digitali</title>
</head>

<?php
require_once "DataBase/DBConnection.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["username"])) {
    header("Location: index.php");
}
$db = new database();
$db->connect();
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
            <li>Le mie gite</li>
        </ul>
        <p class="text">Qui sono raccolte tutte le prenotazioni da Lei effettuate. In questa pagina si pu&ograve; effettuare la
            disdetta delle prenotazioni effettuate</p>
        <?php
        $list = $db->getListaPrenotazioni($_SESSION["username"]);
        $size = sizeof($list);
        if ($size == 0) {
            echo "<h3>Non hai nessuna gita in programma!</h3>" . PHP_EOL;
        }
        foreach ($list as $node):
            $data = explode("-", $node['data']);
            $node['Ore'] = substr($node['ore'], 0, 5);
            $node['Data'] = $data[2] . "/" . $data[1] . "/" . $data[0];
            ?>

            <div class="card form-field card-spaced">
                <h2><?php echo $node['nome']; ?></h2>
                <dl class="inline-list">
                    <dt>ID Prenotazione</dt>
                    <dd><?php echo $node['id']; ?></dd>
                    <dt>Prezzo Totale</dt>
                    <dd><?php echo $node['prezzo'] * $node['posti']; ?> &euro;</dd>
                    <dt>Data</dt>
                    <dd><?php echo $node['data']; ?></dd>
                    <dt>Ore</dt>
                    <dd><?php echo $node['Ore'] ?></dd>
                </dl>
                <div class="form-field">
                    <?php echo "<a class=\"btn btn-red center-block\" href=\"delete-prenotazione.php?id=" . $node['id'] . "\">Disdici</a>" ?>
                </div>
            </div>
        <?php
        endforeach;
        ?>

    </div>
    <?php echo include_once("footer.php"); ?>
</div>
<script type="text/javascript" src="js/confirm.js"></script>
</body>
</html>
<?php
$db->close();
?>
