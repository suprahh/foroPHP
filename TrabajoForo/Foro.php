<!DOCTYPE html>
<html>
<head>
	<title>Foro</title>
</head>
<?php 

 $mysqli = new mysqli('localhost','root','','forowebphp');
  if (isset($_POST['usuario']) && isset($_POST['clave'])) {
  	$usuario = $_POST['usuario'];
  	$clave = $_POST['clave'];
	$query = "select * from usuario where Usuario = '$usuario' and Clave = '$clave'";
	$buscar = $mysqli->query($query);
	$numero = $buscar->num_rows;
	 if ($numero==0) {
		header('Location: http://localhost/TrabajoForo/');
	}
	else
	{
		session_start();
		$_SESSION["usuario"] = $usuario;
	}      
  }

  if (isset($_POST['publicacion'])) {

     if (empty($_SESSION["usuario"])) {
         session_start();
      }  
      $usuario =$_SESSION["usuario"];
      $dt = time();
      $hoy = strftime("%Y-%m-%d %H:%M:%S", $dt);
      $publicacion = $_POST['publicacion'];
      $id = 0;

      $query = "select * from usuario where usuario = '$usuario'";
      $listado = $mysqli->query($query);
      if ( !$listado) {
      	echo "error listar el usuario";
      }
      else
      {
      	 while($registro = $listado->fetch_array())
	   {
           $id =   $registro['Id_User'];
       }
      }
      $query = "insert into publicacion values (null, '$hoy', '$publicacion', '$id')";
      $agregar = $mysqli->query($query);
					if (!$agregar) {
					    echo "Error de almacenamiento";
					}
					else
					{
						echo "se agrego correctamente";
					}
				 }
      ?>
<body>
<form name="formForo" id="formForo" method="post" action="Foro.php">
	<div>
	     <a href="index.php">Salir</a>
	     <label"><?php echo $_SESSION['usuario'] ?></label>
	</div>
	<div>
           <?php  
               $sql = "select usuario.Usuario, usuario.Imagen, publicacion.Contenido,publicacion.Fecha from publicacion inner join usuario on publicacion.Id_User = usuario.Id_User";
               //SELECT usuario.Usuario, usuario.Imagen, publicacion.Contenido, publicacion.Fecha FROM publicacion INNER JOIN usuario on publicacion.Id_User = usuario.Id_User 
               $listado = $mysqli->query($sql);
               while ($registro = $listado->fetch_array()) {
               	   ?>
               	   <div>
                  <span>Publicado a las : <?php echo $registro['Fecha'] ?> por : <?php echo $registro['Usuario'] ?> </span>
                   <p><?php echo $registro['Contenido']; ?></p>
                   </div>
             <?php  } ?>
           
	</div>
	<div>
          <textarea name="publicacion" rows="4" cols="50">Escribe una publicacion <?php echo $_SESSION['usuario']  ?> .. . .</textarea>
          <input type="submit" name="publicar" value="publicar"> 
	</div>
</form>
</body>
</html>