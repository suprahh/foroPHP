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
		$query = "SELECT usuario.Privilegio FROM `usuario` WHERE Usuario='$usuario' ";
		 while($registro = $buscar->fetch_array())
	   {
           $privilegio =   $registro['Privilegio'];
           $_SESSION['privilegio'] = $privilegio==1 ? true : false;
       }
		header('Location: http://localhost/TrabajoForo/Foro.php');
	}      
  }

  ?>