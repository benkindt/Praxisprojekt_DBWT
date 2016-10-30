<script>$(document).ready(function () {
    $('.ajaxForm').on('submit', function(e) {
        e.preventDefault();
        console.log("catched submit");
        $.ajax({
            url : $(this).attr('action') || window.location.pathname,
            type: "POST",
            data: $(this).serialize(),
            success: function (data) {
            	$("#result").html(data);
            	if($("div").hasClass("alert-success")){
                	setTimeout(function(){ 
                    	var urlString = "/praxisprojekt_dbwt/src/userArea/lists/person.php";
        				$("#right-top").load(urlString);
        			 }, 2500);
                }
            },
            error: function (jXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });
});</script>

<h2 class="sub-header">Person editieren</h2>
<a href="#"
	onclick="$('#right-top').load('/praxisprojekt_dbwt/src/userArea/forms/personForm.php');"><span
	class="glyphicon glyphicon-plus" aria-hidden="true">&nbsp;</span>Person
	hinzufügen</a>
<br>
<a href="#"
	onclick="$('#right-top').load('/praxisprojekt_dbwt/src/userArea/lists/person.php');"><span
	class="glyphicon glyphicon-th-list" aria-hidden="true">&nbsp;</span>Liste
	aller Personen</a>
<br>
<br>
<?php
session_start ();
$userId = "userIdabcd135";
if (isset ( $_SESSION [$userId] )) {
	if ($_GET ['pid']) {
		$host = "localhost";
		$db = "dbwt";
		$dbuser = "dbuser";
		$dbpass = "test1342";
		
		$conn = new PDO ( 'pgsql:dbname=dbwt;host=localhost;user=dbuser;password=test1342' );
		$query = "SELECT * FROM person WHERE pid = " . $_GET ['pid'] . ";";
		$STH = $conn->prepare ( $query );
		
		$STH->execute ();
		$STH->setFetchMode ( PDO::FETCH_CLASS, 'Gremium' );
		$person = $STH->fetch ();
		echo "ID: " . $person[0] . "<br><br>";
	} else {
		echo "No PID found!";
	}
} else {
	echo "Not logged in!";
}
?>
<div id="formContainer" style="width: 45%;">
	<form action="/praxisprojekt_dbwt/src/formActions/addPerson.php?pid=<?php echo $_GET ['pid']; ?>"
		method="post" class="form ajaxForm">
		<label for="inputEmail">Vorname</label> <input type="text"
			id="vorname" name="vorname" class="form-control"
			placeholder="Vorname" required autofocus value="<?php echo $person[1]; ?>">
		<!--  -->
		<label for="inputPassword">Nachname</label> <input type="text"
			id="nachname" name="nachname" class="form-control"
			placeholder="Nachname" required value="<?php echo $person[2]; ?>">
		<!--  -->
		<label for="inputPassword">Nutzerkennzeichen</label> <input
			type="text" id="nutzerkennzeichen" name="nutzerkennzeichen"
			class="form-control" placeholder="Nutzerkennzeichen" value="<?php echo $person[3]; ?>">
		<!--  -->
		<label for="inputPassword">Matrikelnummer</label> <input type="text"
			id="matrikelnummer" name="matrikelnummer" class="form-control"
			placeholder="Matrikelnummer" value="<?php echo $person[4]; ?>">
		<!--  --><br><br>
		<button class="btn btn-lg btn-primary btn-block submitForm"
			type="submit">&nbsp;&nbsp;ändern</button>
	</form><br><div id="result" style="width:600px;"></div>
</div>

<!-- <p> -->
<!-- 	Date: <input type="text" class="datepickers"> -->
<!-- </p> -->
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

<link rel="stylesheet"
	href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
