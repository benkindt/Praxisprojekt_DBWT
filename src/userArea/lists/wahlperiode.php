
<h2 class="sub-header">Liste aller Wahlperioden</h2>
<a href="#"><span class="glyphicon glyphicon-plus" aria-hidden="true">&nbsp;</span>Wahlperiode
	hinzufügen</a>
<br>
	<a href="#"><span class="glyphicon glyphicon-th-list"
		aria-hidden="true">&nbsp;</span>Liste aller Wahlperioden</a>
	<br><br>

<?php
session_start ();
class Wahlperiode {
	private $wid;
	private $von;
	private $bis;
	public function __construct() {
		$this->tell ();
	}
	public function tell() {
		echo '<tr>
				<th scope="row">' . $this->wid . '</th>
				<td>' . $this->von . '</td>
				<td>' . $this->bis . '</td>
				<td>edit</td>
			</tr>';
	}
}

$userId = "userIdabcd135";
if (isset ( $_SESSION [$userId] )) {
	$host = "localhost";
	$db = "dbwt";
	$dbuser = "dbuser";
	$dbpass = "test1342";
	
	$conn = new PDO ( 'pgsql:dbname=dbwt;host=localhost;user=dbuser;password=test1342' );
	
	// user=' + $user + ';password=' + $pass + ';');
	$query = "SELECT * FROM wahlperiode ORDER BY wid;";
	$STH = $conn->prepare ( $query );
	
	$STH->execute ();
	echo '<table class="table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>von</th>
				<th>bis</th>
			<th></th>
			</tr>
		</thead>
		<tbody>';
	$STH->setFetchMode ( PDO::FETCH_CLASS, 'Wahlperiode' );
	while (($STH->fetch(PDO::FETCH_CLASS)) !== false) {
		$gremium = $STH->fetch ();
	}
	echo '</tbody>
	</table>';
}
?>
