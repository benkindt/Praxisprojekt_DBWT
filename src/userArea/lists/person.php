<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>jQuery UI Datepicker - Default functionality</title>
<link rel="stylesheet"
	href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

</head>
<body>
	<h2 class="sub-header">Liste aller Personen</h2>
	<a href="#"><span class="glyphicon glyphicon-plus" aria-hidden="true">&nbsp;</span>Person
		hinzufügen</a>
	<br><br>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Username</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th scope="row">1</th>
				<td>Mark</td>
				<td>Otto</td>
				<td>@mdo</td>
			</tr>
			<tr>
				<th scope="row">2</th>
				<td>Jacob</td>
				<td>Thornton</td>
				<td>@fat</td>
			</tr>
			<tr>
				<th scope="row">3</th>
				<td>Larry</td>
				<td>the Bird</td>
				<td>@twitter</td>
			</tr>
		</tbody>
	</table>
	<br>
	<div id="formContainer" style="width: 45%;">
		<form action="/praxisprojekt_dbwt/src/userArea/process/addPerson.php"
			method="post" class="form">
			<h2 class="sub-header">Neue Person anlegen</h2>
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
			<!--  -->
			<button class="btn btn-lg btn-primary btn-block submitForm"
				type="submit">&nbsp;&nbsp;anlegen</button>
			<a href="#" class="btn btn-primary btn-block">&nbsp;&nbsp;weitere
				Person</a>
		</form>
	</div>
	<p>
		Date: <input type="text" class="datepickers">
	</p>
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

</body>
</html>
