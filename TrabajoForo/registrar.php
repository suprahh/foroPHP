<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="fotos/icono.ico">
    <meta charset="utf-8"> 
	<link rel="Stylesheet" href="css/estilo.css"/>
	<script type="text/javascript" src="js/sweetalert.min.js"></script>
    <script type="text/javascript" src="js/validar_registro.js"></script>
     <link rel="stylesheet" rel="stylesheet" type="text/css" href="css/sweetalert.css">
	<title>Registro</title>
	
</head>
<?php
				$mysqli = new mysqli('localhost','root','','forowebphp');
                
				if (isset($_POST['agregar'])) {
					$user = $_POST['usuario'];
					$clave = $_POST['clave'];
					$nombre = $_POST['nombre'];
					$apellido = $_POST['apellido'];
					$foto = $_FILES['foto']['name'];
					$nacionalidad = $_POST['naci'];
					$query = "INSERT INTO `usuario`(`Id_User`, `Usuario`, `Clave`, `Nombre`, `Apellido`, `Imagen`, `Nacionalidad_user`, `Privilegio`) VALUES (null,'$user','$clave','$nombre','$apellido','$foto','$nacionalidad','0')";
					$agregar = $mysqli->query($query);
				
				}
	?>
<body>
<?php	
                   if (isset($_POST['agregar'])) {
                   if (!$agregar) {
					    echo  "<script type='text/javascript'>swal('error al registrar') ;</script>"; 
					}
					else
					{
						move_uploaded_file($_FILES['foto']['tmp_name'],"fotos/".$_FILES['foto']['name']);
						 echo  "<script type='text/javascript'>swal('se ha registrado') ;</script>"; 
						
					}
				}
?>					


<div class="contenedor">
<form name="formRegistro" id="formRegistro" method="post" action="registrar.php" enctype="multipart/form-data" onsubmit="return validar();">
	<div>
		<div>
		<label>Usuario:</label>
		 <input type="text" id="usuario" name="usuario">
		</div>
	
		<div>
           <label>Clave :</label>
		 <input type="text" id="clave" name="clave">
		</div>
		<div>
           <label>Re-Clave :</label>
		 <input type="text" id="reClave" name="reClave">
		</div>
		<div>
           <label>Nombre :</label>
		 <input type="text" id="nombre" name="nombre">
		</div>
		<div>
           <label>Apellido :</label>
		 <input type="text" id="apellido" name="apellido">
		</div>
		<div>
           <label>Foto :</label>
		 <input type="file" id="foto"  name="foto" value="Selecciona una avatar">
		</div>
		<div>
           <label>Nacionalidad :</label>
			 <select name="naci">
		   		   <?php   
		   		  $query = "select * from nacionalidad";
		   		  $listado = $mysqli->query($query);
		   		  while ($nomNacio = $listado->fetch_array() ) {
		   				
		                echo ("<option value='".$nomNacio['Id']."' >".$nomNacio['Nombre']."</option>");
                  }
  				   ?>
  			 </select> 
		   
		</div>
		<div id="reg">
		<input class="boton" type="submit" id="agregar" name="agregar" value="Registrar">
		<a id="login" href="index.php">Login</a>
		</div>
	</div>
</form>
</div>
</body>
</html>