<script>
 	$(document).ready(function(){
		$("li").click(function(  ) {
			var dataValue = $(this).attr("data-value");
			if(!!dataValue){
				var urlString = "/praxisprojekt_dbwt/src/userArea/lists/" + dataValue;
				$("#right-top").load(urlString); onclick="loadList('gremien.php')"
			}
			$("li").removeClass("active");
			$(this).addClass("active");
		});
	});
</script>
<h2 class="sub-header">Übersicht</h2>
<?php echo ""; ?>
<br><h5>
Die Weboberfläche bietet die Möglichkeit
zum Anzeigen, Erstellen und Editieren von:
</h5>
<ul>
	<li data-value="person"><a href="#">Personen</a></li>
	<li data-value="gremien"><a href="#">Gremien</a></li>
	<li data-value="fachschaft"><a href="#">Fachschaften</a></li>
	<li data-value="wahlperiode"><a href="#">Wahlperioden</a></li>
	<li>sowie eine <a href="#"
		onclick="$('#right-top').load('/praxisprojekt_dbwt/src/userArea/search.php');">Suchfunktion</a></li>
</ul>
<h6>Wobei zum Erstellen und Editieren Administratorrechte notwendig sind.
<br>
Falls Administratorrechte vorliegen, ist dies hinter der Email-Adresse in der rechten oberen Ecke sichtbar.</h6>