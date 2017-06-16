<!DOCTYPE html>
<html>
<head>
	<title>Foro</title>
</head>
<?php 

 $mysqli = new mysqli('localhost','root','','forowebphp');
      if (empty($_SESSION["usuario"])) {
         session_start();

      } 


  if (isset($_POST['publicacion'])) {

    
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

         if(isset($_GET['id']))
          {
          $id = $_GET['id'];
          $sql = "delete from publicacion where Id = '$id' ";
         $eliminar = $mysqli->query($sql);
        if(!$eliminar)
         { echo "Error al eliminar";}
         }
       
      ?>
<body>
<form name="formForo" id="formForo" method="post" action="Foro.php">
	<div>
	     <a href="index.php">Salir</a>
	     <label"><?php echo "bienvenido ".$_SESSION['usuario'] ;?> </label>
       <label><?php 
           if ($_SESSION['privilegio']==1) {
             echo "<a href='mantenedor.php' >Usuarios</a>";
           }
           else{
             echo "Disfruta nuestro foro";
           }
       ?></label>
	</div>
	<div>
           <?php  
               $sql = "select usuario.Usuario, usuario.Imagen, publicacion.Contenido,publicacion.Fecha, publicacion.Id from publicacion inner join usuario on publicacion.Id_User = usuario.Id_User";
               $listado = $mysqli->query($sql);
               while ($registro = $listado->fetch_array()) {
               	   ?>
               	   <div>
                  <img  src="fotos/<?php echo $registro['Imagen']; ?>" style="width: 50px; border-radius: 25px;">
                  <span>Publicado a las : <?php echo $registro['Fecha'] ?> por : <?php echo $registro['Usuario'] ?> </span>
                   <?php if ($_SESSION['privilegio']==1) {?>
                       <a href="Foro.php? id=<?php echo $registro['Id']; ?>"> Eliminar </a>
                    <?php } ?>
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