<?php (require_once "DataBase/DBConnection.php") or die("Impossibile connettersi al database");


if (!isset($_SESSION['current_page']))// per fare in modo di tornare alla pagina da cui ho schiacciato Login
    $_SESSION['current_page'] = $_SERVER['HTTP_REFERER'];

$dbConnection = new database();
$dbConnection->Connect();
if (isset($_POST['email']) && isset($_POST['password'])) {
    if ($dbConnection->user_login($_POST['email'], $_POST['password'])) {
        $_SESSION['login'] = true;
        $_SESSION['username'] = $_POST['email'];
        $_SESSION['admin'] = $dbConnection->isAmministratore($_POST['email']);
        if ($_SESSION['admin'] == true)
            header("Location: admin/index.php");
        else
            header("Location:" . $_SESSION['current_page']);
        unset_session($_SESSION['current_page']);
        exit;
    } else {
        $wronglogin = true;
    }
} else {
    $emptyFields = true;
}
$dbConnection->Close();
?>
