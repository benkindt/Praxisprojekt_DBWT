
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
	
	// $query = "SELECT * FROM person, gremiumsmitglied, gremium, fachschaft, fachschaftsmitglied WHERE person.pid IN (SELECT DISTINCT person.pid FROM person, gremiumsmitglied, gremium, fachschaft WHERE fachschaft.fid = '" . $fachschaft . "') AND fachschaftsmitglied.fid = fachschaft.fid AND person.pid = fachschaftsmitglied.pid ORDER BY person.pid;";
	$query = "SELECT DISTINCT ON (gremiumsmitglied.gmid) person.pid, person.vorname, person.nachname, gremiumsmitglied.gmid, gremium.name, gremiumsmitglied.nachruecker, gremiumsmitglied.von as gvon, gremiumsmitglied.bis as gbis, gremiumsmitglied.grund, wahlperiode.von as wvon, wahlperiode.bis as wbis, fachschaft.name as fname FROM person, gremiumsmitglied, gremium, fachschaft, fachschaftsmitglied, wahlperiode WHERE person.pid IN (SELECT DISTINCT person.pid FROM person, gremiumsmitglied, gremium, fachschaft, fachschaftsmitglied WHERE fachschaft.fid = '" . $fachschaft . "' AND fachschaftsmitglied.fid = fachschaft.fid AND fachschaftsmitglied.pid = person.pid) AND fachschaftsmitglied.fid = fachschaft.fid AND person.pid = fachschaftsmitglied.pid AND person.pid = gremiumsmitglied.pid AND gremium.gid = gremiumsmitglied.gid ORDER BY gremiumsmitglied.gmid;";
	$STH = $conn->prepare ( $query );
	
// 	echo $query;
	$STH->execute ();
	echo '<div class="container">
		<div class="panel-group" id="accordion" style="width: 420px;">';
	$lastName = '43noname134593';
	while ( ($result = $STH->fetch ( PDO::FETCH_ASSOC )) !== false ) {
		$newName = $result ["vorname"] . $result ["nachname"];
		$isNachruecker = $result ["nachruecker"] ? 'Ja' : 'Nein';
		if ($newName == $lastName) {
			echo '<ul style="margin-top:5px;"><b>' . $result ["wvon"] . ' - ' . $result ["wbis"] . '</b> </ul>Gremium: ' . $result ["name"] . ' <br>';
			echo 'Fachschaft: ' . $result ["fname"] . '<br>';
			echo 'Nachrücker: ' . $isNachruecker . ' <br> Mitglied von ' . $result ["gvon"] . ' bis ' . $result ["gbis"] . ' <br> Bemerkung: ' . $result ["grund"] . '<br>';
			// insert into existing accordion tab
		} else {
			// if name changed end the last accordion tab
			if ($lastName != '43noname134593') {
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
			echo '<ul style="margin-top:5px;"><b>' . $result ["wvon"] . ' - ' . $result ["wbis"] . '</b> </ul>Gremium: ' . $result ["name"] . ' <br>';
			echo 'Fachschaft: ' . $result ["fname"] . '<br>';
			echo 'Nachrücker: ' . $isNachruecker . ' <br> Mitglied von ' . $result ["gvon"] . ' bis ' . $result ["gbis"] . ' <br> Bemerkung: ' . $result ["grund"] . '<br>';
		}
		$lastName = $newName;
	}
	echo '</div></div></div>';
}

?>