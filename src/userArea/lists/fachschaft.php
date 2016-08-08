<style>
#fachschaftTable td:hover {
	cursor: pointer;
}
</style>

<h2 class="sub-header">Liste aller Fachschaften</h2>
<a href="#" onclick="$('#right-top').load('/praxisprojekt_dbwt/src/userArea/forms/fachschaftForm.php');"><span class="glyphicon glyphicon-plus" aria-hidden="true">&nbsp;</span>Fachschaft
	hinzufügen</a>
<br>
<a href="#" onclick="$('#right-top').load('/praxisprojekt_dbwt/src/userArea/lists/fachschaft.php');"><span class="glyphicon glyphicon-th-list" aria-hidden="true">&nbsp;</span>Liste
	aller Fachschaften</a>
<br>
<br>

<?php
session_start ();
class Fachschaft {
	private $fid;
	private $name;
	public function __construct() {
		$this->tell ();
	}
	public function tell() {
		echo '<tr>
				<td scope="row">' . $this->fid . '</th>
				<td>' . $this->name . '</td>
				<td><a onclick="$(&#39;#right-top&#39;).load(&#39;/praxisprojekt_dbwt/src/userArea/forms/fachschaftUpdateForm.php?fid=' . $this->fid . '&#39);" href="#">edit</a></td>
			</tr>';
	}
	public function name(){
		echo $this->name;
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
	$query = "SELECT * FROM fachschaft ORDER BY fid;";
	$STH = $conn->prepare ( $query );
	
	$STH->execute ();
	echo '<table id="fachschaftTable" class="table table-striped table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
			<th></th>
			</tr>
		</thead>
		<tbody>';
	$STH->setFetchMode ( PDO::FETCH_CLASS, 'Fachschaft' );
	while ( ($STH->fetch ( PDO::FETCH_CLASS )) !== false ) {
		$gremium = $STH->fetch ();
	}
	echo '</tbody>
	</table>';
}
?>

<script>
$(document).ready(function() {

    $('#fachschaftTable tr').click(function() {
        var href = $(this).find("a").attr("href");
        if(href) {
            window.location = href;
        }
    });

});
</script>
