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

<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../../lib/bootstrap/js/bootstrap.min.js"></script>
<link href="../../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../../css/dashboard.css" rel="stylesheet">
<link rel="stylesheet"
	href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

<?php
$userId = "userIdabcd135";
if (isset ( $_SESSION [$userId] )) {
	$host = "localhost";
	$db = "dbwt";
	$dbuser = "dbuser";
	$dbpass = "test1342";
	
	$conn = new PDO ( 'pgsql:dbname=dbwt;host=localhost;user=dbuser;password=test1342' );
	
	$query = "SELECT admin as bool FROM users WHERE email = ?;";
	$STH = $conn->prepare ( $query );
	$STH->bindParam ( 1, $_SESSION [$userId] );
	$STH->execute ();
	$result = $STH->fetch ( PDO::FETCH_ASSOC );
	// check if user already exists
	if ($result ["bool"] == 1) {
		$_SESSION ["admin"] = "Admin";
	}
	// in order to have a cleaner index-backend the main parts are loaded with jquery load()-function
	// later content will be loaded to the right-top-div, this is again done with jquery load()-function
	// this results in no real page reloads as only right-top-div is changed
	// the sidebar and navbar will always remain untouched, see sidebar.html for more details on implementation
	if (isset ( $_SESSION ["admin"] )) {
		echo '<script>
    $(function(){

      $("#sidebar").load("/praxisprojekt_dbwt/src/userArea/baseComponents/sidebar.html");
      $("#right-top").load("/praxisprojekt_dbwt/src/userArea/overview.php");
    });
    </script>';
	} else {
		echo '<script>
    $(function(){

      $("#sidebar").load("/praxisprojekt_dbwt/src/userArea/baseComponents/sidebar2.html");
      $("#right-top").load("/praxisprojekt_dbwt/src/userArea/overview.php");
    });
    </script>';
	}
} else {
	//   $("#navbar").load("/praxisprojekt_dbwt/src/userArea/baseComponents/navbar.php");
	// user is not logged in and redirected to login-page
	header ( "Location: /praxisprojekt_dbwt/src/index.html" );
	exit ();
	//       $("#navbar").load("/praxisprojekt_dbwt/src/userArea/baseComponents/navbar.php");
}
?>

</head>

<body>
	<div id="navbar">
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
					<a class="navbar-brand"
						href="/praxisprojekt_dbwt/src/userArea/userIndex.php"
						style="color: white;">Mitgliederverwaltung Studiengremien</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul style="color: grey;" class="nav navbar-right navbar-brand">
					<?php
					$userId = "userIdabcd135";
					// if (isset ( $_SESSION [$userId] )) {
					// $host = "localhost";
					// $db = "dbwt";
					// $dbuser = "dbuser";
					// $dbpass = "test1342";
					
					// $conn = new PDO ( 'pgsql:dbname=dbwt;host=localhost;user=dbuser;password=test1342' );
					
					// // user=' + $user + ';password=' + $pass + ';');
					// $query = "SELECT admin FROM users WHERE email ='" . $_SESSION [$userId] . "';";
					// $STH = $conn->prepare ( $query );
					
					// $STH->execute ();
					
					// while ( ($result = $STH->fetch ( PDO::FETCH_ASSOC )) !== false ) {
					// $result[admin];
					// }
					// }
					
					if (isset ( $_SESSION [$userId] )) {
						if (isset ( $_SESSION ["admin"] )) {
							echo "Willkommen " . $_SESSION [$userId] . " (Admin)";
						} else {
							echo "Willkommen " . $_SESSION [$userId] . "";
						}
					} else {
						// user is not logged in and redirected to login-page
						header ( "Location: /praxisprojekt_dbwt/src/index.html" );
						exit ();
					}
					?>&nbsp;<a style="color: grey;"
							onMouseOver="this.style.color='#0F0'"
							onMouseOut="this.style.color='grey'" href="../index.php">Logout</a>
					</ul>
				</div>
			</div>
		</nav>

	</div>

	<div class="container-fluid">
		<div class="row">
			<div id="sidebar" class="col-sm-3 col-md-2 sidebar"></div>
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				<div id="right-top"></div>
				<?php
				// queries how many elements are in the db, later the numbers in the resulting divs will be processed
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
