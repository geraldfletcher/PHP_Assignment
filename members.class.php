<?php
/************************************
|Gerald Fletcher - C06414401		|
|Webelevate 3.0						|
|Introduction to Web Programming	|
|PHP Assignment						|
|Due Date: 2013/1/15				|
************************************/
include 'dbConnection.class.php';

class Members {

	// check the username and password is in the database.
	function certifyUser($username, $password) {
		$dbConnection = New DbConnection();
		$checkInformation = $dbConnection->validateUsernameAndPassword($username, $password);

		// if username and password is in the database then redirect the user to the index page.
		if($checkInformation) {
			$_SESSION['status'] = 'recognised';
			header("location: index.php");
		} else return "Please enter a correct username and password.";
	}

	// unset the session for the user. 
	function logUserOut() {
		if(isset($_SESSION['status'])) {
			unset($_SESSION['status']);

			// erase the cookies on the users computer.
			if(isset($_COOKIE[session_name()])) setcookie(session_name(), '', time() - 1000);
			session_destroy();
		}
	}
	// make sure there is a session for the user to log in. If not, return user to Login page.
	function approveMember() {
		session_start();
		if($_SESSION['status'] !='recognised') header("location: login.php");
	}
		
}

?>