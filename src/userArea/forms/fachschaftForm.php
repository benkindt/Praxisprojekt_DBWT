<h2 class="sub-header">Neue Fachschaft anlegen</h2>
<a href="#" onclick="$('#right-top').load('/praxisprojekt_dbwt/src/userArea/forms/fachschaftForm.php');"><span class="glyphicon glyphicon-plus" aria-hidden="true">&nbsp;</span>Fachschaft
	hinzufügen</a>
<br>
<a href="#" onclick="$('#right-top').load('/praxisprojekt_dbwt/src/userArea/lists/fachschaft.php');"><span class="glyphicon glyphicon-th-list" aria-hidden="true">&nbsp;</span>Liste
	aller Fachschaften</a>
<br>
<br>

<div id="formContainer" style="width: 45%;">
	<form action="/praxisprojekt_dbwt/src/formActions/addFachschaft.php"
		method="post" class="form">
		<label for="name">Name</label> <input type="text" id="name"
			name="name" class="form-control" placeholder="Bezeichnung" required
			autofocus>
		<!--  --><br>
		<button class="btn btn-lg btn-primary btn-block submitForm"
			type="submit">&nbsp;&nbsp;anlegen</button>
	</form>
</div>