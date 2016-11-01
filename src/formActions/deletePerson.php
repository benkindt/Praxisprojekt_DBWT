<?php
session_start ();
$userId = "userIdabcd135";
// echo "<div class='hidden'>";
if (isset ( $_SESSION [$userId] )) {
	$host = "localhost";
	$db = "dbwt";
	$dbuser = "dbuser";
	$dbpass = "test1342";
	
	$conn = new PDO ( 'pgsql:dbname=dbwt;host=localhost;user=dbuser;password=test1342' );
	if (isset ( $_GET ['pid'] )) {
		if ($_GET ['pid']) {
			$pid = $_GET ['pid'];
			$query = "DELETE FROM gremiumsmitglied WHERE pid = ?;";
			$query2 = "DELETE FROM fachschaftsmitglied WHERE pid = ?;";
			$query3 = "DELETE FROM person WHERE pid = ?;";
		}
	} else {
		echo "error - no pid in deleteperson.php";
	}
	$STH = $conn->prepare ( $query );
	$STH->bindParam ( 1, $pid );
	$result = $STH->execute ();
	
	$STH = $conn->prepare ( $query2 );
	$STH->bindParam ( 1, $pid );
	$result2 = $STH->execute ();
	
	$STH = $conn->prepare ( $query3 );
	$STH->bindParam ( 1, $pid );
	$result3 = $STH->execute ();
// 	echo $pid;
// 	echo $query;
// 	if ($result) {
// 		echo $result2;
// 		echo $result3;
// 	} else {
// 		echo "0";
// 	}
}

?>