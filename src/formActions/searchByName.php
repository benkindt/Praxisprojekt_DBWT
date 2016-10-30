
<h2 class="sub-header">Suchergebnis</h2>
<div style="width: 250px;">

	<!--  -->
	<br> <br>




</div>


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
	
	$conn = new PDO ( 'pgsql:dbname=dbwt;host=localhost;user=dbuser;password=test1342' );
	
	if ($vorname != "") {
		if ($nachname != "") {
			// beides eingegeben
			$query = "SELECT * FROM person WHERE vorname = '" . $vorname . "' AND nachname = '" . $nachname . "' ORDER BY pid;";
		} else {
			// nur Vorname
			$query = "SELECT * FROM person WHERE vorname = '" . $vorname . "' ORDER BY pid;";
		}
	} else {
		if ($nachname != "") {
			// nur Nachname
			$query = "SELECT * FROM person WHERE nachname = '" . $nachname . "' ORDER BY pid;";
		} else {
			// keine Eingabe erfolgt
		}
	}
	$STH = $conn->prepare ( $query );
	
	$STH->execute ();
	echo '<div class="container">
		<div class="panel-group" id="accordion" style="width: 420px;">';
	
	while ( ($result = $STH->fetch ( PDO::FETCH_ASSOC )) !== false ) {
		echo '<div class="panel panel-default">
		<div class="panel-heading">
		<h4 class="panel-title">
		<a data-toggle="collapse" data-parent="#accordion"
				href="#collapse' . $result ["pid"] . '">' . $result ["vorname"] . ' ' . $result ["nachname"] . '</a>
				</h4>
				</div>
				<div id="collapse' . $result ["pid"] . '" class="panel-collapse collapse">
				<div class="panel-body">
				<!-- body -->
				</div>
				</div>
				</div>';
	}
	echo '</div></div></div>';
}

?>