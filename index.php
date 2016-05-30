<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Ajax php</title>
	<link rel="stylesheet" href="css/material.min.css">
	<script src="js/jquery-1.11.2.min.js"></script>
	<script src="js/SendForm.js"></script>
	<script src="js/material.min.js"></script>
</head>
<body>
	<div class="mdl-grid">
		<div class="mdl-cell--4-col-phone mdl-cell--8-col-table mdl-cell--6-col-desktop mdl-cell--3-offset-desktop">
			<form action="php/proceso.php" method="POST" class="AjaxForm">
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<input class="mdl-textfield__input" type="text" name="Nombre">
					<label class="mdl-textfield__label">Nombre</label>
				</div>
				<br><br>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<input class="mdl-textfield__input" type="text" name="Apellido">
					<label class="mdl-textfield__label">Apelllido</label>
				</div>
				<br><br>
				<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
				 	Enviar datos
				</button>
			</form>
		</div>
	</div>
	<div class="msjRespuesta"></div>
</body>
</html>