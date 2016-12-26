<?php
	include('config.php');
	$especialidad  		= $_POST['especialidad'];
	$nombre  		= $_POST['nombre'];
	$descripcion    = $_POST['descripcion'];
	//$costo  		= $_POST['costo'];
	$uc          = $_POST['uc'];
	
	$sql = "INSERT INTO curso (especialidad,nombre,descripcion,uc) VALUES ('".$especialidad."','".$nombre."','".$descripcion."','".$uc."')";
	mysql_query($sql,$conexion);
	echo '<center><img src="imagenes/correcto.gif"/>Informacion Almacenada Correctamente.</center>';
 ?>