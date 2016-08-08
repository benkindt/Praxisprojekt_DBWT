<h2 class="sub-header">Wahlperiode editieren</h2>
<a href="#" onclick="$('#right-top').load('/praxisprojekt_dbwt/src/userArea/forms/wahlperiodeForm.php');"><span class="glyphicon glyphicon-plus" aria-hidden="true">&nbsp;</span>Wahlperiode
	hinzufügen</a>
<br>
<a href="#" onclick="$('#right-top').load('/praxisprojekt_dbwt/src/userArea/lists/wahlperiode.php');"><span class="glyphicon glyphicon-th-list" aria-hidden="true">&nbsp;</span>Liste
	aller Wahlperioden</a>
<br>
<br>

<?php
session_start ();
$userId = "userIdabcd135";
if (isset ( $_SESSION [$userId] )) {
	if ($_GET ['wid']) {
		$host = "localhost";
		$db = "dbwt";
		$dbuser = "dbuser";
		$dbpass = "test1342";
		
		$conn = new PDO ( 'pgsql:dbname=dbwt;host=localhost;user=dbuser;password=test1342' );
		$query = "SELECT * FROM wahlperiode WHERE wid = " . $_GET ['wid'] . ";";
		$STH = $conn->prepare ( $query );
		
		$STH->execute ();
		$STH->setFetchMode ( PDO::FETCH_CLASS, 'Wahlperiode' );
		$wahlperiode = $STH->fetch ();
		echo "ID: " . $wahlperiode[0] . "<br><br>";
// 		echo "von: " . $wahlperiode[1] . "<br>";
// 		echo "bis: " . $wahlperiode[2] . "<br><br>";
	} else {
		echo "No WID found!";
	}
} else {
	echo "Not logged in!";
}
?>

<div id="formContainer" style="width: 45%;">
	<form
		action="/praxisprojekt_dbwt/src/formActions/addWahlperiode.php?wid=<?php echo $_GET ['wid']; ?>"
		method="post" class="form">
		<label for="von">von</label> <input type="text" id="von" name="von"
			class="datepickers" value="<?php echo $wahlperiode[1]; ?>">
		<!--  -->
		<label for="bis">bis</label> <input type="text" id="bis" name="bis"
			class="datepickers" value="<?php echo $wahlperiode[2]; ?>">
		<!--  --><br><br>
		<button class="btn btn-lg btn-primary btn-block submitForm"
			type="submit">&nbsp;&nbsp;ändern</button>
	</form>
</div>

<link rel="stylesheet"
	href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script>
$(function() {
	$(".datepickers").each(function(){
		if(!$(this).hasClass('hasDatepicker')){
			console.log("has not datepicker!");
			$(this).datepicker({
				dateFormat : "dd.mm.yy"
			});
		}
	});
});
</script>