<?php
session_start ();
$userId = "userIdabcd135";
if (isset ( $_SESSION [$userId] )) {
	header ( "Location: ../userArea/userIndex.php" );
	exit ();
} else {
	$host = "localhost";
	$db = "dbwt";
	$dbuser = "dbuser";
	$dbpass = "test1342";
	
	$email = $_POST ["inputEmail"];
	$pass = $_POST ["inputPassword"];
	
	$conn = new PDO ( 'pgsql:dbname=dbwt;host=localhost;user=dbuser;password=test1342' );
	
	// user=' + $user + ';password=' + $pass + ';');
	$query = "SELECT password = crypt(?, password) as bool, email FROM users WHERE email = ?;";
	$STH = $conn->prepare ( $query );
	
	$STH->bindParam ( 1, $pass );
	$STH->bindParam ( 2, $email );
	$STH->execute ();
	$result = $STH->fetch ( PDO::FETCH_ASSOC );
	// check if user already exists
	if ($result ["bool"] == 1) {
		$_SESSION [$userId] = $result ["email"];
		// TODO check if admin or not
		$_SESSION ["admin"] = "Admin";
		header ( "Location: ../userArea/userIndex.php" );
		exit ();
	} else {
		echo "Login fehlerhaft!</br></br>";
		echo "<a href='../index.html' class='btn btn-default'>Ich kann mich an mein Passwort erinnern.</a></br>";
		echo "<a href='../register.html' class='btn btn-default'>Ich werde eine andere Email benutzen.</a>";
		exit ();
	}
}
?>