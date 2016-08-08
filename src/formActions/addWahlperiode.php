<?php
session_start ();
$userId = "userIdabcd135";
if (isset ( $_SESSION [$userId] )) {
	$host = "localhost";
	$db = "dbwt";
	$dbuser = "dbuser";
	$dbpass = "test1342";
	
	$von = $_POST ["von"];
	$bis = $_POST ["bis"];
	
	echo $von . " / " . $bis;
	$conn = new PDO ( 'pgsql:dbname=dbwt;host=localhost;user=dbuser;password=test1342' );
	
	// user=' + $user + ';password=' + $pass + ';');
	$query = "INSERT INTO wahlperiode (von, bis) VALUES (?, ?);";
	$STH = $conn->prepare ( $query );
	
	$STH->bindParam ( 1, $von );
	$STH->bindParam ( 2, $bis );
	$result = $STH->execute ();
	if ($result) {
		echo $query;
		echo "<br>Success!";
	} else {
		echo $query;
		echo "<br>FAILED!";
	}
}

?>