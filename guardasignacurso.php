<meta http-equiv="Content-type" content="text/html" charset="utf-8">
<link href="css/main.css" rel="stylesheet" type="text/css"/>
<link href="css/tablas.css" rel="stylesheet" type="text/css" />
<script src="js/validacion_campo_vacio.js" type="text/javascript"></script>
<link href="css/Estilo_Error.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="calendario/tcal.css" />
<script type="text/javascript" src="calendario/tcal.js"></script>

<?php
	include('config.php');
	date_default_timezone_set('America/Caracas');
	
	//Recibimos los datos enviados y validamos si estan vacios o si en realidad recibio esos datos
	if(isset($_POST['Id']) && !empty($_POST['Id']) &&
		isset($_POST['especialidad']) && !empty($_POST['especialidad']) &&
		isset($_POST['nro_deposito']) && !empty($_POST['nro_deposito']) &&
		isset($_POST['monto']) && !empty($_POST['monto']) &&
		isset($_POST['monto_deposito']) && !empty($_POST['monto_deposito']) &&
		isset($_POST['cohorte']) && !empty($_POST['cohorte']) &&
		isset($_POST['fechadeposito']) && !empty($_POST['fechadeposito'])){

	$idalumno 		= $_POST['Id'];
	$especialidad   = $_POST['especialidad'];
	$uc1  			= $_POST['uc1'];
	$uc2  			= $_POST['uc2'];
	$uc3  			= $_POST['uc3'];
	$nro_deposito 	= $_POST['nro_deposito'];
	$fecha_deposito 	= $_POST['fechadeposito'];
	$monto_deposito		= $_POST['monto_deposito'];
	$monto_total		= $_POST['monto'];
	$cohorte		= $_POST['cohorte'];
	$fecha          = date("Y-m-d H:i:s");


	//Verificacmos si el bouche se encuantra registrado, el cual no puede repetirse
	$consulta="SELECT * FROM pagos WHERE nro_deposito = '$nro_deposito'";
	$resultado=mysql_query($consulta) or die (mysql_error());
	if (mysql_num_rows($resultado)>0){
		echo '<script>
		alert("El Bouche ya esta registrado, verifiquelo y vuelva a intentarlo");
		window.history.back();
		</script>';
	} else {
	
		$sql5 = "UPDATE alumno SET especialidad = '".$especialidad."' WHERE idalumno  = '".$idalumno."'";

		mysql_query($sql5,$conexion) or die(mysql_error());

		//Insertamos los valores en la tabla de rel_alumno_curso, que es quien registra la inscripción de los cursos...
		if ($uc1!=0) {
			$sql = "INSERT INTO rel_alumno_curso (idcurso,cod_especialidad,idalumno,cohorte,fecha_ingreso)
		 					VALUES ('".$uc1."','".$especialidad."','".$idalumno."','".$cohorte."','".$fecha."')";

			mysql_query($sql,$conexion) or die(mysql_error());
		}

		if ($uc2!=0) {
			$sql2 = "INSERT INTO rel_alumno_curso (idcurso,cod_especialidad,idalumno,cohorte,fecha_ingreso)
		 					VALUES ('".$uc2."','".$especialidad."','".$idalumno."','".$cohorte."','".$fecha."')";

			mysql_query($sql2,$conexion) or die(mysql_error());
		}
		
		if ($uc3!=0) {
			$sql3 = "INSERT INTO rel_alumno_curso (idcurso,cod_especialidad,idalumno,cohorte,fecha_ingreso)
		 					VALUES ('".$uc3."','".$especialidad."','".$idalumno."','".$cohorte."','".$fecha."')";

			mysql_query($sql3,$conexion) or die(mysql_error());
		}

		//Insertamos los pagos que se hayan realizado en este momento, el cual pueden ser solo una sola cuota de 3 permitidas...
		$sql4 = "INSERT INTO pagos (nro_deposito,monto_deposito,fecha_deposito,idalumno,fecha_registro,cohorte,monto_total)
							VALUES('".$nro_deposito."','".$monto_deposito."','".$fecha_deposito."','".$idalumno."','".$fecha."','".$cohorte."','".$monto_total."')";

		mysql_query($sql4,$conexion) or die(mysql_error());

	
	}


	echo '<center><img src="imagenes/correcto.gif"/>Informacion Almacenada Correctamente.</center>';


	echo "<table align='center'>
	<tr>
	<td>
			<a href='Contenido.php' style='cursor: pointer; margin:0 auto;'  class='boot'>INICIO</a>
		</td>
		</tr>
		 </table>";

	} else {
		header("location:Contenido.php");
	}

	

?>