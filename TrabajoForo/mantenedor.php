<!DOCTYPE html>
<html>
<head>
	<title>Mantenedor Usuarios</title>
</head>
<?php

$mysqli = new mysqli('localhost','root','','forowebphp');
      if (empty($_SESSION["usuario"])) {
         session_start();
               
      }
      if (isset($_POST['btmodificar'])) {
       	   $query = "SELECT * FROM `usuario` WHERE Id_User =".$_POST['user'];
       	   $listado = $mysqli->query($query);
       	   $user = null;
       	   $clave = null;
       	   $privilegio = null;
           while ($registro = $listado->fetch_array()) {  
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
      if (isset($_POST['btgrabar'])) {
     
       	$privilegioM = $_POST['permiso'];
       	$usuario = $_POST['usuario'];
       	$clave = $_POST['clave'];
        $query =   "UPDATE usuario SET Usuario = '$usuario' , Clave ='$clave' , Privilegio = '$privilegioM' WHERE Usuario = '$usuario'";
          $Modificar = $mysqli->query($query);
         if (!$Modificar) {
          	echo "no se pudo modificar";
          }
       }

       if (isset($_POST['bteliminar'])) {

       	   $query =  "DELETE FROM usuario  WHERE usuario.Id_User = ".$_POST['user'];
       	   $borrar = $mysqli->query($query);
       	    if (!$borrar) {
          	echo "no se pudo eliminar";
          }
          else {
          	echo "se eliminino correctamente";
          }
       }




 ?>
<body>
<h2>MANTENCION USUARIOS</h2>
<form name="formManten" id="formManten" method="post" action="mantenedor.php">
<?php    
     if (isset($_POST['btmodificar'])) {
 ?><div>
   <label>Usuario :</label>
   <input type="text" name="usuario" value="<?php echo $user; ?>">	
</div>
<div>
	<label>Clave :</label>
	<input type="text" name="clave" value="<?php echo $clave ?> ">
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
  else
  	{?><div>
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
<div>
	<input type="submit" name="btgrabar" value="grabar">
</div>
<div>
	<div><label>Usuario</label></div>
	<div><label>Clave</label></div>
	<div><label>Tipo</label></div>
	<div><label>Seleccione</label></div>
</div>
<?php  
      
            $query = "SELECT * FROM `usuario` ";
             $listado = $mysqli->query($query);
            while ($registro = $listado->fetch_array()) {
?>     
           <div> 
                 <div><?php echo $registro['Usuario'];   ?> </div>
                 <div><?php echo $registro['Clave'];   ?> </div>
                 <div><?php  if ($registro['Privilegio']==1) {
                       echo "Administrador";   
                 }
                 else{
                 	echo "Usuario";
                 }
                   ?> </div>
                 <div> <input type="radio" name="user" value="<?php echo $registro['Id_User']; ?>"> </div>
           </div>   
 <?php } ?>
  	

<div>
	<input type="submit" name="bteliminar" value="Eliminar">
	<input type="submit" name="btmodificar" value="Modificar">
</div>
</form>
</body>
</html>



