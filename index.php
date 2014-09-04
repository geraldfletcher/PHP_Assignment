<?php
/************************************
|Gerald Fletcher - C06414401		|
|Webelevate 3.0						|
|Introduction to Web Programming	|
|PHP Assignment						|
|Due Date: 2013/1/15				|
************************************/
include 'members.class.php';
$members = new Members();

// Approve that the user is Logged in.
$members->approveMember();

echo "<h2> You have successfully logged in. </h2></br>";
echo "<h3> This is the members page...</h3>";

echo "<a href='login.php?status=loggedout'>Log Out</a>";

?> 