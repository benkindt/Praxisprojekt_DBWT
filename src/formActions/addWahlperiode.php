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
	
	$conn = new PDO ( 'pgsql:dbname=dbwt;host=localhost;user=dbuser;password=test1342' );
	
	if ($_GET ['wid']) {
		$query = "UPDATE wahlperiode SET von = ? , bis = ? WHERE wid = " . $_GET ['wid'] . ";";
	} else {
		$query = "INSERT INTO wahlperiode (von, bis) VALUES (?, ?);";
	}
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