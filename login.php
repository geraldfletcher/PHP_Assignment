<?php
/************************************
|Gerald Fletcher - C06414401		|
|Webelevate 3.0						|
|Introduction to Web Programming	|
|PHP Assignment						|
|Due Date: 2013/1/15				|
************************************/
session_start();

include 'members.class.php';

$members = new Members();

// when user clickes 'Log Out'.
if (isset($_GET['status']) && $_GET['status'] == 'loggedout') {
	$members->logUserOut();
}

//Check to see if the user entered a username and password.
if($_POST && !empty($_POST['username']) && !empty($_POST['password'])) {
	$response = $members->certifyUser($_POST['username'], $_POST['password']);
}
// Login page.
echo "<h3>Login!</h3>";
echo "<h4>Please enter your username and password.</h4>";

// Login form.
echo "<form action=\"?op=login\" method=\"POST\">";
echo "Username: <input name=\"username\" size=\"15\"><br />";
echo "Password: <input type=\"password\" name=\"password\" size=\"15\"><br />";
echo "<input type=\"submit\" value=\"Login\">";
echo "</form>";

// if username or password is incorrect.
if(isset($response)) echo "<h3>" . $response . "</h3>";

?>