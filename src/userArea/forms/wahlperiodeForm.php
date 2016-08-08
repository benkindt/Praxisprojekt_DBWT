<input type="text" id="bvs" name="bvs"
			class="datepickers">
<div id="formContainer" style="width: 45%;">
	<form
		action="/praxisprojekt_dbwt/src/userArea/process/addWahlperiode.php"
		method="post" class="form">
		<h2 class="sub-header">Neue Wahlperiode anlegen</h2>
		<label for="von">von</label> <input type="text" id="von" name="von"
			class="datepickers">
		<!--  -->
		<label for="bis">bis</label> <input type="text" id="bis" name="bis"
			class="datepickers">
		<!--  -->
		<button class="btn btn-lg btn-primary btn-block submitForm"
			type="submit">&nbsp;&nbsp;anlegen</button>
	</form>
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