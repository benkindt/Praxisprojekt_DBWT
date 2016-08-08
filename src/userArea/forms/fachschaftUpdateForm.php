<h2 class="sub-header">Fachschaft editieren</h2>
<a href="#"
	onclick="$('#right-top').load('/praxisprojekt_dbwt/src/userArea/forms/fachschaftForm.php');"><span
	class="glyphicon glyphicon-plus" aria-hidden="true">&nbsp;</span>Fachschaft
	hinzufügen</a>
<br>
<a href="#"
	onclick="$('#right-top').load('/praxisprojekt_dbwt/src/userArea/lists/fachschaft.php');"><span
	class="glyphicon glyphicon-th-list" aria-hidden="true">&nbsp;</span>Liste
	aller Fachschaften</a>
<br>
<br>
<?php
session_start ();
$userId = "userIdabcd135";
if (isset ( $_SESSION [$userId] )) {
	if ($_GET ['fid']) {
		$host = "localhost";
		$db = "dbwt";
		$dbuser = "dbuser";
		$dbpass = "test1342";
		
		$conn = new PDO ( 'pgsql:dbname=dbwt;host=localhost;user=dbuser;password=test1342' );
		$query = "SELECT * FROM fachschaft WHERE fid = " . $_GET ['fid'] . ";";
		$STH = $conn->prepare ( $query );
		
		$STH->execute ();
		$STH->setFetchMode ( PDO::FETCH_CLASS, 'Fachschaft' );
		$fachschaft = $STH->fetch ();
		echo "ID: " . $fachschaft[0] . "<br><br>";
// 		echo "Bisheriger Name: " . $fachschaft[1] . "<br><br>";
	} else {
		echo "No FID found!";
	}
} else {
	echo "Not logged in!";
}
?>
<div id="formContainer" style="width: 45%;">
	<form action="/praxisprojekt_dbwt/src/formActions/addFachschaft.php?fid=<?php echo $_GET ['fid']; ?>"
		method="post" class="form">
		<label for="name">Name</label> <input type="text" id="name"
			name="name" class="form-control" placeholder="Bezeichnung" required
			autofocus value="<?php echo $fachschaft[1]; ?>">
		<!--  -->
		<br>
		<button class="btn btn-lg btn-primary btn-block submitForm"
			type="submit">&nbsp;&nbsp;ändern</button>
	</form>
</div>