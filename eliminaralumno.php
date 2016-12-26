<?php
	include('config.php');
	$id = $_GET['Id'];
	
        /*ELIMINAMOS LOS CURSOS QUE TIENE ASIGNADO EL ALUMNO*/
        $sql1 = "delete from rel_alumno_curso where idalumno=".$id;
         mysql_query($sql1,$conexion);
	$sql = "DELETE FROM alumno WHERE idalumno=".$id;
         mysql_query($sql,$conexion);
         echo "<script>
                      alert('El Aspirante se ha Eliminado Satisfactoriamente.');
                       document.location=('listalumnos.php');
                    </script>";
 ?>