<?php
/*
* File name: connection.class.php
* Author: Linus Sjöbro
* E-mail: lisj1502@student.miun.se
*
* Description:
* The class create and handle all type of connection to the database.
* All credentials for the DB is hold in a seperate file, config.php.
*
* All class method's serve a specific task.
*/
class Connection {
	function __construct() {

		include ($_SERVER['DOCUMENT_ROOT'] . '/config.php');

		$serverName = DB_SERVERNAME;
		$databaseName = DB_NAME;
		$username = DB_USER;
		$password = DB_PASSWORD;

		// Skapar en anslutning till databasen
		try {
			$this->dbConnection = new PDO("mysql:host=$serverName;dbname=$databaseName;charset=utf8", $username, $password);
			$this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $phpError) {
			echo "Connection failed:" . $phpError->getMessage();
			die();
		}
	}

	// Return the data of the given query
	function select($query) {
		$pull = $this->dbConnection->prepare($query);
		$resultArray = array();

		$pull->execute();

		if($pull->execute()) {
			// Loopa igenom alla rader i tabellen och tryck in dessa i arrayen.
			while($result = $pull->fetch(PDO::FETCH_OBJ)) {
				array_push($resultArray, $result);
			}
		}

		return $resultArray;
	}

	// Update the record in the DB from the given query.
	// Either update, new or delete record is handled with this method.
	function update($query) {
		$push = $this->dbConnection->prepare($query);
		$push->execute();
	}

	function rowCount($query) {
		$searchRecord = $this->dbConnection->prepare($query);
		$searchRecord->execute();

		return $searchRecord->fetchColumn();
	}

	private $dbConnection;
}
?>
