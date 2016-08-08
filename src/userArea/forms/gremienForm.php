
<h2 class="sub-header">Neues Gremium anlegen</h2>
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

<div id="formContainer" style="width: 45%;">
	<form action="/praxisprojekt_dbwt/src/userArea/process/addGremium.php"
		method="post" class="form">
		<label for="name">Name</label> <input type="text" id="name"
			name="name" class="form-control" placeholder="Bezeichnung" required
			autofocus>
		<!--  -->
		<label for="beschreibung">Nachname</label> <input type="text"
			id="beschreibung" name="beschreibung" class="form-control"
			placeholder="Beschreibung" required>
		<!--  -->
		<button class="btn btn-lg btn-primary btn-block submitForm"
			type="submit">&nbsp;&nbsp;anlegen</button>
	</form>
</div>