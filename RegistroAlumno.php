    <?php
	include('config.php');



	$cedula1 	      = $_POST['cedula1'];
	$cedula2 	      = $_POST['cedula2'];

    $pais             = $_POST['pais'];
    $pasaporte        = $_POST['pasaporte'];
    $nombre1          = $_POST['nombre'];
    $nombre2          = $_POST['segundo_nombre'];
    $apellidos1       = $_POST['apellidos1'];
	$apellidos2       = $_POST['apellidos2'];
    $fecha_nac        = $_POST['fecha_nac'];
	$email            = $_POST['email'];
    $etnia            = $_POST['etnia'];
    $estado_civil     = $_POST['estado_civil'];
    $sexo             = $_POST['sexo'];
    $telef_habitacion1= $_POST['telef_habitacion1'];
    $telef_habitacion2= $_POST['telef_habitacion2'];

    $telefono1        = $_POST['telefono1'];
    $telefono2        = $_POST['telefono2'];

    $telef_oficina1   = $_POST['telef_oficina1'];
    $telef_oficina2   = $_POST['telef_oficina2'];

    $estado           = $_POST['estado'];
    $ciudad           = $_POST['ciudad'];
    $municipio        = $_POST['municipio'];
    $parroquia        = $_POST['parroquia'];
    $direccion        = $_POST['direccion'];
    $titulo           = $_POST['titulo'];
    $universidad      = $_POST['universidad'];
    $trabajo          = $_POST['trabajo'];
    $ano_servicio     = $_POST['ano_servicio'];
    $tipo_org         = $_POST['tipo_org'];
    $observacion      = $_POST['observacion'];
    $nro_deposito     = $_POST['nro_deposito'];
    $nro_deposito2    = $_POST['nro_deposito2'];
    $fecha_deposito   = $_POST['fecha_deposito'];
    $fecha_deposito2  = $_POST['fecha_deposito2'];
    $monto_deposito   = $_POST['monto_deposito'];
    $monto_deposito2  = $_POST['monto_deposito2'];
    $modo_ingreso     = $_POST['modo_ingreso'];
    $especialidad     = "";
    $cohorte          = $_POST['cohorte'];

    if (empty($nro_deposito2)) {
        $nro_deposito2 = "0";
    }
    if (empty($fecha_deposito2)) {
        $fecha_deposito2 = "0000-00-00";
    }
    if (empty($monto_deposito2)) {
        $monto_deposito2 = "0";
    }

    $cedula           =  $cedula1.$cedula2;
    $telef_habitacion =  $telef_habitacion1."-".$telef_habitacion2;
    $telefono         =  $telefono1."-".$telefono2;
    $telef_oficina    =  $telef_oficina1."-".$telef_oficina2;
	

//INSERT INTO ejemplo.alumno (idalumno, cedula, pais, pasaporte, nombre, segundo_nombre, apellido_paterno, apellido_materno, etnia, correo, fecha_nac, estado_civil, sexo, estado, ciudad, municipio, parroquia, direccion, telefono, telef_habitacion, telef_oficina, especialidad, titulo, universidad, trabajo, ano_servicio, tipo_org, observacion) VALUES (NULL, '987654321', 'Venezuela', '56987654321', 'sadfasdfasdfa', 'sdfasdfasdfa', 'sdfasdfasdf', 'asdfasdfas', 'dfasdfasdfasd', 'fasdfasdfasdf@asdf.com', '1988-05-14', 'Soltero', 'Masculino', 'aesrs', 'sfdadf', 'asdfasdf', 'asdfasd', 'fasdfasdfasdfas asdfasdfasdfasdf asd asdf asd ', '3423-43223', '3423-43223', '3423-43223', 'sdfasdfas', 'dfsasdfasd', 'asdfasdf', 'fdsasdfs', '4', 'fdsasdfsdf', 'fdsadfasdfas df asdf asdf asdf asd fsdf');



$consulta="SELECT * FROM alumno WHERE cedula = '$cedula'";
$resultado=mysql_query($consulta) or die (mysql_error());
if (mysql_num_rows($resultado)>0){
	echo '<script>
	alert("El Usuario ya esta registrado verifiquelo y vuelva a intentarlo");
	window.history.back();
	</script>';
} else {
	$sql = "INSERT INTO alumno (cedula, pais, pasaporte, nombre, segundo_nombre, apellido_paterno, apellido_materno, etnia, correo, fecha_nac, estado_civil, sexo, estado, ciudad, municipio, parroquia, direccion, telefono, telef_habitacion, telef_oficina, especialidad, titulo, universidad, trabajo, ano_servicio, tipo_org, observacion,nro_deposito,fecha_deposito,monto_deposito,nro_deposito2,fecha_deposito2,monto_deposito2,modo_ingreso,cohorte) VALUES ('".$cedula."','".$pais."','".$pasaporte."','".$nombre1."','".$nombre2."','".$apellidos1."','".$apellidos2."','".$etnia."','".$email."','".$fecha_nac."','".$estado_civil."','".$sexo."','".$estado."','".$ciudad."','".$municipio."','".$parroquia."','".$direccion."','".$telefono."','".$telef_habitacion."','".$telef_oficina."','".$especialidad."','".$titulo."','".$universidad."','".$trabajo."','".$ano_servicio."','".$tipo_org."','".$observacion."','".$nro_deposito."','".$fecha_deposito."','".$monto_deposito."','".$nro_deposito2."','".$fecha_deposito2."','".$monto_deposito2."','".$modo_ingreso."','".$cohorte."')";
	mysql_query($sql,$conexion) or die(mysql_error());

    if (isset($_POST['checkbox']) && !empty($_POST['checkbox'])) {
        if(is_array($_POST['checkbox'])){
        $documentos = $_POST['checkbox'];
                     // realizamos el ciclo
                     while(list($key,$documentos) = each($_POST['checkbox'])) {
                            mysql_query("INSERT INTO documentos (cedula,tipo_documento) 
                            VALUES ('{$cedula}','{$documentos}')",$conexion);
                        
                    }
        }
    }


	echo '<center><img src="imagenes/correcto.gif"/>Informacion Almacenada Correctamente.</center>';
}




	
 ?>