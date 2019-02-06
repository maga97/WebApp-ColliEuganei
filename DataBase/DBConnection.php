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
		return $query->fetch() ? true : false;
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
	public function update_user($nome,$cognome,$email,$indirizzo,$citta,$civico,$CAP,$oldemail){
		$update= $this->pdo->prepare('UPDATE Utenti SET Nome=?, Cognome=?, Email=?, Indirizzo=?, Citta=?, Civico=?, CAP=? WHERE Email="'.$oldemail.'"');
		return $update->execute(array($nome,$cognome,$email,$indirizzo,$citta,$civico,$CAP));

	}

	public function user_login($email, $password) {
		$query = $this->pdo->prepare('SELECT Password FROM Utenti WHERE Email = ?');
		$query->execute(array($email));
		$pass=$query->fetch();
		return password_verify($password, $pass[0]);
	}
	public function GetIDUtente($email) {
		$query = $this->pdo->prepare('SELECT ID_Utente FROM Utenti WHERE Email = ?');
		$query->execute(array($email));
		$ID=$query->fetch();
		return $ID[0];
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
	public function GetCity($email){
		$query = $this->pdo->prepare('SELECT Citta FROM Utenti WHERE Email = ?');
		$query->execute(array($email));
		$Citta=$query->fetch();
		return $Citta[0];
	}
	public function GetAttivita($id){
		$query = $this->pdo->prepare('SELECT * FROM Attivita WHERE ID_Attivita = ?');
		$query->execute(array($id));
		return $query->fetch();
	}
	public function GetListaAttivita() {
		$query = $this->pdo->prepare('SELECT * FROM Attivita');
		$query->execute();
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function isAmministratore($email) {
		$query = $this->pdo->prepare('SELECT Tipo FROM Utenti WHERE Email = ?');
		$query->execute(array($email));
		$Tipo=$query->fetch();
		return ($Tipo[0] == "amministratore") ? true : false;
	}

	public function addPrenotazione($id_attivita,$id_Utente,$giorno,$ore,$posti){
		$query = $this->pdo->prepare('INSERT INTO Prenotazioni (ID_Attivita, ID_Utenti, Giorno, Ore, NumPostiPrenotati) VALUES ("'.
		$id_attivita.'", "'.
		$id_Utente.'", "'.
		$giorno.'", "'.
		$ore.'", "'.
		$posti.'")');
		if($query->execute())
			return true;
		return false;
	}
	public function getListaPrenotazioni($email){
		$query = $this->pdo->prepare('SELECT Attivita.Nome As nome,Attivita.Data AS data,
																				 Attivita.Ore AS ore,Prenotazioni.NumPostiPrenotati AS posti,
																				 Prenotazioni.ID_Prenotazione AS id
																	FROM Utenti JOIN Prenotazioni ON Utenti.ID_Utente=Prenotazioni.ID_Utenti
																							JOIN Attivita ON Prenotazioni.ID_Attivita=Attivita.ID_Attivita
			 														WHERE Utenti.Email = ?');
		$query->execute(array($email));
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	public function AggiornaPWDUtente($email, $new_pwd) {
		$pwd_hashed = password_hash($new_pwd, PASSWORD_DEFAULT);
		$query = $this->pdo->prepare('UPDATE Utenti SET Password = :pwd WHERE Email = :email');
		$query->bindParam(':pwd', $pwd_hashed, PDO::PARAM_STR);
		$query->bindParam(':email', $email, PDO::PARAM_STR, 256);
		return $query->execute();
	}

	public function AggiungiGita($nomegita, $descrizione, $data, $ora, $prezzo) {
		$sql = "INSERT INTO `Attivita` (`ID_Attivita`, `Descrizione`, `Nome`, `Prezzo`, `Data`, `Ore`)
		VALUES (NULL, ?, ?, ?, ?, ?)";
		$query = $this->pdo->prepare($sql);
		/*$query->bindParam(':nome', $nomegita, PDO::PARAM_STR);
		$query->bindParam(':desc', $descrizione, PDO::PARAM_STR, 512);
		$query->bindParam(':data', $data, PDO::PARAM_STR);
		$query->bindParam(':ore', $ore, PDO::PARAM_STR);
		$query->bindParam(':prezzo', $prezzo, PDO::PARAM_STR);*/
		return $query->execute(array($descrizione, $nomegita, $prezzo, $data, $ora . ":00"));
	}

	public function ModificaGita($id, $nomegita, $descrizione, $data, $ora, $prezzo) {
		$sql = "UPDATE Attivita SET Nome = ?, Descrizione = ?, Data = ?, Ore = ?, Prezzo = ?
		WHERE ID_Attivita = ?";
		$query = $this->pdo->prepare($sql);
		return $query->execute(array($nomegita, $descrizione, $data, $ora, $prezzo, $id));
	}

	public function RimuoviGita($id) {
		$query = $this->pdo->prepare('DELETE FROM Attivita WHERE ID_Attivita ="'.$id.'"');
		return $query->execute();
	}

	public function GetGita($id) {
		 $query = $this->pdo->prepare("SELECT * FROM Attivita WHERE ID_Attivita = ?");
		 $query->execute(array($id));
		 return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function GetUsers($type) {
		$query = $this->pdo->prepare("SELECT ID_Utente, Nome, Cognome, Email, Tipo FROM Utenti WHERE Tipo = '" . $type . "'");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function UpdateUserRole($id, $type) {
		$query = $this->pdo->prepare("UPDATE Utenti SET Tipo = ? WHERE ID_Utente = ?");
		return $query->execute(array($type, $id));
	}
}
?>
