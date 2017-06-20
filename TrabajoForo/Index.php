<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="fotos/icono.ico">
    <meta charset="utf-8"> 
	<link rel="Stylesheet" href="css/estilo.css"/>
	<script type="text/javascript" src="js/sweetalert.min.js"></script>
    <script type="text/javascript" src="js/validar_form1.js"></script>
     <link rel="stylesheet" rel="stylesheet" type="text/css" href="css/sweetalert.css">
	<title>Bienvenido</title>
</head>



<body>
<div class="contenedor">
<form name="formIndex" id="formIndex" method="post" action="validar_registro.php" onsubmit="return valida();">
	<div>
		<div>
		<label >Usuario:</label>
		 <input type="text" id="usuario" maxlength="10" name="usuario">
		</div>
		<div>
           <label>Contraseña:</label>
		 <input type="password" id="clave" maxlength="15" name="clave">
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