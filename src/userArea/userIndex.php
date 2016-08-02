<?php
session_start ();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="../../favicon.ico">

<title>Mitgliederverwaltung</title>

<!-- Bootstrap core CSS -->
<link href="../../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="../../css/dashboard.css" rel="stylesheet">

<script src="../../lib/jquery-3.1.0.min.js"></script>

<script src="../../lib/bootstrap/js/bootstrap.min.js"></script>

<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
	<script src="../../lib/bootstrap/js/bootstrap.min.js"></script>

<script>
    $(function(){
      $("#sidebar").load("baseComponents/sidebar.html");
      $("#right-top").load("baseComponents/accordion.html");
    });
    </script>
</head>

<body>

	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed"
					data-toggle="collapse" data-target="#navbar" aria-expanded="false"
					aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#" style="color: white;">Mitgliederverwaltung
					Studiengremien</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul style="color:grey; hover" class="nav navbar-right navbar-brand">
					<?php
					$userId = "userIdabcd135";
					if (isset ( $_SESSION [$userId] )) {
						echo "Willkommen " . $_SESSION [$userId] . " (" . $_SESSION ["admin"] . ")";
					} else {
						// user is not logged in and redirected to login-page
						header ( "Location: ../index.html" );
						exit ();
					}
					?>&nbsp;<a style="color: grey;" onMouseOver="this.style.color='#0F0'"
   onMouseOut="this.style.color='grey'" href="../index.php">Logout</a>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container-fluid">
		<div class="row">
			<div id="sidebar" class="col-sm-3 col-md-2 sidebar"></div>
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				<!-- 				<h1 class="page-header">Suchfunktion</h1> -->
				
				<h2 class="sub-header">Suchergebnis</h2>
				<div id="right-top"></div>

		</div>
	</div>

</body>
</html>
