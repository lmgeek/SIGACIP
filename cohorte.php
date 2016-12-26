<?php
include('config.php');

if (isset($_POST['cohorte1']) && !empty($_POST['cohorte1']) &&
	isset($_POST['cohorte2']) && !empty($_POST['cohorte2'])) {
	$cohorte1 = htmlentities($_POST['cohorte1']);
	$cohorte2 = htmlentities($_POST['cohorte2']);
	$cohorte = $cohorte1."-".$cohorte2;

	$consulta = mysql_query("SELECT * FROM cohortes WHERE cohorte='".$cohorte."'",$conexion);
	if (mysql_num_rows($consulta)>0) {
		echo "<script>
              alert('La Cohorte ingresada ya se encuentra registrada\\nIngrese otro periodo.');
               history.back();
            </script>";
	}else{

		$sql = "INSERT INTO cohortes (cohorte) VALUES ('{$cohorte}')";


		mysql_query($sql,$conexion);

		echo '<center><img src="imagenes/correcto.gif"/>Informacion Actualizada Correctamente.</center>';
		
	}

}else{
	header('location:Contenido.php');
}