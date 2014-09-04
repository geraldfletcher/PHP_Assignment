<?php
/************************************
|Gerald Fletcher - C06414401		|
|Webelevate 3.0						|
|Introduction to Web Programming	|
|PHP Assignment						|
|Due Date: 2013/1/15				|
************************************/
include 'defined.php';

class dbConnection {

	private $newConnection;

	// Create the connection.
	function __construct() {
		$this->newConnection = new mysqli(dbHost, dbUsername, dbPassword, dbName) or die('There was a problem connecting to the database.');
	}

	function validateUsernameAndPassword($username, $password) {

		// query to select the information from the database. // use '?' for security.
		$query = "SELECT * FROM users WHERE username = ? AND password = ? LIMIT 1";

		// check to see if any of the user supplied data matches the database
		if($statment = $this->newConnection->prepare($query)) { 
			$statment->bind_param('ss', $username, $password); 
			$statment->execute();

			// if matching data is found, then the user can log in.
			if($statment->fetch()) {
				$statment->close();
				return true;
			}
		}
	}
}

?>