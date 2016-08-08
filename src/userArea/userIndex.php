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

<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../../lib/bootstrap/js/bootstrap.min.js"></script>

<!-- Bootstrap core CSS -->
<link href="../../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="../../css/dashboard.css" rel="stylesheet">

<!-- <script src="../../lib/jquery-3.1.0.min.js"></script> -->

<script src="../../lib/bootstrap/js/bootstrap.min.js"></script>

<link rel="stylesheet"
	href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

// <?php
$userId = "userIdabcd135";
if (isset ( $_SESSION [$userId] )) {
	echo '<script>
    $(function(){
      $("#navbar").load("/praxisprojekt_dbwt/src/userArea/baseComponents/navbar.php");
      $("#sidebar").load("/praxisprojekt_dbwt/src/userArea/baseComponents/sidebar.html");
      $("#right-top").load("/praxisprojekt_dbwt/src/userArea/overview.php");
    });
    </script>';
} else {
	// user is not logged in and redirected to login-page
	header ( "Location: /praxisprojekt_dbwt/src/index.html" );
	exit ();
}
?>

</head>

<body>
	<div id="navbar"></div>

	<div class="container-fluid">
		<div class="row">
			<div id="sidebar" class="col-sm-3 col-md-2 sidebar"></div>
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				<div id="right-top"></div>
				<?php
				class Badge {
					private $personcount;
					private $gremiumcount;
					private $fachschaftcount;
					private $wahlperiodecount;
					public function __construct() {
						$this->tell ();
					}
					public function tell() {
						echo '<div data-badge="person" style="display:none;">' . $this->personcount . '</div>';
						echo '<div data-badge="gremium" style="display:none;">' . $this->gremiumcount . '</div>';
						echo '<div data-badge="fachschaft" style="display:none;">' . $this->fachschaftcount . '</div>';
						echo '<div data-badge="wahlperiode" style="display:none;">' . $this->wahlperiodecount . '</div>';
					}
				}
				
				$userId = "userIdabcd135";
				if (isset ( $_SESSION [$userId] )) {
					$host = "localhost";
					$db = "dbwt";
					$dbuser = "dbuser";
					$dbpass = "test1342";
					
					$conn = new PDO ( 'pgsql:dbname=dbwt;host=localhost;user=dbuser;password=test1342' );
					
					$query = "SELECT  (
        SELECT COUNT(*)
        FROM   person
        ) AS personcount,
        (
        SELECT COUNT(*)
        FROM   gremium
        ) AS gremiumcount,
		(
        SELECT COUNT(*)
        FROM   fachschaft
        ) AS fachschaftcount,
		(
        SELECT COUNT(*)
        FROM   wahlperiode
        ) AS wahlperiodecount;";
					$STH = $conn->prepare ( $query );
					
					$STH->execute ();
					$STH->setFetchMode ( PDO::FETCH_CLASS, 'Badge' );
					$badge = $STH->fetch ();
				}
				?>				
			</div>
		</div>

</body>
</html>
