<?php
include('config.php');

if (isset($_POST['ut']) && !empty($_POST['ut'])) {
	$ut = htmlentities($_POST['ut']);


	$sql = "UPDATE unidad_tributaria SET ut = '".$ut."' WHERE id='1'";


	mysql_query($sql,$conexion);

	echo '<center><img src="imagenes/correcto.gif"/>Informacion Actualizada Correctamente.</center>';
	
}else{
	header('location:Contenido.php');
}