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
                    	var urlString = "/praxisprojekt_dbwt/src/userArea/lists/wahlperiode.php";
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

<h2 class="sub-header">Neue Wahlperiode anlegen</h2>
<a href="#" onclick="$('#right-top').load('/praxisprojekt_dbwt/src/userArea/forms/wahlperiodeForm.php');"><span class="glyphicon glyphicon-plus" aria-hidden="true">&nbsp;</span>Wahlperiode
	hinzufügen</a>
<br>
<a href="#" onclick="$('#right-top').load('/praxisprojekt_dbwt/src/userArea/lists/wahlperiode.php');"><span class="glyphicon glyphicon-th-list" aria-hidden="true">&nbsp;</span>Liste
	aller Wahlperioden</a>
<br>
<br>

<div id="formContainer" style="width: 45%;">
	<form
		action="/praxisprojekt_dbwt/src/formActions/addWahlperiode.php"
		method="post" class="form ajaxForm">
		<label for="von">von</label> <input type="text" id="von" name="von"
			class="datepickers">
		<!--  -->
		<label for="bis">bis</label> <input type="text" id="bis" name="bis"
			class="datepickers">
		<!--  --><br><br>
		<button class="btn btn-lg btn-primary btn-block submitForm"
			type="submit">&nbsp;&nbsp;anlegen</button>
	</form><br><div id="result" style="width:600px;"></div>
</div>

<link rel="stylesheet"
	href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
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