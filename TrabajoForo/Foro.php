<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="fotos/icono.ico">
 <meta charset="utf-8"> 
  <script type="text/javascript" src="js/sweetalert.min.js"></script>
  <script type="text/javascript" src="js/validar_form1.js"></script>
  <link rel="Stylesheet"  type="text/css" href="css/estilo.css"/>
  <link rel="stylesheet" rel="stylesheet" type="text/css" href="css/sweetalert.css">

	<title>Foro</title>
</head>

<?php 

 $mysqli = new mysqli('localhost','root','','forowebphp');

      if (empty($_SESSION["usuario"])) {
         session_start();

      } 


  if (isset($_POST['publicacion'])) {

    if ($_POST['publicacion']!="") {
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
         }
    }
?>
<body>
<div class="contenedorGeneral">
<form name="formForo" id="formForo" method="post" action="Foro.php">
<?php 
   if(isset($_GET['id']))
          {
          $id = $_GET['id'];
          $sql = "delete from publicacion where Id = '$id' ";
         $eliminar = $mysqli->query($sql);
        if(!$eliminar)
         { echo "Error al eliminar";}
             else
        {  echo  "<script type='text/javascript'>swal('se elimino correctamente') ;</script>";   }
         }
        

    if (isset($_POST['publicacion'])) {

    if ($_POST['publicacion']=="") {
        echo  "<script type='text/javascript'>swal('no puedes publicar algo vacio') ;</script>"; 
    }
  }
  ?>
	<div id="Menu">
	     
	     <label id="b1"><?php echo "Bienvenido <span class='colorW'>".$_SESSION['usuario']."</span>"   ;?> </label>
       <label id="b1"><?php 
           if ($_SESSION['privilegio']==1) {
             echo "<a href='mantenedor.php' >Usuarios</a>";
           }
           else{
             echo "Disfruta nuestro foro";
           }
       ?></label>
       <a  href="index.php">Salir</a>
	</div>
	<div id="publicaciones">
  <div class="posteo">
 
           <?php  
               $sql = "select usuario.Usuario, usuario.Imagen, publicacion.Contenido,publicacion.Fecha, publicacion.Id from publicacion inner join usuario on publicacion.Id_User = usuario.Id_User";
               $listado = $mysqli->query($sql);
               while ($registro = $listado->fetch_array()) {
               	   ?>
               	   <div id="post">
                  <img  src="fotos/<?php echo $registro['Imagen']; ?>" style="width: 50px; border-radius: 25px;">
                  <span>Publicado a las :<span class="colorW" =""> <?php echo $registro['Fecha'] ?></span>  por : <span class="colorW"><?php echo $registro['Usuario'] ?></span>  </span>
                   <?php if ($_SESSION['privilegio']==1) {?>
                       <a class="eliminar" href="Foro.php? id=<?php echo $registro['Id']; ?>"> Eliminar </a>
                    <?php } ?>
                    
                   <p id="Ppublicacion"><?php echo $registro['Contenido']; ?></p>
                     
                   </div>
             <?php  } ?>
        
	</div>
                 
	<div id="publicacion1">
          <textarea name="publicacion" rows="4" cols="50" placeholder="Escribe un mensaje <?php echo $_SESSION['usuario']  ?> . . ."></textarea>
          <input id="publicar" type="submit" name="publicar" value="publicar"> 
	</div>
  </div>
</form>
</div>
</body>
</html>