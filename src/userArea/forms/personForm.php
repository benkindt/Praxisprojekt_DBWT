<script>

function neueMitgliedschaft(count){
	console.log("called");
	var htmlCode = $("#mitgliedschaft").html();
	$("#neueMitgliedschaften" + count +"").append(htmlCode);
	var input = $("#neueMitgliedschaften" + count +"").children().first().children().first();
	console.log(input);
	var newValue = parseInt(input.val()) + (count-1);
	input.val(newValue);
}
$(document).ready(function () {
	var personCount = 1;
	var persons = 0;
    $("#addOnePerson").on("click", function(e) {
    	personCount++;
		$('<div class="panel panel-default"> <div class="panel-heading"> <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse' + personCount + '">Neue Person ' + personCount + '</a> </h4> </div> <div id="collapse' + personCount + '" class="panel-collapse collapse"> <div class="panel-body"><form id="personForm' + personCount + '" action="/praxisprojekt_dbwt/src/formActions/addPerson.php" method="post" class="form ajaxForm personForms"> <div class"personCount" style="display:none;">' + personCount + '</div><label for="inputEmail">Vorname</label> <input type="text" id="vorname" name="vorname" class="form-control" placeholder="Vorname" required autofocus> <label for="inputPassword">Nachname</label> <input type="text" id="nachname" name="nachname" class="form-control" placeholder="Nachname" required> <label for="inputPassword">Nutzerkennzeichen</label> <input type="text" id="nutzerkennzeichen" name="nutzerkennzeichen" class="form-control" placeholder="Nutzerkennzeichen"> <label for="inputPassword">Matrikelnummer</label> <input type="text" id="matrikelnummer" name="matrikelnummer" class="form-control" placeholder="Matrikelnummer"> </form><br> <a href="#" onclick="neueMitgliedschaft(' + personCount + ');"><span class="glyphicon glyphicon-plus" aria-hidden="true">&nbsp;</span>Mitgliedschaft hinzufügen</a><div id="neueMitgliedschaften' + personCount + '"></div></div></div>').insertBefore("#additionalPersons");
		// persons-int is subtracted from pid in php-scripts
		persons++;
		$("input .personCount").val(personCount);
	    });
    
    $("#addToDatabaseButton").on("click", function(e) {
        var missingInput = false;
        var personTotalCount = 0;
        var mitgliedTotalCount = 0;
        var personSuccessCount = 0;
        var mitgliedSuccessCount = 0;
        
        $("#result").html("");
        $("input").each(function(){
            console.log("input found");
            if( !$(this).val() ) {
                  $(this).css("background-color","#FF9C9C");
                  missingInput = true;
            } else {
            	$(this).css("background-color","#FFFFFF");
            }
        });

        $("select[name=gremium]").each(function(){
            console.log("gremium found");
            console.log($(this).val());
            if( !$(this).val() ) {
                  $(this).css("background-color","#FF9C9C");
                  missingInput = true;
            } else {
            	$(this).css("background-color","#FFFFFF");
            }
        });

        $("select[name=fachschaft]").each(function(){
            console.log("fachschaft found");
            console.log($(this).val());
            if( !$(this).val() ) {
                  $(this).css("background-color","#FF9C9C");
                  missingInput = true;
            } else {
            	$(this).css("background-color","#FFFFFF");
            }
        });

        $("select[name=wahlperiode]").each(function(){
            console.log("wahlperiode found");
            console.log($(this).val());
            if( !$(this).val() ) {
                  $(this).css("background-color","#FF9C9C");
                  missingInput = true;
            } else {
            	$(this).css("background-color","#FFFFFF");
            }
        });
        
        if(!missingInput){
            var iter = 0;
        	$(".ajaxForm").each(function( index2 ) {
        		console.log("catched submit");
        		if(iter > 0){
        			iter++;
        			setTimeout(function(){
            		 }, iter*150);
            	}
            	var thisForm = $(this);
            	e.preventDefault();
                $.ajax({
                    url : $(this).attr('action') || window.location.pathname,
                    type: "POST",
                    data: $(this).serialize(),
                    success: function (data) {
                    	personTotalCount++;
                    	console.log(data);
                    	if(data === "1"){
                    		console.log("person success!");
                        	personSuccessCount++;	
                        }else {
                            console.log("error person");
                        }
//                     	$("#result").html(data);
                    	setTimeout(function(){
                    		thisForm.closest("div .panel-body").find(".mitgliedForm").each(function( index2 ) {
                            	console.log("CALLED MITGLIEDFORM!!!! iter " + iter + " !!!!");
                            	e.preventDefault();
                                console.log("catched submit");
                                $.ajax({
                                    url : $(this).attr('action') || window.location.pathname,
                                    type: "POST",
                                    data: $(this).serialize(),
                                    success: function (data) {
                                    	mitgliedTotalCount++;
                                    	console.log(data);
                                    	if(data === "1"){
                                        	console.log("mitglied success!");
                                    		mitgliedSuccessCount++;
                                        } else {
                                            console.log("error mitglied");
                                           }
//                                     	$("#result").html(data);
                                    },
                                    error: function (jXHR, textStatus, errorThrown) {
                                        alert(errorThrown);
                                    }
                                });
                            });
                			 }, 20);
                    },
                    error: function (jXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                });
            });
            } else {
            	$("#result").html('<div class="alert alert-danger" role="alert">Fehlende Eingabefelder</div>');
            }
        setTimeout(function(){
        	// print out result
    		$("#result").append('<div class="alert alert-info" role="alert">' + mitgliedSuccessCount + ' von ' + mitgliedTotalCount +' Mitgliedschaften erzeugt<br>' + personSuccessCount + ' von ' + personTotalCount +' Personen erzeugt</div>');
        }, 900);
    });
});
</script>

<h2 class="sub-header">Neue Person anlegen</h2>
<a href="#"
	onclick="$('#right-top').load('/praxisprojekt_dbwt/src/userArea/forms/personForm.php');"><span
	class="glyphicon glyphicon-plus" aria-hidden="true">&nbsp;</span>Person
	hinzufügen</a>
<br>
<a href="#"
	onclick="$('#right-top').load('/praxisprojekt_dbwt/src/userArea/lists/person.php');"><span
	class="glyphicon glyphicon-th-list" aria-hidden="true">&nbsp;</span>Liste
	aller Personen</a>
<br>
<div id="result" style="margin-top: 15px; width: 600px;"></div>
<br>

<div id="formContainer" style="width: 45%;">
	<div class="container">
		<div class="panel-group" id="accordion" style="width: 420px;">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion"
							href="#collapse1">Neue Person</a>
					</h4>
				</div>
				<div id="collapse1" class="panel-collapse collapse">
					<div class="panel-body">
						<form id="personForm1"
							action="/praxisprojekt_dbwt/src/formActions/addPerson.php"
							method="post" class="form ajaxForm personForms">
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
							<label for="inputPassword">Matrikelnummer</label> <input
								type="text" id="matrikelnummer" name="matrikelnummer"
								class="form-control" placeholder="Matrikelnummer">
							<!--  -->
						</form>

						<div id="mitgliedschaft">
							<form
								action="/praxisprojekt_dbwt/src/formActions/addMitgliedschaft.php"
								method="post" class="form mitgliedForm">
								<input style="display: none;" type="text" class="personCount"
									name="personCount" value="0"> <br>Gremium: <select
									name="gremium">
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
							</select> <br>Fachschaft: <select name="fachschaft">
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
							</select> <br>Wahlperiode: <select name="wahlperiode">
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
							</select><br>Amtszeit:<br> <label for="von" style="width: 25px;">von</label>
								<input type="text" id="von" name="von" class="datepickers">
								<!--  -->
								<br> <label for="bis" style="width: 25px;">bis</label> <input
									type="text" id="bis" name="bis" class="datepickers"><br> <input
									id="nachrueckerCheckbox" name="nachrueckerCheckbox"
									type="checkbox" value="Yes"> Nachrücker <br> Bemerkung:<br> <input
									type="text" id="bemerkung" name="bemerkung" value="keine">
							</form>
						</div>
						<div id="neueMitgliedschaften"></div>
						<br> <a href="#" onclick="neueMitgliedschaft('');"><span
							class="glyphicon glyphicon-plus" aria-hidden="true">&nbsp;</span>Mitgliedschaft
							hinzufügen</a> <br> <a href="#" onclick=""><span
							class="glyphicon glyphicon-minus" aria-hidden="true">&nbsp;</span>Letzte
							Mitgliedschaft entfernen</a> <br> <a href="#" onclick=""><span
							class="glyphicon glyphicon-minus" aria-hidden="true">&nbsp;</span>Diese
							Person entfernen</a>
					</div>
				</div>
			</div>
			<div id="additionalPersons"></div>
			<br>
			<button id="addToDatabaseButton"
				class="btn btn-lg btn-primary btn-block submitForm" type="button">&nbsp;&nbsp;anlegen</button>
			<a href="#" id="addOnePerson" class="btn btn-primary btn-block">&nbsp;&nbsp;weitere
				Person</a>
		</div>
	</div>
</div>

<!-- <p> -->
<!-- 	Date: <input type="text" class="datepickers"> -->
<!-- </p> -->
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

<link rel="stylesheet"
	href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>