<?php
class database {
	private $host = "localhost";
	private $user = "root";
	private $passwd = "diolupo";
	private $db = "ColliDigitali";
	private $pdo;
  private $bConnected = false;

	public function Connect() {
      global $settings;
			$dsn = 'mysql:dbname='.$this->db.';host='.$this->host;
			try {
				$this->pdo = new PDO($dsn, $this->user, $this->passwd,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->bConnected = true;
			}
			catch (PDOException $e) {
				echo $this->ExceptionLog($e->getMessage());
				die();
			}
	}

  public function Close() {
	 		$this->pdo = null;
	}


	public function insert_user($nome, $cognome, $email, $password, $indirizzo, $civico, $cap) {
	$query = $this->pdo->prepare('SELECT * FROM Utenti WHERE Email= "'.$email.'"');
	$query->execute();
	if(!$query->fetch()) {
			$insert = $this->pdo->prepare('INSERT INTO Utenti (Nome, Cognome, Email, Password, Indirizzo, Civico, CAP) VALUES ("'.
			$nome.'", "'.
			$cognome.'", "'.
			$email.'", "'.
			password_hash($password, PASSWORD_DEFAULT).'", "'.
			$indirizzo.'", "'.
			$civico.'", "'.
			$cap.'")');
		if($insert->execute())
			return true;
		return false;
	}
	return false;
	}

	public function user_login($email, $password) {
		$query = $this->pdo->prepare('SELECT Password FROM Utenti WHERE '.
		'Email = "'.$email.'"');
		$query->execute();
		$pass=$query->fetch();
		return password_verify($password, $pass[0]);

	}

}


?>
