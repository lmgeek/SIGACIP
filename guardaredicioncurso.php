<?php
	
	include('config.php');
	$id				= $_POST['id'];
	$nombre  		= $_POST['nombre'];
	$descripcion    = $_POST['descripcion'];
	$costo          = $_POST['costo'];
	
	$sql = "UPDATE curso SET nombre='".$nombre."',descripcion='".$descripcion."',costo_curso='".$costo."' WHERE idcurso=".$id;
	mysql_query($sql,$conexion);
	echo '<center><img src="imagenes/correcto.gif"/>Informacion Actualizada Correctamente.</center>';
 ?>