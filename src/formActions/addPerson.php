<?php
session_start ();
$userId = "userIdabcd135";
if (isset ( $_SESSION [$userId] )) {
	$host = "localhost";
	$db = "dbwt";
	$dbuser = "dbuser";
	$dbpass = "test1342";
	
	$vorname = $_POST ["vorname"];
	$nachname = $_POST ["nachname"];
	$matrikel = $_POST ["matrikelnummer"];
	$nkz = $_POST ["nutzerkennzeichen"];
	echo $vorname . " abc <br>" . $nachname . "<br> " . $matrikel . "<br> " . $nkz . "<br> ";
	
	$conn = new PDO ( 'pgsql:dbname=dbwt;host=localhost;user=dbuser;password=test1342' );
	
	// user=' + $user + ';password=' + $pass + ';');
	$query = "INSERT INTO person (vorname, nachname";
	$valuesPart = "VALUES (?, ?";
	$count = 3;
	if (isset ( $_POST ["matrikelnummer"] )) {
		$query = $query . ", matrikelnummer";
		$valuesPart = $valuesPart . ", ?";
		$count ++;
	}
	if (isset ( $_POST ["nutzerkennzeichen"] )) {
		$query = $query . ", nutzerkennzeichen";
		$valuesPart = $valuesPart . ", ?";
	}
	$query = $query . ") " . $valuesPart . ");";
	$STH = $conn->prepare ( $query );
	
	$STH->bindParam ( 1, $vorname );
	$STH->bindParam ( 2, $nachname );
	if (isset ( $_POST ["matrikelnummer"] )) {
		$STH->bindParam ( 3, $matrikel );
	}
	if (isset ( $_POST ["nutzerkennzeichen"] )) {
		$STH->bindParam ( $count, $nkz );
	}
	$result = $STH->execute ();
	if ($result) {
		echo "Success!";
		echo $query;
	} else {
		echo $query;
		echo "<br>FAILED!";
		exit ();
	}
}

?>