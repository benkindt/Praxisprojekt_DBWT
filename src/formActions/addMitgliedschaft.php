<?php
session_start ();
$userId = "userIdabcd135";
// echo "<div class='hidden'>";
if (isset ( $_SESSION [$userId] )) {
	$host = "localhost";
	$db = "dbwt";
	$dbuser = "dbuser";
	$dbpass = "test1342";
	
	$personCount = $_POST ["personCount"];
	// get pid
	if (isset ( $_SESSION [$userId] )) {
		$host = "localhost";
		$db = "dbwt";
		$dbuser = "dbuser";
		$dbpass = "test1342";
	
		$conn = new PDO ( 'pgsql:dbname=dbwt;host=localhost;user=dbuser;password=test1342' );
	
		// user=' + $user + ';password=' + $pass + ';');
		$query = "SELECT MAX(pid) as max FROM person;";
		$STH = $conn->prepare ( $query );
	
		$STH->execute ();
		$result = $STH->fetch ( PDO::FETCH_ASSOC );
		if ( ($result ["max"])) {
			$pid = $result ["max"] + $personCount;
			echo "" . $pid . " ";
		} else {
			echo "Error processing pid in addMitgliedschaft";
		}
	}
	
	// get wid
	$wid = $_POST['wahlperiode'];
	echo "" . $wid . " ";
	// get gid
	$gid = $_POST['gremium'];
	echo "" . $gid . " ";
	// get von
	$von = $_POST['von'];
	echo "" . $von . " ";
	// get bis
	$bis = $_POST['bis'];
	echo "" . $bis . " ";
	// get nachruecker-boolean
	if(isset($_POST['nachrueckerCheckbox']) &&
			$_POST['nachrueckerCheckbox'] == 'Yes')
	{
		$nachruecker = "true";
	} else {
		$nachruecker = "false";
	}
	echo " nachruecker:" . $nachruecker . ": ";
	// get grund
	$grund = $_POST['bemerkung'];
	echo "" . $grund . " ";
	
	$conn = new PDO ( 'pgsql:dbname=dbwt;host=localhost;user=dbuser;password=test1342' );
	if (isset ( $_GET ['pid'] )) {
		if ($_GET ['pid']) {
			$query = "UPDATE gremiumsmitglied SET pid = ?, wid = ?, gid = ?, von = ?, bis = ?, nachruecker = ?, grund = ? WHERE pid = " . $_GET ['pid'] . ";";
		}
	} else {
		$query = "INSERT INTO gremiumsmitglied (pid, wid, gid, von, bis, nachruecker, grund) VALUES (?, ?, ?, ?, ?, ?, ?);";
	}
	$STH = $conn->prepare ( $query );
	
	$STH->bindParam ( 1, $pid );
	$STH->bindParam ( 2, $wid );
	$STH->bindParam ( 3, $gid );
	$STH->bindParam ( 4, $von );
	$STH->bindParam ( 5, $bis );
	$STH->bindParam ( 6, $nachruecker );
	$STH->bindParam ( 7, $grund );
	
	$result = $STH->execute ();
// 	echo "</div>";
	if ($result) {
		echo "<div class='alert alert-success' style='display:inline !important;'>Erfolgreich! Weiterleitung...</div>";
	} else {
		echo "<div class='alert alert-warning' style='display:inline !important;'>Gescheitert!</div>";
	}
}

?>