<h2 class="sub-header">Suchfunktion</h2>
<div style="width: 250px;">

	<!--  -->
	<br> <br>

	<div class="container">
		<div class="panel-group" id="accordion">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion"
							href="#collapse1">Suche über Namen</a>
					</h4>
				</div>
				<div id="collapse1" class="panel-collapse collapse">
					<div class="panel-body">
						<form action="formActions/searchForm.php" method="post"
							class="form-signin" style="width: 190px;">
							<label for="vorname">Vorname</label> <input type="text"
								id="vorname" name="vorname" class="form-control"
								placeholder="Vorname" autofocus>
							<!--  -->
							<label for="nachname">Nachname</label> <input type="text"
								id="nachname" name="nachname" class="form-control"
								placeholder="Nachname"><br>
							<button class="btn btn-primary btn-block" type="submit" style="width: 150px;">
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
						<form action="formActions/searchForm.php" method="post"
							class="form-signin" style="width: 65%;"><select name="Icecream Flavours">
							<option selected disabled hidden style='display: none' value=''></option>
							<option value="double chocolate">Double Chocolate</option>
						</select><br><br><button class="btn btn-primary btn-block" type="submit" style="width: 150px;">
								<span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;Suchen
							</button></form>
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
						<form action="formActions/searchForm.php" method="post"
							class="form-signin" style="width: 65%;"><select name="Icecream Flavours">
							<option selected disabled hidden style='display: none' value=''></option>
							<option value="double chocolate">Double Chocolate</option>
						</select><br><br><button class="btn btn-primary btn-block" type="submit" style="width: 150px;">
								<span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;Suchen
							</button></form>
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
						<form action="formActions/searchForm.php" method="post"
							class="form-signin" style="width: 65%;"><select name="Icecream Flavours">
							<option selected disabled hidden style='display: none' value='none'></option>
							<option value="double chocolate">Double Chocolate</option>
						</select><br><br><button class="btn btn-primary btn-block" type="submit" style="width: 150px;">
								<span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;Suchen
							</button></form>
					</div>
				</div>
			</div>
		</div>
	</div>


</div>
