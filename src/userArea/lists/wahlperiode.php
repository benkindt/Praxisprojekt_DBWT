<style>
#wahlperiodeTable td:hover {
	cursor: pointer;
}
</style>

<h2 class="sub-header">Liste aller Wahlperioden</h2>
<a href="#" onclick="$('#right-top').load('/praxisprojekt_dbwt/src/userArea/forms/wahlperiodeForm.php');"><span class="glyphicon glyphicon-plus" aria-hidden="true">&nbsp;</span>Wahlperiode
	hinzufügen</a>
<br>
<a href="#" onclick="$('#right-top').load('/praxisprojekt_dbwt/src/userArea/lists/wahlperiode.php');"><span class="glyphicon glyphicon-th-list" aria-hidden="true">&nbsp;</span>Liste
	aller Wahlperioden</a>
<br>
<br>

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
				<td scope="row">' . $this->wid . '</th>
				<td>' . $this->von . '</td>
				<td>' . $this->bis . '</td>
				<td><a href="editWahlperiode.php?wid=' . $this->wid . '">edit</a></td>
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
	echo '<table id="wahlperiodeTable" class="table table-striped table-hover">
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
	while ( ($STH->fetch ( PDO::FETCH_CLASS )) !== false ) {
		$gremium = $STH->fetch ();
	}
	echo '</tbody>
	</table>';
}
?>

<script>
$(document).ready(function() {

    $('#wahlperiodeTable tr').click(function() {
        var href = $(this).find("a").attr("href");
        if(href) {
            window.location = href;
        }
    });

});
</script>

