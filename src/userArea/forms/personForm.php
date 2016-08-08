<h2 class="sub-header">Neue Person anlegen</h2>
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

<div id="formContainer" style="width: 45%;">
	<form action="/praxisprojekt_dbwt/src/formActions/addPerson.php"
		method="post" class="form">
		<label for="inputEmail">Vorname</label> <input type="text"
			id="vorname" name="vorname" class="form-control"
			placeholder="Vorname" required autofocus>
		<!--  -->
		<label for="inputPassword">Nachname</label> <input type="text"
			id="nachname" name="nachname" class="form-control"
			placeholder="Nachname" required>
		<!--  -->
		<label for="inputPassword">Nutzerkennzeichen</label> <input
			type="text" id="nutzerkennzeichen" name="nutzerkennzeichen"
			class="form-control" placeholder="Nutzerkennzeichen">
		<!--  -->
		<label for="inputPassword">Matrikelnummer</label> <input type="text"
			id="matrikelnummer" name="matrikelnummer" class="form-control"
			placeholder="Matrikelnummer">
		<!--  --><br><br>
		<button class="btn btn-lg btn-primary btn-block submitForm"
			type="submit">&nbsp;&nbsp;anlegen</button>
		<a href="#" class="btn btn-primary btn-block">&nbsp;&nbsp;weitere
			Person</a>
	</form>
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