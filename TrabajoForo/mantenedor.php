<!DOCTYPE html>
<html>
<head>
  <link rel="Stylesheet" href="css/estilo.css"/>
	<title>Mantenedor Usuarios</title>
</head>
<?php

$mysqli = new mysqli('localhost','root','','forowebphp');
      if (empty($_SESSION["usuario"])) {
         session_start();
               
      }
      if (isset($_POST['btmodificar'])) {
      	if (isset($_POST['user'])) {
      		 $query = "SELECT * FROM `usuario` WHERE Id_User =".$_POST['user'];
       	   $listado = $mysqli->query($query);
       	   $user = null;
       	   $clave = null;
       	   $idUser = null;
       	   $privilegio = null;
           while ($registro = $listado->fetch_array()) {  
                     $idUser = $registro['Id_User'];
                     $user = $registro['Usuario'];
                     $clave = $registro['Clave'];
                     if ($registro['Privilegio']==1) {
                     	 $privilegio = "Administrador";
                     }
                     else{
                     	 $privilegio = "Usuario";
                     }
      	}
       	  

           }
           else{
           	echo "tienes que seleccionar un usuario para modificarlo";
           }
       }
      if (isset($_POST['btgrabar'])) {
        $idUser = $_POST['idUser'];
       	$privilegioM = $_POST['permiso'];
       	$usuario = $_POST['usuario'];
       	$clave = $_POST['clave'];
        $query =   "UPDATE usuario SET Usuario = '$usuario' , Clave ='$clave' , Privilegio = '$privilegioM' WHERE Id_User = '$idUser'";
          $Modificar = $mysqli->query($query);
         if (!$Modificar) {
          	echo "no se pudo modificar";
          }
       }

       if (isset($_POST['bteliminar'])) {

           $Id_User = $_POST['user'];
           $eliminarPublicaciones = "DELETE FROM publicacion WHERE Id_User = '$Id_User'";
           $borrar = $mysqli->query($eliminarPublicaciones);
            if (!$borrar) {
          	echo "no se pudo eliminar las publicacion";
          }
       	   $eliminarUsuario =  "DELETE FROM usuario  WHERE Id_User = '$Id_User' ";
       	   $borrar = $mysqli->query($eliminarUsuario);
       	    if (!$borrar) {
          	echo "no se pudo eliminar";
          }
          else {
          	echo "se eliminino correctamente";
          }
       }




 ?>
<body>
<div class="mantenedor">
<h2>MANTENCION USUARIOS</h2>
<form name="formManten" id="formManten" method="post" action="mantenedor.php">
<div id="contenedor">
<?php    
     if (isset($_POST['btmodificar'])) {
     	if (isset($_POST['user'])) { ?>
     		<div>
     <input class="caja" type="text" name="idUser" style="visibility:hidden" value="<?php echo $idUser; ?>" >
   </div>
   
   <div>
   <label>Usuario :</label>
   <input class="caja" type="text" name="usuario" value="<?php echo $user; ?>">	
  </div>
<div>
	<label>Clave :</label>
	<input class="caja" type="text" name="clave" value="<?php echo $clave ?> ">
</div>
<div>
     <label>Tipo Usuario :</label> 
  <?php
        if ($privilegio=="Administrador") {
        	echo "<select name='permiso'>
	                 <option value ='1'>".$privilegio."</option>
	                 <option value='0'>Usuario</option>
                </select>";
        }
        else{
        	echo "<select name='permiso'>
	                 <option value='0'>".$privilegio."</option>
	                 <option value='1'>Administrador</option>
                </select>";
        }
     }
   }
  else
  	{?>

  <div>
   <label>Usuario :</label>
   <input type="text" name="usuario">	
</div>
<div>
	<label>Clave :</label>
	<input type="text" name="clave">
</div>
<div>
     <label>Tipo Usuario :</label> 
      <select>
      	<option>Seleccione un usuario</option>
      </select>
  		<?php }?>
</div>
<div id="seccionBotones">
	<input class="boton" type="submit" name="btgrabar" value="Grabar">
</div>
</div>
<table>
<tr>
  <th>Usuario</th>
  <th>Clave</th>
  <th>Privilegio</th>
</tr>
<?php  
      
            $query = "SELECT * FROM `usuario` ";
             $listado = $mysqli->query($query);
            while ($registro = $listado->fetch_array()) {
?>     
           <div> 
           <tr>
                 <td><?php echo $registro['Usuario'];   ?> </td>
                 <td><?php echo $registro['Clave'];   ?> </td>
                 <td><?php  if ($registro['Privilegio']==1) {
                       echo "Administrador";   
                 }
                 else{
                 	echo "Usuario";
                 }
                   ?> </td>
                   
                 <td> <input type="radio" name="user" value="<?php echo $registro['Id_User']; ?>"> </td>
                 </tr>
           </div>   
 <?php } ?>
  	
</table>
<div id="seccionBotones">
	<input class="boton" type="submit" name="bteliminar" value="Eliminar">
	<input class="boton" type="submit" name="btmodificar" value="Modificar">
</div>
</form>
</div>
</body>
</html>



