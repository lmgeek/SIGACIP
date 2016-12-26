 <html xmlns="http://www.w3.org/1999/xhtml"><head><link href="css/main.css" rel="stylesheet" type="text/css">
<script src="js/validacion_campo_vacio.js" type="text/javascript"></script>
<link href="css/Estilo_Error.css" rel="stylesheet" type="text/css">
<link href="css/tablas.css" rel="stylesheet" type="text/css">
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/prototype.js" type="text/javascript"></script>
<script src="js/ValidacionesEspeciales.js" type="text/javascript"></script>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<link href="css/Estilo_Error.css" rel="stylesheet" type="text/css">

<!-- Refresca la pagina cada 2 sg automaticamente
<meta http-equiv="refresh" content="2">
-->

<style>
.caja{
  display: inline-block;
  margin: 5px;
  border: 1px solid #dadada;
  background-color: #eaeaea;
  padding: 3px;
  color: #404040;
  width: 250px;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
}
.caja2{
  display: inline-block;
  margin: 5px;
  border: 1px solid #dadada;
  background-color: #eaeaea;
  padding: 3px;
  color: #404040;
  width: 190px;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Editar Alumno</title>

</head>


<?php 
include('config.php');




          if(isset($_GET['cedula']) && !empty($_GET['cedula'])){
                            $cedula = htmlentities($_GET['cedula']);

	

  
        $query = mysql_query("SELECT * FROM alumno WHERE cedula='".$cedula."'") or die(mysql_error());
        //Verificamos que la Cedula Exista en la Base de Datos
        if (mysql_num_rows($query)>0){
          $row = mysql_fetch_array($query);
        

  $pais             = "";     $pasaporte        = "";     $nombre1          = "";     $nombre2          = "";
  $apellidos1       = "";     $apellidos2       = "";     $etnia            = "";     $observacion      = "";
  $fecha_nac        = "";     $estado_civil     = "";     $sexo             = "";     $email            = "";
  $telef_habitacion = "";     $telefono         = "";     $telef_oficina    = "";     $estado           = "";
  $ciudad           = "";     $municipio        = "";     $parroquia        = "";     $direccion        = "";
  $titulo           = "";     $universidad      = "";     $trabajo          = "";     $ano_servicio     = "";
  $tipo_org         = "";     

    $pais             = $row['pais'];
    $pasaporte        = $row['pasaporte'];
    $nombre1          = $row['nombre'];
    $nombre2          = $row['segundo_nombre'];
		$apellidos1       = $row['apellido_paterno'];
		$apellidos2       = $row['apellido_materno'];
    $fecha_nac        = $row['fecha_nac'];
		$email            = $row['correo'];
    $etnia            = $row['etnia'];
    $estado_civil     = $row['estado_civil'];
    $sexo             = $row['sexo'];
    $telef_habitacion = $row['telef_habitacion'];
    $telefono         = $row['telefono'];
    $telef_oficina    = $row['telef_oficina'];
    $direccion        = $row['direccion'];
    $modo_ingreso        = $row['modo_ingreso'];
    $titulo           = $row['titulo'];
    $universidad      = $row['universidad'];
    $trabajo          = $row['trabajo'];
    $ano_servicio     = $row['ano_servicio'];
    $tipo_org         = $row['tipo_org'];
    $observacion      = $row['observacion'];


    $sql2 = mysql_query("SELECT * FROM estados WHERE id_estado=".$row['estado'],$conexion);
    if(mysql_num_rows($sql2) !=0 ){
      $row2=mysql_fetch_assoc($sql2);
    }
    $sql3 = mysql_query("SELECT * FROM ciudades WHERE id_ciudad=".$row['ciudad'],$conexion);
    if(mysql_num_rows($sql3) !=0 ){
      $row3=mysql_fetch_assoc($sql3);
    }
    $sql4 = mysql_query("SELECT * FROM municipios WHERE id_municipio=".$row['municipio'],$conexion);
    if(mysql_num_rows($sql4) !=0 ){
      $row4=mysql_fetch_assoc($sql4);
    }
    $sql5 = mysql_query("SELECT * FROM parroquias WHERE id_parroquia=".$row['parroquia'],$conexion);
    if(mysql_num_rows($sql5) !=0 ){
      $row5=mysql_fetch_assoc($sql5);
    }
	
 ?>
 


<body>
<input type="button" style="cursor: pointer;" class="boot" onclick="javascript:window.history.back();" value="REGRESAR" /> 
   <center>
  <form id="form1" name="form1" method="post" action="guardaredicionalumno.php">  
  <strong><h3>EDITAR ALUMNO</h3></strong>
  <table width="68%" border="0" align="center" class="down1">
   <input name="id" class="caja"  value="<?php echo $id;?>" type="hidden" id="id"/>
  <tbody>



  <tr align="center">
    <td><h3>Datos B&aacutesicos</h3></td>
  </tr>

  <tr>
  <td align="right">Cedula:</td>
  <td><span id="sprytextfield4">
  <input name="cedula" class="caja" onblur="validarEmail(this.value)" type="text" id="cedula" size="7" autocomplete="off" required value="<?php echo $cedula;?>">
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr>
  <td align="right">Pais de Procedencia:</td>
  <td><span id="sprytextfield1">
   <input name="pais" class="caja" onkeypress="return soloLetras(event)" type="text" id="pais" size="28" autocomplete="off" value="<?php echo $pais;?>">
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr>
  <td align="right">Numero de Pasaporte:</td>
  <td><span id="sprytextfield1">
  <input name="pasaporte" class="caja" onkeypress="return soloLetras(event)" type="text" id="pasaporte" size="28" autocomplete="off" value="<?php echo $pasaporte;?>">
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr>
  <td align="right">Primer Nombre:</td>
  <td><span id="sprytextfield1">
  <input name="nombre" class="caja" onkeypress="return soloLetras(event)" type="text" id="nombre" size="28" autocomplete="off" required value="<?php echo $nombre1;?>">
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

    <tr>
  <td align="right">Segundo Nombre:</td>
  <td><span id="sprytextfield1">
  <input name="segundo_nombre" class="caja" onkeypress="return soloLetras(event)" type="text" id="segundo_nombre" size="28" autocomplete="off" value="<?php echo $nombre2;?>">
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>
  
  <tr>
  <td align="right">Primer Apellido:</td>
  <td><span id="sprytextfield2">
  <input name="apellidos1" class="caja" onkeypress="return soloLetras(event)" type="text" id="apellidos" size="28" autocomplete="off" required value="<?php echo $apellidos1;?>">
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>
  
  <tr>
  <td align="right">Segundo Apellido:</td>
  <td>
  <span id="sprytextfield3">
  <input name="apellidos2" class="caja" onkeypress="return soloLetras(event)" type="text" id="apellidos" size="28" autocomplete="off" value="<?php echo $apellidos2;?>">
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span>
  </td>
  </tr>

  <tr>
  <td align="right">Etnia:</td>
  <td><span id="sprytextfield4">
    <input name="etnia" class="caja" onkeypress="return soloLetras(event)" type="text" id="etnia" size="28" autocomplete="off" value="<?php echo $etnia;?>">
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr>
  <td align="right">Fecha de Nacimiento:</td>
  <td><span id="sprytextfield3">
    <input type="text" name="fecha_nac" id="fecha_nac" size="28" class="tcal caja" required="" value="<?php echo $fecha_nac;?>"/>
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"/></span></span></td>
  </tr>

  <tr>
  <td align="right">Estado Civil:</td>
  <td><span id="sprytextfield4">
    <input name="estado_civil" class="caja" onkeypress="return soloLetras(event)" type="text" id="estado_civil" size="28" autocomplete="off" value="<?php echo $estado_civil;?>">
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr>
  <td align="right">Sexo:</td>
  <td><span id="sprytextfield4">
    <input name="sexo" class="caja" onkeypress="return soloLetras(event)" type="text" id="sexo" size="28" autocomplete="off" value="<?php echo $sexo;?>">
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>
  
  <tr>
  <td align="right">Email:</td>
  <td><span id="sprytextfield4">
  <input name="email" class="caja" onblur="validarEmail(this.value)" type="email" id="email" size="28" autocomplete="off" required value="<?php echo $email;?>">
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr>
  <td align="right">Telefono de Habitacion:</td>
  <td><span id="sprytextfield4">
    <input name="telef_habitacion" class="caja" onkeypress="return soloLetras(event)" type="text" id="telef_habitacion" size="28" autocomplete="off" value="<?php echo $telef_habitacion;?>">
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr>
  <td align="right">Telefono Celular:</td>
  <td><span id="sprytextfield4">
    <input name="telefono" class="caja" onkeypress="return soloLetras(event)" type="text" id="telefono" size="28" autocomplete="off" value="<?php echo $telefono;?>">
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr>
  <td align="right">Telefono de Oficina:</td>
  <td><span id="sprytextfield4">
    <input name="telef_oficina" class="caja" onkeypress="return soloLetras(event)" type="text" id="telef_oficina" size="28" autocomplete="off" value="<?php echo $telef_oficina;?>">
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr>
  <td align="right">Estado:</td>
  <td><span id="sprytextfield4">
    <input name="estado" class="caja" onkeypress="return soloLetras(event)" type="text" id="estado" size="28" autocomplete="off" value="<?php echo $estado;?>">
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr>
  <td align="right">Ciudad:</td>
  <td><span id="sprytextfield4">
    <input name="ciudad" class="caja" onkeypress="return soloLetras(event)" type="text" id="ciudad" size="28" autocomplete="off" value="<?php echo $ciudad;?>">
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

    <tr>
  <td align="right">Municipio:</td>
  <td><span id="sprytextfield4">
    <input name="municipio" class="caja" onkeypress="return soloLetras(event)" type="text" id="municipio" size="28" autocomplete="off" value="<?php echo $municipio;?>">
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

    <tr>
  <td align="right">Parroquia:</td>
  <td><span id="sprytextfield4">
    <input name="parroquia" class="caja" onkeypress="return soloLetras(event)" type="text" id="parroquia" size="28" autocomplete="off" value="<?php echo $parroquia;?>">
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr>
  <td align="right">Dirección:</td>
  <td><span id="sprytextfield4">
  <textarea name="direccion" class="caja" onblur="validarEmail(this.value)" id="direccion" size="28" autocomplete="off" required ><?php echo $direccion;?></textarea>
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr>
  <td align="right">Modo de Ingreso:</td>
  <td><span id="sprytextfield4">
  <input type="text" name="modo_ingreso" class="caja" onblur="validarEmail(this.value)" id="modo_ingreso" size="28" autocomplete="off" required value="<?php echo $modo_ingreso;?>" >
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr align="center">
    <td><h3>Datos Academicos</h3></td>
  </tr>

  <tr>
  <td align="right">Titulo de Pregrado:</td>
  <td><span id="sprytextfield2">
  <input name="titulo" class="caja" onkeypress="return soloLetras(event)" type="text" id="titulo" size="28" autocomplete="off" required value="<?php echo $titulo;?>">
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr>
  <td align="right">Universidad:</td>
  <td><span id="sprytextfield2">
  <input name="universidad" class="caja" onkeypress="return soloLetras(event)" type="text" id="universidad" size="28" autocomplete="off" required value="<?php echo $universidad;?>">
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr align="center">
    <td><h3>Datos Laborales</h3></td>
  </tr>

  <tr>
  <td align="right">Instituci&oacuten donde trabaja:</td>
  <td><span id="sprytextfield2">
  <input name="trabajo" class="caja" onkeypress="return soloLetras(event)" type="text" id="trabajo" size="28" autocomplete="off" required value="<?php echo $trabajo;?>">
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr>
  <td align="right">A&ntildeos de Servicio:</td>
  <td><span id="sprytextfield2">
  <input name="ano_servicio" class="caja" onkeypress="return soloLetras(event)" type="text" id="ano_servicio" size="28" autocomplete="off" required value="<?php echo $ano_servicio;?>">
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr>
  <td align="right">Tipo de Organizaci&oacuten:</td>
  <td><span id="sprytextfield4">
    <input name="tipo_org" class="caja" onkeypress="return soloLetras(event)" type="text" id="tipo_org" size="28" autocomplete="off" required value="<?php echo $tipo_org;?>">
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr align="center">
    <td><h3>Documentos a Consignar</h3></td>
  </tr>

  <tr>
  <td align="right">Dos Copias de C&eacutedula de Identidad:</td>
  <td><span id="sprytextfield2">
  <input name="ano_servicio" onkeypress="return soloLetras(event)" type="checkbox" id="ano_servicio" size="28" autocomplete="off">
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr>
  <td align="right">Dos Copias Carnet Militar:</td>
  <td><span id="sprytextfield2">
  <input name="ano_servicio" onkeypress="return soloLetras(event)" type="checkbox" id="ano_servicio" size="28" autocomplete="off">
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr>
  <td align="right">Fondo Negro T&iacutetulo Pregrado (Orig. y Copia):</td>
  <td><span id="sprytextfield2">
  <input name="ano_servicio" onkeypress="return soloLetras(event)" type="checkbox" id="ano_servicio" size="28" autocomplete="off">
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr>
  <td align="right">Notas Certificadas de Pregrado (Orig. y Copia):</td>
  <td><span id="sprytextfield2">
  <input name="ano_servicio" onkeypress="return soloLetras(event)" type="checkbox" id="ano_servicio" size="28" autocomplete="off">
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr>
  <td align="right">Certificaci&oacuten de T&iacutetulo:</td>
  <td><span id="sprytextfield2">
  <input name="ano_servicio" onkeypress="return soloLetras(event)" type="checkbox" id="ano_servicio" size="28" autocomplete="off">
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr>
  <td align="right">Partida de Nac. (Orig. y Copia):</td>
  <td><span id="sprytextfield2">
  <input name="ano_servicio" onkeypress="return soloLetras(event)" type="checkbox" id="ano_servicio" size="28" autocomplete="off">
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr>
  <td align="right">Otros Documentos:</td>
  <td><span id="sprytextfield2">
  <input name="ano_servicio" onkeypress="return soloLetras(event)" type="checkbox" id="ano_servicio" size="28" autocomplete="off">
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr>
  <td align="right">Observaciones:</td>
  <td><span id="sprytextfield4">
  <textarea name="observacion" class="caja" onblur="validarEmail(this.value)" id="observacion" size="28" autocomplete="off"> <?php echo $observacion;?></textarea>
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>
  
  
  <tr><td colspan="2"><input type="submit" class="boot" name="guarda" value="GUARDAR"> <input type="button" class="boot" onclick="javascript:window.history.back();" name="guarda" value="REGRESAR"></td></tr>
  </tbody></table>
  
 
  </form>
  </center>
  
  <script type="text/javascript">
	
	var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
	var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
	var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
    var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
	
	</script>

<?php 


} 
                     }
                header("Location:index.php"); ?>