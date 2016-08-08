
<h2 class="sub-header">Liste aller Gremien</h2>
<a href="#"><span class="glyphicon glyphicon-plus" aria-hidden="true">&nbsp;</span>Gremium
	hinzufügen</a>
<br>
	<a href="#"><span class="glyphicon glyphicon-th-list"
		aria-hidden="true">&nbsp;</span>Liste aller Gremien</a>
	<br><br>

<?php
session_start ();
class Gremium {
	private $gid;
	private $name;
	private $beschreibung;
	public function __construct() {
		$this->tell ();
	}
	public function tell() {
		echo '<tr>
				<th scope="row">' . $this->gid . '</th>
				<td>' . $this->name . '</td>
				<td>' . $this->beschreibung . '</td>
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
	$query = "SELECT * FROM gremium ORDER BY gid;";
	$STH = $conn->prepare ( $query );
	
	$STH->execute ();
	echo '<table class="table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Beschreibung</th>
			<th></th>
			</tr>
		</thead>
		<tbody>';
	$STH->setFetchMode ( PDO::FETCH_CLASS, 'Gremium' );
	while (($STH->fetch(PDO::FETCH_CLASS)) !== false) {
		$gremium = $STH->fetch ();
	}
	echo '</tbody>
	</table>';
}
?>
