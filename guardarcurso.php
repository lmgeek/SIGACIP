<?php
	include('config.php');
	$nombre  		= $_POST['nombre'];
	$descripcion    = $_POST['descripcion'];
	$costo          = $_POST['costo'];
	
	$sql = "INSERT INTO curso (nombre,descripcion,costo_curso) VALUES ('".$nombre."','".$descripcion."','".$costo."')";
	mysql_query($sql,$conexion);
	echo '<center><img src="imagenes/correcto.gif"/>Informacion Almacenada Correctamente.</center>';
 ?>