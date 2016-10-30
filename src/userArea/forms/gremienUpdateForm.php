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
                    	var urlString = "/praxisprojekt_dbwt/src/userArea/lists/gremien.php";
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

<h2 class="sub-header">Gremium editieren</h2>
<a href="#"
	onclick="$('#right-top').load('/praxisprojekt_dbwt/src/userArea/forms/gremienForm.php');"><span
	class="glyphicon glyphicon-plus" aria-hidden="true">&nbsp;</span>Gremium
	hinzufügen</a>
<br>
<a href="#"
	onclick="$('#right-top').load('/praxisprojekt_dbwt/src/userArea/lists/gremien.php');"><span
	class="glyphicon glyphicon-th-list" aria-hidden="true">&nbsp;</span>Liste
	aller Gremien</a>
<br>
<br>
<?php
session_start ();
$userId = "userIdabcd135";
if (isset ( $_SESSION [$userId] )) {
	if ($_GET ['gid']) {
		$host = "localhost";
		$db = "dbwt";
		$dbuser = "dbuser";
		$dbpass = "test1342";
		
		$conn = new PDO ( 'pgsql:dbname=dbwt;host=localhost;user=dbuser;password=test1342' );
		$query = "SELECT * FROM gremium WHERE gid = " . $_GET ['gid'] . ";";
		$STH = $conn->prepare ( $query );
		
		$STH->execute ();
		$STH->setFetchMode ( PDO::FETCH_CLASS, 'Gremium' );
		$gremium = $STH->fetch ();
		echo "ID: " . $gremium[0] . "<br><br>";
// 		echo "Bisheriger Name: " . $gremium[1] . "<br><br>";
	} else {
		echo "No GID found!";
	}
} else {
	echo "Not logged in!";
}
?>
<div id="formContainer" style="width: 45%;">
	<form
		action="/praxisprojekt_dbwt/src/formActions/addGremium.php?gid=<?php echo $_GET ['gid']; ?>"
		method="post" class="form ajaxForm">
		<label for="name">Name</label> <input type="text" id="name"
			name="name" class="form-control" placeholder="Name" required
			autofocus value="<?php echo $gremium[1]; ?>">
		<!--  -->
		<label for="beschreibung">Beschreibung</label> <input type="text"
			id="beschreibung" name="beschreibung" class="form-control"
			placeholder="Beschreibung" required value="<?php echo $gremium[2]; ?>">
		<!--  --><br>
		<button class="btn btn-lg btn-primary btn-block submitForm"
			type="submit">&nbsp;&nbsp;anlegen</button>
	</form><br><div id="result" style="width:600px;"></div>
</div>