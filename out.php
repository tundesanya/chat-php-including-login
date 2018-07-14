<?php
session_start();
$connect = mysqli_connect("localhost", "root", "tunde188256", "chatbox");

$uname = $_SESSION['username'];
$msg = mysqli_real_escape_string($connect, $_POST["msg"]);

$query = "INSERT INTO logs (`username`, `msg`) VALUES ('$uname','$msg')";

	if(mysqli_query($connect, $query)){
		echo '<p>You have entered</p>';
		echo '<p>Name:' . $uname. '</p>';
		echo '<p>Message:' . $msg. '</p>';
		}

