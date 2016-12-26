<?php
	include('config.php');
	$id = $_GET['Id'];
	 /*ELIMINAMOS LOS CURSOS QUE TIENE ASIGNADO EL ALUMNO*/
        $sql1 = "delete from rel_alumno_curso where idcurso=".$id;
         mysql_query($sql1,$conexion);
         
	$sql = "DELETE FROM curso WHERE idcurso=".$id;
        mysql_query($sql,$conexion);
	header('Location:listacurso.php');

 ?>