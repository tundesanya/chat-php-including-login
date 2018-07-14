<?php
session_start();
$username = $_POST['username'];
//md5 is for hashing password
$password = md5($_POST['password']);

$con = mysql_connect("localhost","root","tunde188256");
mysql_select_db('chatbox', $con);

$result = mysql_query("SELECT * FROM users WHERE username='$username' AND password='$password'");
//now lets check if the query returns any result
if (mysql_num_rows($result)) {
	$res = mysql_fetch_array($result);
	//register the username from db to our username session
	$_SESSION['username'] = $res['username'];
	echo "<center>";
	echo "You are now Login. click <a href='index.php'>here</a> to go to main chat window";
	echo "</center>";
}
	else{
		echo "<center>";
		echo "No User found. Please go <a href='index.php'>back</a> and enter the correct login.<br>";
		echo "You may register a new account by clicking <a href='register.php'>here</a>";
		echo "</center>";
	}


?>