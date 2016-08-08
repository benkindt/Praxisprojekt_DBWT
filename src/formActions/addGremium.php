<?php
session_start ();
$userId = "userIdabcd135";
if (isset ( $_SESSION [$userId] )) {
	$host = "localhost";
	$db = "dbwt";
	$dbuser = "dbuser";
	$dbpass = "test1342";
	
	$name = $_POST ["name"];
	$beschreibung = $_POST ["beschreibung"];

	$conn = new PDO ( 'pgsql:dbname=dbwt;host=localhost;user=dbuser;password=test1342' );
	
	if($_GET['gid']){
		$query = "UPDATE gremium SET name = ? , beschreibung = ? WHERE gid = " . $_GET['gid'] . ";";
	} else {
		$query = "INSERT INTO gremium (name, beschreibung) VALUES (?, ?);";
	}
	
	$STH = $conn->prepare ( $query );
	
	$STH->bindParam ( 1, $name );
	$STH->bindParam ( 2, $beschreibung );
	$result = $STH->execute ();
	if ($result) {
		echo $query;
		echo "<br>Success!";
		echo "<script>$(function() { $('#right-top').load('/praxisprojekt_dbwt/src/userArea/lists/gremien.php');});</script>";
	} else {
		echo $query;
		echo "<br>FAILED! maybe this name already exists!";
	}
}

?>