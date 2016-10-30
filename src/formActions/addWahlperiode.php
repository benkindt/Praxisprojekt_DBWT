<?php
session_start ();
$userId = "userIdabcd135";
echo "<div class='hidden'>";
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
	echo "</div>";
	if ($result) {
		echo "<div class='alert alert-success' style='display:inline !important;'>Erfolgreich! Weiterleitung...</div>";
	} else {
		echo "<div class='alert alert-warning' style='display:inline !important;'>Gescheitert!</div>";
	}
}

?>