
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
	
	$fachschaft = $_POST ["fachschaft"];
	
	$conn = new PDO ( 'pgsql:dbname=dbwt;host=localhost;user=dbuser;password=test1342' );
	
	$query = "SELECT * FROM person, gremiumsmitglied, gremium, fachschaft, fachschaftsmitglied WHERE person.pid IN (SELECT DISTINCT person.pid FROM person, gremiumsmitglied, gremium, fachschaft WHERE fachschaft.fid = '" . $fachschaft . "') AND fachschaftsmitglied.fid = fachschaft.fid AND person.pid = fachschaftsmitglied.pid ORDER BY person.pid;";
	$STH = $conn->prepare ( $query );
	
	echo $query;
	$STH->execute ();
	echo '<div class="container">
		<div class="panel-group" id="accordion" style="width: 420px;">';
	$lastName = '43noname134593';
	while ( ($result = $STH->fetch ( PDO::FETCH_ASSOC )) !== false ) {
		$newName = $result ["vorname"] . $result ["nachname"];
		$isNachruecker = $result ["nachruecker"] ? 'Ja' : 'Nein';
		if($newName == $lastName){
			echo '<ul style="margin-top:5px;"><b>' . $result ["von"] . ' - ' . $result ["bis"] . '</b></ul>Gremium: ' . $result ["name"] . ' <br>';
			echo 'Nachrücker: ' . $isNachruecker . ' <br> Mitglied von ... bis ... <br> Bemerkung:' . $result ["grund"] . '<br>';
			// insert into existing accordion tab
		} else {
			// if name changed end the last accordion tab
			if($lastName != '43noname134593'){
				echo '</div>
				</div>
				</div>';
			}
			// start new accordion tab
			echo '<div class="panel panel-default">
		<div class="panel-heading">
		<h4 class="panel-title">
		<a data-toggle="collapse" data-parent="#accordion"
				href="#collapse' . $result ["pid"] . '">' . $result ["vorname"] . ' ' . $result ["nachname"] . '</a>
				</h4>
				</div>
				<div id="collapse' . $result ["pid"] . '" class="panel-collapse collapse">
				<div class="panel-body">
				<!-- body -->';
			echo '<ul style="margin-top:5px;"><b>' . $result ["von"] . ' - ' . $result ["bis"] . '</b> </ul>Gremium: ' . $result ["name"] . ' <br>';
			echo 'Nachrücker: ' . $isNachruecker . ' <br> Mitglied von ... bis ... <br> Bemerkung:' . $result ["grund"] . '<br>';
		}
		$lastName = $newName;
	}
	echo '</div></div></div>';
}

?>