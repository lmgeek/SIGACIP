<?php 
	include('config.php');
	$Id         = $_POST['Id'];
	$uc1	 	= $_POST['uc1'];
	$uc2 = $_POST['uc2'];
	$uc3 = $_POST['uc3'];
	$especialidad      = $_POST['especialidad'];


	$monto 	      = $_POST['monto'];
	$cohorte 	      = $_POST['cohorte'];

    $nro_deposito             = $_POST['nro_deposito'];
    $fechadeposito        = $_POST['fechadeposito'];
    $montodeposito          = $_POST['montodeposito'];
    
	
	$sql = "UPDATE alumno SET cedula='".$cedula."',pais='".$pais."',pasaporte='".$pasaporte."',nombre='".$nombre1."',segundo_nombre='".$nombre2."',apellido_paterno='".$apellidos1."',apellido_materno='".$apellidos2."',etnia='".$etnia."',correo='".$email."',fecha_nac='".$fecha_nac."',estado_civil='".$estado_civil."',sexo='".$sexo."',estado='".$estado."',ciudad='".$ciudad."',municipio='".$municipio."',parroquia='".$parroquia."',direccion='".$direccion."',telefono='".$telefono."',telef_habitacion='".$telef_habitacion."',telef_oficina='".$telef_oficina."',especialidad='".$especialidad."',titulo='".$titulo."',universidad='".$universidad."',trabajo='".$trabajo."',ano_servicio='".$ano_servicio."',tipo_org='".$tipo_org."',observacion='".$observacion."', WHERE idalumno=".$id;
	mysql_query($sql,$conexion);
	
	if(is_array($_POST['checkbox'])){
                     // realizamos el ciclo
                     while(list($key,$documentos) = each($_POST['checkbox'])) {
                            mysql_query("INSERT INTO documentos (cedula,tipo_documento) 
                            VALUES ('{$cedula}','{$documentos}')",$conexion);
                        
                    }
                 }
	echo '<center><img src="imagenes/correcto.gif"/>Informacion Actualizada Correctamente.</center>';

?>