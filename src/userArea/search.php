<script>$(document).ready(function () {
    $('.searchButton').on('submit', function(e) {
        e.preventDefault();
        console.log("catched submit");
        $.ajax({
            url : $(this).attr('action') || window.location.pathname,
            type: "POST",
            data: $(this).serialize(),
            success: function (data) {
                $("#right-top").html(data);
            },
            error: function (jXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });
});</script>

<h2 class="sub-header">Suchfunktion</h2>
<div style="width: 250px;">

	<!--  -->
	<br> <br>

	<div class="container">
		<div class="panel-group" id="accordion" style="width: 420px;">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion"
							href="#collapse1">Suche über Namen</a>
					</h4>
				</div>
				<div id="collapse1" class="panel-collapse collapse">
					<div class="panel-body">
						<form action="../formActions/searchByName.php" method="post"
							class="form-signin searchButton" style="width: 190px;">
							<label for="vorname">Vorname</label> <input type="text"
								id="vorname" name="vorname" class="form-control"
								placeholder="Vorname" autofocus>
							<!--  -->
							<label for="nachname">Nachname</label> <input type="text"
								id="nachname" name="nachname" class="form-control"
								placeholder="Nachname"><br>
							<button class="btn btn-primary btn-block" type="submit"
								style="width: 150px;">
								<span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;Suchen
							</button>
						</form>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion"
							href="#collapse2">Suche über Wahlperiode</a>
					</h4>
				</div>
				<div id="collapse2" class="panel-collapse collapse">
					<div class="panel-body">
						<form action="../formActions/searchByWahlperiode.php" method="post"
							class="form-signin searchButton" style="width: 65%;">
							<select name="wahlperiode">
								<option selected disabled hidden style='display: none' value=''></option>
								<?php
								session_start ();
								class Wahlperiode {
									private $wid;
									private $von;
									private $bis;
									public function __construct() {
										$this->tell ();
									}
									public function tell() {
										echo '<option value="' . $this->wid . '">' . $this->von . ' - ' . $this->bis . '</option>';
									}
									public function name() {
										echo $this->name;
									}
								}
								
								$userId = "userIdabcd135";
								if (isset ( $_SESSION [$userId] )) {
									$host = "localhost";
									$db = "dbwt";
									$dbuser = "dbuser";
									$dbpass = "test1342";
									
									$conn = new PDO ( 'pgsql:dbname=dbwt;host=localhost;user=dbuser;password=test1342' );
									
									// user=' + $user + ';password=' + $pass + ';');
									$query = "SELECT * FROM wahlperiode ORDER BY wid;";
									$STH = $conn->prepare ( $query );
									
									$STH->execute ();
									$STH->setFetchMode ( PDO::FETCH_CLASS, 'Wahlperiode' );
									while ( ($STH->fetch ( PDO::FETCH_CLASS )) !== false ) {
										$wahlperiode = $STH->fetch ();
									}
								}
								?>
							</select><br> <br>
							<button class="btn btn-primary btn-block" type="submit"
								style="width: 150px;">
								<span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;Suchen
							</button>
						</form>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion"
							href="#collapse3">Suche über Gremium</a>
					</h4>
				</div>
				<div id="collapse3" class="panel-collapse collapse">
					<div class="panel-body">
						<form action="../formActions/searchByGremium.php" method="post"
							class="form-signin searchButton" style="width: 65%;">
							<select name="gremium">
								<option selected disabled hidden style='display: none' value=''></option>
								<?php
								session_start ();
								class Gremium {
									private $gid;
									private $name;
									public function __construct() {
										$this->tell ();
									}
									public function tell() {
										echo '<option value="' . $this->gid . '">' . $this->name . '</option>';
									}
									public function name() {
										echo $this->name;
									}
								}
								
								$userId = "userIdabcd135";
								if (isset ( $_SESSION [$userId] )) {
									$host = "localhost";
									$db = "dbwt";
									$dbuser = "dbuser";
									$dbpass = "test1342";
									
									$conn = new PDO ( 'pgsql:dbname=dbwt;host=localhost;user=dbuser;password=test1342' );
									
									// user=' + $user + ';password=' + $pass + ';');
									$query = "SELECT * FROM gremium ORDER BY gid;";
									$STH = $conn->prepare ( $query );
									
									$STH->execute ();
									$STH->setFetchMode ( PDO::FETCH_CLASS, 'Gremium' );
									while ( ($STH->fetch ( PDO::FETCH_CLASS )) !== false ) {
										$gremium = $STH->fetch ();
									}
								}
								?>
							</select><br> <br>
							<button class="btn btn-primary btn-block" type="submit"
								style="width: 150px;">
								<span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;Suchen
							</button>
						</form>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion"
							href="#collapse4">Suche über Fachschaft</a>
					</h4>
				</div>
				<div id="collapse4" class="panel-collapse collapse">
					<div class="panel-body">
						<form action="../formActions/searchByFachschaft.php" method="post"
							class="form-signin searchButton" style="width: 65%;">
							<select name="fachschaft">
								<option selected disabled hidden style='display: none'
									value='none'></option>
								<?php
								session_start ();
								class Fachschaft {
									private $fid;
									private $name;
									public function __construct() {
										$this->tell ();
									}
									public function tell() {
										echo '<option value="' . $this->fid . '">' . $this->name . '</option>';
									}
									public function name() {
										echo $this->name;
									}
								}
								
								$userId = "userIdabcd135";
								if (isset ( $_SESSION [$userId] )) {
									$host = "localhost";
									$db = "dbwt";
									$dbuser = "dbuser";
									$dbpass = "test1342";
									
									$conn = new PDO ( 'pgsql:dbname=dbwt;host=localhost;user=dbuser;password=test1342' );
									
									// user=' + $user + ';password=' + $pass + ';');
									$query = "SELECT * FROM fachschaft ORDER BY fid;";
									$STH = $conn->prepare ( $query );
									
									$STH->execute ();
									$STH->setFetchMode ( PDO::FETCH_CLASS, 'Fachschaft' );
									while ( ($STH->fetch ( PDO::FETCH_CLASS )) !== false ) {
										$fachschaft = $STH->fetch ();
									}
								}
								?>
							</select><br> <br>
							<button class="btn btn-primary btn-block" type="submit"
								style="width: 150px;">
								<span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;Suchen
							</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


</div>
