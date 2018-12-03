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
		$query = $this->pdo->prepare('SELECT Password FROM Utenti WHERE Email = ?');
		$query->execute(array($email));
		$pass=$query->fetch();
		return password_verify($password, $pass[0]);
	}
	public function GetName($email) {
		$query = $this->pdo->prepare('SELECT Nome FROM Utenti WHERE Email = ?');
		$query->execute(array($email));
		$Name=$query->fetch();
		return $Name[0];
	}
	public function GetSurname($email){
		$query = $this->pdo->prepare('SELECT Cognome FROM Utenti WHERE Email = ?');
		$query->execute(array($email));
		$Surname=$query->fetch();
		return $Surname[0];
	}
	public function GetAddress($email){
		$query = $this->pdo->prepare('SELECT Indirizzo FROM Utenti WHERE Email = ?');
		$query->execute(array($email));
		$Address=$query->fetch();
		return $Address[0];
	}
	public function GetCAP($email){
		$query = $this->pdo->prepare('SELECT CAP FROM Utenti WHERE Email = ?');
		$query->execute(array($email));
		$CAP=$query->fetch();
		return $CAP[0];
	}
	public function GetCivico($email){
		$query = $this->pdo->prepare('SELECT Civico FROM Utenti WHERE Email = ?');
		$query->execute(array($email));
		$Civico=$query->fetch();
		return $Civico[0];
	}

}


?>
