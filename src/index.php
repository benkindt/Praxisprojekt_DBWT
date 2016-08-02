<?php 
session_start();
session_destroy(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="">
<meta name="author" content="">

<title>Mitgliederverwaltung</title>

<!-- Bootstrap core CSS -->
<link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="../css/test.css" rel="stylesheet">
</head>

<body>

	<div class="container">
		<h3 align="center">Mitgliederverwaltung Studiengremien</h3>
		<form action="formActions/loginForm.php" method="post"
			class="form-signin">
			<h2 class="form-signin-heading">Login</h2>
			<label for="inputEmail" class="sr-only">Email-Addresse</label> <input
				type="email" id="inputEmail" name="inputEmail" class="form-control"
				placeholder="Email" required autofocus> <label
				for="inputPassword" class="sr-only">Passwort</label> <input
				type="password" id="inputPassword" name="inputPassword"
				class="form-control" placeholder="Passwort" required>
			<div class="checkbox" style="display: none;">
				<label> <input type="checkbox" value="remember-me">
					Remember me
				</label>
			</div>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Anmelden</button>
			<h4 align="center">oder</h4>
			<a href="register.html" class="btn btn-lg btn-primary btn-block">Neu
				registrieren</a>
		</form>
	</div>
	<!-- /container -->

</body>
</html>