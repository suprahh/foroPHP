<!DOCTYPE html>
<html>
<head>
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
					$query = "insert into usuario values (null,'$user','$clave','$nombre', '$apellido', '$foto', '$nacionalidad') ";
					$agregar = $mysqli->query($query);
					if (!$agregar) {
					    echo "Error de almacenamiento";
					}
					else
					{
						move_uploaded_file($_FILES['foto']['tmp_name'],"fotos/".$_FILES['foto']['name']);
						
					}
				}
	?>
<body>
<form name="formRegistro" id="formRegistro" method="post" enctype="multipart/form-data">
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
		 <input type="file" id="foto" name="foto" value="Selecciona una avatar">
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
		<div>
		<input type="submit" id="agregar" name="agregar" value="Registrar">
		
		</div>
	</div>
</form>
</body>
</html>