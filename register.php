 <?php

 if (isset($_POST['submit'])) {
 	$con = mysql_connect("localhost","root","tunde188256");
 	mysql_select_db('chatbox', $con);

 	$uname = $_POST['username'];
 	//md5 is for hashing password
 	$pword =md5( $_POST['password']);
 	$pword2 = md5($_POST['password2']);

 	if ($pword != $pword2) {
 		echo "<center>";
 		echo "Paswword do not match";
 		echo "</center>";
 	} else {
 		$checkexist = mysql_query("SELECT username FROM users WHERE username='$uname'");
 		if (mysql_num_rows ($checkexist)) {
 			echo "<center>";
 			echo "Username already exists, please select different username<br>";
 			echo "</center>";
 		} else{
 			mysql_query("INSERT INTO users (`username`, `password`) VALUES ('$uname','$pword')");
 			echo "<center>";
 			echo "You have successfully registered. Click <a href='index.php'>here</a> to go to start chat<br>";
 			echo "</center>";

 		}
 	}



 }
 ?>

 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<form name="form1" method="post" action="register.php">
 	<table border="1" align="center" width="40%">
 	<tr>
 	  <td>Enter Your Username: </td>
 	  <td><input type="text" name="username"></td>
 	</tr>
 	<tr>
 	  <td>Enter Your Password: </td>
 	  <td><input type="password" name="password"></td>
  	<tr>
    <td>Repeat Your Password: </td>
    <td><input type="password" name="password2"></td>
  	</tr>
 	</tr>
 	 <tr>
 	  <td colspan="2"><input type="submit" name="submit" value="Register"></td>
 	</tr>
 </table>
</form>
 </body>
 </html>