<script>$(document).ready(function () {
    $('.ajaxForm').on('submit', function(e) {
        e.preventDefault();
        console.log("catched submit");
        $.ajax({
            url : $(this).attr('action') || window.location.pathname,
            type: "POST",
            data: $(this).serialize(),
            success: function (data) {
            	$("#result").html(data);
            	if($("div").hasClass("alert-success")){
                	setTimeout(function(){ 
                    	var urlString = "/praxisprojekt_dbwt/src/userArea/lists/gremien.php";
        				$("#right-top").load(urlString);
        			 }, 2500);
                }
            },
            error: function (jXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });
});</script>

<h2 class="sub-header">Neues Gremium anlegen</h2>
<a href="#"
	onclick="$('#right-top').load('/praxisprojekt_dbwt/src/userArea/forms/gremienForm.php');"><span
	class="glyphicon glyphicon-plus" aria-hidden="true">&nbsp;</span>Gremium
	hinzufügen</a>
<br>
<a href="#"
	onclick="$('#right-top').load('/praxisprojekt_dbwt/src/userArea/lists/gremien.php');"><span
	class="glyphicon glyphicon-th-list" aria-hidden="true">&nbsp;</span>Liste
	aller Gremien</a>
<br>
<br>

<div id="formContainer" style="width: 45%;">
	<form action="/praxisprojekt_dbwt/src/formActions/addGremium.php"
		method="post" class="form ajaxForm">
		<label for="name">Name</label> <input type="text" id="name"
			name="name" class="form-control" placeholder="Bezeichnung" required
			autofocus>
		<!--  -->
		<label for="beschreibung">Beschreibung</label> <input type="text"
			id="beschreibung" name="beschreibung" class="form-control"
			placeholder="Beschreibung" required>
		<!--  --><br>
		<button class="btn btn-lg btn-primary btn-block submitForm"
			type="submit">&nbsp;&nbsp;anlegen </button>
	</form><br><div id="result" style="width:600px;"></div>
</div>