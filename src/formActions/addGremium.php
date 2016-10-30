<?php
session_start ();
$userId = "userIdabcd135";
echo "<div class='hidden'>";
if (isset ( $_SESSION [$userId] )) {
	$host = "localhost";
	$db = "dbwt";
	$dbuser = "dbuser";
	$dbpass = "test1342";
	
	$name = $_POST ["name"];
	$beschreibung = $_POST ["beschreibung"];
	
	$conn = new PDO ( 'pgsql:dbname=dbwt;host=localhost;user=dbuser;password=test1342' );
	
	if ($_GET ['gid']) {
		$query = "UPDATE gremium SET name = ? , beschreibung = ? WHERE gid = " . $_GET ['gid'] . ";";
	} else {
		$query = "INSERT INTO gremium (name, beschreibung) VALUES (?, ?);";
	}
	
	$STH = $conn->prepare ( $query );
	
	$STH->bindParam ( 1, $name );
	$STH->bindParam ( 2, $beschreibung );
	$result = $STH->execute ();
	echo "</div>";
	if ($result) {
		echo "<div class='alert alert-success' style='display:inline !important;'>Erfolgreich! Weiterleitung...</div>";
	} else {
		echo "<div class='alert alert-warning' style='display:inline !important;'>Gescheitert!</div>";
	}
}

?>