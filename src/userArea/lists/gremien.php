
<h2 class="sub-header">Liste aller Gremien</h2>
<a href="#"><span class="glyphicon glyphicon-plus" aria-hidden="true">&nbsp;</span>Gremium
	hinzufügen</a>
<br>
<br>
<div id="formContainer" style="width: 45%;">
	<form action="/praxisprojekt_dbwt/src/userArea/process/addGremium.php"
		method="post" class="form">
		<h2 class="sub-header">Neues Gremium anlegen</h2>
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
