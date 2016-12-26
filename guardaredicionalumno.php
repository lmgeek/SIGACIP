<meta http-equiv="Content-type" content="text/html" charset="utf-8">
<link href="css/main.css" rel="stylesheet" type="text/css"/>
<link href="css/tablas.css" rel="stylesheet" type="text/css" />
<script src="js/validacion_campo_vacio.js" type="text/javascript"></script>
<link href="css/Estilo_Error.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="calendario/tcal.css" />
<script type="text/javascript" src="calendario/tcal.js"></script>



<?php 
	include('config.php');
	

    $cedula           = $_POST['cedula'];

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
    $telef_habitacion = $_POST['telef_habitacion'];

    $telefono         = $_POST['telefono'];

    $telef_oficina    = $_POST['telef_oficina'];

    
    $direccion        = $_POST['direccion'];
    $titulo           = $_POST['titulo'];
    $universidad      = $_POST['universidad'];
    $trabajo          = $_POST['trabajo'];
    $ano_servicio     = $_POST['ano_servicio'];
    $tipo_org         = $_POST['tipo_org'];
    $observacion      = $_POST['observacion'];
    $modo_ingreso      = $_POST['modo_ingreso'];
    $especialidad     = "";

	
	$sql = "UPDATE alumno SET cedula='".$cedula."',pais='".$pais."',pasaporte='".$pasaporte."',nombre='".$nombre1."',segundo_nombre='".$nombre2."',apellido_paterno='".$apellidos1."',apellido_materno='".$apellidos2."',etnia='".$etnia."',correo='".$email."',fecha_nac='".$fecha_nac."',estado_civil='".$estado_civil."',sexo='".$sexo."',direccion='".$direccion."',telefono='".$telefono."',telef_habitacion='".$telef_habitacion."',telef_oficina='".$telef_oficina."',especialidad='".$especialidad."',titulo='".$titulo."',universidad='".$universidad."',trabajo='".$trabajo."',ano_servicio='".$ano_servicio."',tipo_org='".$tipo_org."',observacion='".$observacion."' WHERE cedula='{$cedula}'";
	

    mysql_query($sql,$conexion) or die(mysql_error());
    

    if (isset($_POST['checkbox']) && !empty($_POST['checkbox'])) {
        $documentos = $_POST['checkbox'];


        //Insertamos los checkbox que son los documentos seleccionados en el formulario
        if(is_array($_POST['checkbox'])){
                     // realizamos el ciclo
                     while(list($key,$documentos) = each($_POST['checkbox'])) {
                            mysql_query("INSERT INTO documentos (cedula,tipo_documento) 
                            VALUES ('{$cedula}','{$documentos}')",$conexion);
                        
                    }
                 }
    
    }
    echo '<center><img src="imagenes/correcto.gif"/>Informacion Actualizada Correctamente.</center>';

?>

<a href='Contenido.php' style='cursor: pointer; margin:0 auto;'  class='boot'>INICIO</a>