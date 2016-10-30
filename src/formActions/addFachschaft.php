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
	
	$conn = new PDO ( 'pgsql:dbname=dbwt;host=localhost;user=dbuser;password=test1342' );
	
	if ($_GET ['fid']) {
		$query = "UPDATE fachschaft SET name = ? WHERE fid = " . $_GET ['fid'] . ";";
	} else {
		$query = "INSERT INTO fachschaft (name) VALUES (?);";
	}
	$STH = $conn->prepare ( $query );
	
	$STH->bindParam ( 1, $name );
	$result = $STH->execute ();
	echo "</div>";
	if ($result) {
		echo "<div class='alert alert-success' style='display:inline !important;'>Erfolgreich! Weiterleitung...</div>";
	} else {
		echo "<div class='alert alert-warning' style='display:inline !important;'>Gescheitert!</div>";
	}
}

?>