<?php
session_start ();
?>
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
