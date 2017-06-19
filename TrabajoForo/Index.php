<!DOCTYPE html>
<html>
<head>
	<link rel="Stylesheet" href="css/estilo.css"/>
	
	<title>Bienvenido</title>
</head>



<body>
<div class="contenedor">
<form name="formIndex" id="formIndex" method="post" action="validar_registro.php">
	<div>
		<div>
		<label >Usuario:</label>
		 <input type="text" id="usuario" name="usuario">
		</div>
		<div>
           <label>Contraseña:</label>
		 <input type="text" id="clave" name="clave">
		</div>
		<div id="reg">
		<a href="registrar.php">Registrate aqui</a>
		<input class="boton" type="submit" id="ingresar" name="ingresar">
		</div>
	</div>
</form>
</div>
</body>
</html>