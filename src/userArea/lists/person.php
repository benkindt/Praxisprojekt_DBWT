<style>
#personTable td:hover {
    cursor: pointer;
}
</style>

<h2 class="sub-header">Liste aller Personen</h2>
<a href="#" onclick="$('#right-top').load('/praxisprojekt_dbwt/src/userArea/forms/personForm.php');"><span class="glyphicon glyphicon-plus" aria-hidden="true">&nbsp;</span>Person
	hinzufügen</a>
<br>
<a href="#" onclick="$('#right-top').load('/praxisprojekt_dbwt/src/userArea/lists/person.php');"><span class="glyphicon glyphicon-th-list" aria-hidden="true">&nbsp;</span>Liste
	aller Personen</a>
<br>
<br>

<?php
session_start ();
class Person {
	private $pid;
	private $vorname;
	private $nachname;
	private $nutzerkennzeichen;
	private $matrikelnummer;
	public function __construct() {
		$this->tell ();
	}
	public function tell() {
		echo '<tr>
				<td scope="row">' . $this->pid . '</th>
				<td>' . $this->vorname . '</td>
				<td>' . $this->nachname . '</td>
				<td>' . $this->nutzerkennzeichen . '</td>
				<td>' . $this->matrikelnummer . '</td>
				<td><a href="editPerson.php?pid=' . $this->pid . '">edit</a></td>
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
	$query = "SELECT * FROM person ORDER BY pid;";
	$STH = $conn->prepare ( $query );
	
	$STH->execute ();
	echo '<table id="personTable" class="table table-striped table-hover" style="hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Vorname</th>
				<th>Nachname</th>
				<th>Nutzerkennzeichen</th>
				<th>Matrikelnummer</th>
				<th></th>
			</tr>
		</thead>
		<tbody>';
	$STH->setFetchMode ( PDO::FETCH_CLASS, 'Person' );
	while ( ($STH->fetch ( PDO::FETCH_CLASS )) !== false ) {
		$gremium = $STH->fetch ();
	}
	echo '</tbody>
	</table>';
}
?>
<script>
$(document).ready(function() {

    $('#personTable tr').click(function() {
        var href = $(this).find("a").attr("href");
        if(href) {
            window.location = href;
        }
    });

});
</script>
