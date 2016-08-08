<?php
session_start ();
$userId = "userIdabcd135";
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
	if ($result) {
		echo $query;
		echo "<br>Success!";
	} else {
		echo $query;
		echo "<br>FAILED! maybe this name already exists!";
	}
}

?>