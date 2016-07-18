<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Titel</title>
</head>
<body>
	<script src="../lib/jquery-3.1.0.min.js"></script>

	<div id="wrapper" style="margin: auto; width: 90%;">
		<h2>Mitgliederverwaltung
			Studiengremien</h2>
		<div id="login" style="width: 250px; float: left;">
			<h3>Login</h3>
			<form action="uploadFiles.php" method="post"
				enctype="multipart/form-data">
				<p>
					Username:<br> <input name="groundTruth" type="text" size="20">
				</p>
				<div id="importedGt" style="display: none;"></div>
				<p>
					Passwort:<br> <input name="detectedPoints" type="text" size="20">
				</p>
				<div id="importedDt" style="display: none;"></div>
				<button type="submit">einloggen</button>
			</form>
		</div>
		<div id="register" style="width: 250px; float: left;">
			<h3>Registrieren</h3>
			<p>
				<button type="button">Registrieren</button>
			</p>
		</div>
	</div>

</body>
</html>