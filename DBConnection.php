<?php
class database {
	private $host = "localhost";
	private $user = "root";
	private $passwd = "";
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
			echo $e->getMessage();
			die();
		}
	}

	public function Close() {
		$this->pdo = null;
	}

	public function user_already_exists($email){
		$query = $this->pdo->prepare('SELECT * FROM Utenti WHERE Email = ?');
		$query->execute(array($email));
		return $query->fetch() ? true:false;
	}

	public function insert_user($nome, $cognome, $email, $password, $indirizzo, $citta, $civico, $cap) {
				$insert = $this->pdo->prepare('INSERT INTO Utenti (Nome, Cognome, Email, Password, Indirizzo, Civico, Citta, CAP) VALUES ("'.
				$nome.'", "'.
				$cognome.'", "'.
				$email.'", "'.
				password_hash($password, PASSWORD_DEFAULT).'", "'.
				$indirizzo.'", "'.
				$civico.'", "'.
				$citta.'", "'.
				$cap.'")');
				if($insert->execute())
					return true;
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

	public function GetListaAttivita() {
		$query = $this->pdo->prepare('SELECT * FROM Attivita');
		$query->execute();
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function AggiornaPWDUtente($email, $new_pwd) {
		$pwd_hashed = password_hash($new_pwd, PASSWORD_DEFAULT);
		$query = $this->pdo->prepare('UPDATE Utenti SET Password = :pwd WHERE Email = :email');
		$query->bindParam(':pwd', $pwd_hashed, PDO::PARAM_STR);
		$query->bindParam(':email', $email, PDO::PARAM_STR, 256);
		return $query->execute();
	}

}


?>
