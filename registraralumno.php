<html xmlns="http://www.w3.org/1999/xhtml"><head><link href="css/main.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<link href="css/Estilo_Error.css" rel="stylesheet" type="text/css">
<link href="css/tablas.css" rel="stylesheet" type="text/css">
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/prototype.js" type="text/javascript"></script>
<!--Calendario-->
<script type="text/javascript" src="calendario/tcal.js"></script>
<link rel="stylesheet" type="text/css" href="calendario/tcal.css" />

<link href="css/Estilo_Error.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery.min.js"></script>



  <link rel="stylesheet" type="text/css" href="css/default.css" />
  <link rel="stylesheet" type="text/css" href="css/jquery-ui-1.7.2.custom.css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui.min.js"></script>
  <script type="text/javascript">
jQuery(function($){
  $.datepicker.regional['es'] = {
    closeText: 'Cerrar',
    prevText: '&#x3c;Ant',
    nextText: 'Sig&#x3e;',
    currentText: 'Hoy',
    monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
    'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
    monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
    'Jul','Ago','Sep','Oct','Nov','Dic'],
    dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
    dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
    weekHeader: 'Sm',
    dateFormat: 'dd/mm/yy',
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: ''};
  $.datepicker.setDefaults($.datepicker.regional['es']);
});    

        $(document).ready(function() {
       $("#datepicker").datepicker({
          //minDate: new Date(2010, 5, 1),
           //maxDate: new Date(2010, 9, 30),
           dateFormat: 'yy-mm-dd',
           constrainInput: true,
           changeMonth: true,
           changeYear: true,
           numberOfMonths:2,
           minDate: '-2Y',
           maxDate: 'Y,m,d', 
           yearRange: '-100',
      });

       $("#datepicker3").datepicker({
          //minDate: new Date(2010, 5, 1),
           //maxDate: new Date(2010, 9, 30),
           dateFormat: 'yy-mm-dd',
           constrainInput: true,
           changeMonth: true,
           changeYear: true,
           numberOfMonths:2,
           minDate: '-2Y',
           maxDate: 'Y,m,d', 
           yearRange: '-100',
      });

       $("#datepicker2").datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-mm-dd',
                minDate: '-80Y',
                maxDate: '-15Y', 
                yearRange: '1',

            });
    });


      $(document).ready(function(){
        //Envia parametros de busca y carga de Ciudades
        $("#estado").change(function(){
          $.ajax({
            url:"ciudades.php",
            type: "POST",
            data:"idestado="+$("#estado").val(),
            
            success: function(opciones){
              $("#ciudad").html(opciones);
            }
            
          })
        });

        //Envia parametros de busca y carga de Municipios
        $("#estado").change(function(){
          $.ajax({
            url:"municipios.php",
            type: "POST",
            data:"idestado="+$("#estado").val(),
            
            success: function(opciones2){
              $("#mcpio").html(opciones2);
            }
            
          })
        });

        //Envia parametros de busca y carga de Paroquias
        $("#mcpio").change(function(){
          $.ajax({
            url:"parroquias.php",
            type: "POST",
            data:"idmcpio="+$("#mcpio").val(),
            
            success: function(opciones3){
              $("#parroquias").html(opciones3);
            }
            
          })
        });


      });

      $('#validar').click(function() {
    // Expresion regular para validar el correo
    var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;

    // Se utiliza la funcion test() nativa de JavaScript
    if (regex.test($('#mail').val().trim())) {
        alert('Correo validado');
    } else {
        alert('La direccón de correo no es valida');
    }
});
    </script>



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
<title>Registrar Aspirante</title>

</head>

<body>
<input type="button" style="cursor: pointer;" class="boot" onclick="javascript:window.history.back();" value="REGRESAR" /> 
   <center>
  <form id="form1" name="form1" method="post" action="RegistroAlumno.php">  
  <strong><h3>REGISTRAR NUEVO ASPIRANTE</h3></strong>
  <small><font color="red">* Los campos en (*)Asterisco son de caracter Obligatorio, no puede dejar alguno en blanco<br>- De ser Venezolano o Nacionalizado Ingresar Cedula de Identidad<br>
  - Deser Extranjero Ingresar N&uacutemero de Pasaporte</font></small>

  <table width="68%" border="0" align="center" class="down1">
  
  <tbody>
  
  <tr align="center">
    <td><h3>Datos B&aacutesicos</h3></td>
  </tr>

  <tr>
  <td align="right">Pais de Procedencia:</td>
  <td><span id="sprytextfield1">
  <?php
    include('config.php');
    // Consultar la base de datos
    $consulta_mysql='SELECT * FROM `paises` ORDER BY `Pais` ASC ';
    $resultado_consulta_mysql=mysql_query($consulta_mysql,$conexion);
      
    echo "<select name='pais' onblur='validarEmail(this.value)' required class='caja'>
            <option value=''>------------ Ingrese un Pais ----------</option>";
    while($fila=mysql_fetch_array($resultado_consulta_mysql)){
        echo "<option value='".$fila['Pais']."'>".$fila['Pais']."</option>";
    }
    echo "</select><font color='red'>*</font>";

  ?>
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr>
  <td align="right">Cedula:</td>
  <td><span id="sprytextfield4">
  <select name="cedula1" >
    <option value="V-">V-</option>
    <option value="E-">E-</option>
  </select>
  <input name="cedula2" class="caja2"  type="text"  size="7" autocomplete="off" pattern="[0-9]{6,8}" ><font color="red">6 u 8 digitos de c&eacutedula</font>
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  

  <tr>
  <td align="right">Numero de Pasaporte:</td>
  <td><span id="sprytextfield1">
  <input name="pasaporte" class="caja" type="text" id="pasaporte" size="28" autocomplete="off">
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr>
  <td align="right">Primer Nombre:</td>
  <td><span id="sprytextfield1">
  <input name="nombre" class="caja" type="text" id="nombre" size="28" autocomplete="off" required><font color="red">*</font>
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

    <tr>
  <td align="right">Segundo Nombre:</td>
  <td><span id="sprytextfield1">
  <input name="segundo_nombre" class="caja" type="text" id="segundo_nombre" size="28" autocomplete="off">
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>
	
  <tr>
  <td align="right">Primer Apellido:</td>
  <td><span id="sprytextfield2">
  <input name="apellidos1" class="caja" type="text" size="28" autocomplete="off" required><font color="red">*</font>
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>
  
  <tr>
  <td align="right">Segundo Apellido:</td>
  <td>
  <span id="sprytextfield3">
  <input name="apellidos2" class="caja" type="text"  size="28" autocomplete="off">
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span>
  </td>
  </tr>

  <tr>
    <td colspan="2" align="center"><font color="red">En caso de no pertenecer a ningun grupo Etnico seleccinar la Opci&oacuten NINGUNA</font></td>
  </tr>

  <tr>
  <td align="right">Grupo Etnico:</td>
  <td><span id="sprytextfield4">
  <select name="etnia" required class="caja">
      <option value="" selected>-------------- Seleccione una etnia ------------</option>
      <option value="NINGUNA">NINGUNA</option>
      <option value="ACAHUAYO">ACAHUAYO-</option>
      <option value="ARAHUAC DEL DELTA AMACURO">ARAHUAC DEL DELTA AMACURO</option>
      <option value=" ARAHUAC DEL RÍO NEGRO">ARAHUAC DEL RÍO NEGRO</option>
      <option value="ARUTANI">ARUTANI</option>
      <option value="BARI">BARI</option>
      <option value="CARIÑA">CARIÑA</option>
      <option value="GUAJIBO">GUAJIBO</option>
      <option value="GUAJIRO">GUAJIRO</option>
      <option value="GUARAO O WARAO">GUARAO O WARAO</option>
      <option value="GUAYQUERI">GUAYQUERI</option>
      <option value=" MAPOYO O YAHUANA"> MAPOYO O YAHUANA</option>
      <option value="MAQUIRITAREPANARE">MAQUIRITAREPANARE</option>
      <option value="PANARE">PANARE</option>
      <option value="PUINABE">PUINABE</option>
      <option value="PARAUJANO">PARAUJANO</option>
      <option value="PEMÓN">PEMÓN</option>
      <option value="PIAROA">PIAROA</option>
      <option value="SAPE">SAPE</option>
      <option value="YANOMAMI">YANOMAMI</option>
      <option value="YARURO">YARURO</option>
      <option value="YUCPA">YUCPA</option>
  </select><font color="red">*</font>
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr>
  <td align="right">Fecha de Nacimiento:</td>
  <td><span id="sprytextfield3">
    <input type="text" name="fecha_nac" id="datepicker2" readonly="readonly" size="12" class="caja" required placeholder="Click para ver Calendario"/><font color="red">*</font>
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"/></span></span></td>
  </tr>

  <tr>
  <td align="right">Estado Civil:</td>
  <td><span id="sprytextfield4">
  <select name="estado_civil" required class="caja">
      <option value="">-------- Seleccione su Estado Civil ---------</option>
      <option value="Soltero(a)">Soltero(a)</option>
      <option value="Casado(a)">Casado(a)</option>
      <option value="Divorciado(a)">Divorciado(a)</option>
      <option value="Viudo(a)">Viudo(a)</option>
      <option value="Concubinato">Concubinato</option>
  </select><font color="red">*</font>
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr>
  <td align="right">Sexo:</td>
  <td><span id="sprytextfield4">
  <select name="sexo" required class="caja">
      <option value="">-------- Seleccione su Sexo ---------</option>
      <option value="Masculino">Masculino</option>
      <option value="Femenino">Femenino</option>
  </select><font color="red">*</font>
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>
  
  <tr>
  <td align="right">Correo Electr&oacutenico:</td>
  <td><span id="sprytextfield4">
  <input type="email" name="email" required id="email" size="28" autocomplete="off" class="caja" placeholder="nombre@correo.com" /><font color="red">*</font>
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr>
  <td align="right">Tel&eacutefono de Habitaci&oacuten:</td>
  <td><span id="sprytextfield4">
  <select name="telef_habitacion1">
      <option value="">Código</option>
      <option value="0268">0268</option>
      <option value="0269">0269</option>

  </select>
  <input name="telef_habitacion2" class="caja2"  type="text" id="telef_habitacion2" size="7" autocomplete="off" pattern="[0-9]{7}" placeholder="1234567">
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr>
  <td align="right">Tel&eacutefono Celular:</td>
  <td><span id="sprytextfield4">
  <select name="telefono1" required>
      <option value="">Código</option>
      <option value="0412">0412</option>
      <option value="0414">0414</option>
      <option value="0424">0424</option>
      <option value="0416">0416</option>
      <option value="0426">0426</option>
  </select>
  <input name="telefono2" class="caja2"  type="text" id="telefono2" size="7" autocomplete="off" pattern="[0-9]{7}" required placeholder="1234567"><font color="red">*</font>
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr>
  <td align="right">Tel&eacutefono de Oficina:</td>
  <td><span id="sprytextfield4">
  <select name="telef_oficina1">
      <option value="">Código</option>
      <option value="0268">0268</option>
      <option value="0269">0269</option>

  </select>
  <input name="telef_oficina2" class="caja2"  type="text" id="telef_oficina2" size="7" autocomplete="off" pattern="[0-9]{7}" placeholder="1234567">
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>


<?php
  $conexion = new mysqli("localhost","root","","ejemplo");

  //Busca y carga de Estados
  $strConsulta = "SELECT * FROM estados";
  $result = $conexion->query($strConsulta);
  $opciones = '<option value="0"> Elige un Estado</option>';
  while( $fila = $result->fetch_array() )
  {
    $opciones.='<option value="'.$fila["id_estado"].'">'.$fila["estado"].'</option>';
  }
  
?>


  <tr>
  <td align="right">Estado:</td>
  <td><span id="sprytextfield4">
  <select id="estado" name="estado" required class="caja"><?php echo $opciones; ?></select><font color="red">*</font>
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr>
  <td align="right">Ciudad:</td>
  <td><span id="sprytextfield4">
  <select id="ciudad" name="ciudad" required class="caja"><font color="red">*</font>
        <option value="0">Elige una Ciudad...</option>
      </select>
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

    <tr>
  <td align="right">Municipio:</td>
  <td><span id="sprytextfield4">
  <select id="mcpio" name="municipio" required class="caja"><font color="red">*</font>
        <option value="0">Elige un Municipio...</option>
      </select>
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

    <tr>
  <td align="right">Parroquia:</td>
  <td><span id="sprytextfield4">
  <select id="parroquias" name="parroquia" required class="caja"><font color="red">*</font>
        <option value="0">Elige una Parroquia...</option>
      </select>
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr>
  <td align="right">Dirección:</td>
  <td><span id="sprytextfield4">
  <textarea name="direccion" class="caja"  id="direccion" size="28" autocomplete="off" required></textarea><font color="red">*</font>
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr>
  <td align="right">Modo de Ingreso:</td>
  <td><span id="sprytextfield4">
  <select name="modo_ingreso" required class="caja">
      <option value="">---------------- Seleccione  -------------------</option>
      <option value="Regular">Regular</option>
      <option value="Prosecución">Prosecución</option>
      <option value="Equivalencia">Equivalencia</option>
  </select><font color="red">*</font>
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr>
    <td align="right">Seleccione una Cohorte:</td>
    <td>
    <?php
                  $conn=mysqli_connect("localhost","root","","ejemplo") ;
                  $consulta="select * from cohortes";
                  $resultado=mysqli_query($conn,$consulta);
                  echo "<select class='caja' name='cohorte' required>";
                   echo "<option value='' selected>-------------- SELECCIONE ---------------</optopn>";
                  while($lista=mysqli_fetch_array($resultado))
                  echo "<option  value='".$lista["cohorte"]."'>".$lista["cohorte"]."</option>";
                  echo  "</select><font color='red'>*</font>";
          echo "</td>";
        ?>
</tr>

  <tr>
  <td align="right">N&uacutemero de Deposito:</td>
  <td><span id="sprytextfield2">
  <input name="nro_deposito" class="caja" type="text" id="nro_deposito" size="28" autocomplete="off" required pattern="[0-9]{6,8}" placeholder="123456"><font color="red">* Solo n&uacutemeros</font>
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

   <tr>
  <td align="right">Fecha de Deposito:</td>
  <td><span id="sprytextfield3">
    <input type="text" name="fecha_deposito" id="datepicker" readonly="readonly" size="12" class="caja" required placeholder="Click para ver Calendario"/>
    <font color="red">*</font>
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"/></span></span></td>
  </tr>

  <td align="right">Monto de Deposito:</td>
  <td><span id="sprytextfield2">
  <input name="monto_deposito" class="caja" type="text" id="nro_deposito" size="28" autocomplete="off"  pattern="[0-9]{3,8}" placeholder="123456"><font color="red">Solo n&uacutemeros</font>
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr>
    <td align="center" colspan="2">
      <font color="red">Rellenar s&oacutelo si es un excedente</font>
    </td>
  </tr>
  <tr>
  <td align="right">N&uacutemero de Deposito 2:</td>
  <td><span id="sprytextfield2">
  <input name="nro_deposito2" class="caja" type="text" id="nro_deposito" size="28" autocomplete="off"  pattern="[0-9]{6,8}" placeholder="123456"><font color="red">Solo n&uacutemeros</font>
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

   <tr>
  <td align="right">Fecha de Deposito 2:</td>
  <td><span id="sprytextfield3">
    <input type="text" name="fecha_deposito2" id="datepicker3" readonly="readonly" size="12" class="caja" required placeholder="Click para ver Calendario" />
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"/></span></span></td>
  </tr>

  <td align="right">Monto de Deposito 2:</td>
  <td><span id="sprytextfield2">
  <input name="monto_deposito2" class="caja" type="text" id="nro_deposito" size="28" autocomplete="off"  pattern="[0-9]{3,8}" placeholder="123456"><font color="red">Solo n&uacutemeros</font>
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr align="center">
    <td><h3>Datos Academicos</h3></td>
  </tr>

  <tr>
  <td align="right">Titulo de Pregrado:</td>
  <td><span id="sprytextfield2">
  <input name="titulo" class="caja" type="text" id="titulo" size="28" autocomplete="off" required><font color="red">*</font>
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr>
  <td align="right">Universidad:</td>
  <td><span id="sprytextfield2">
  <input name="universidad" class="caja" type="text" id="universidad" size="28" autocomplete="off" required><font color="red">*</font>
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr align="center">
    <td><h3>Datos Laborales</h3></td>
  </tr>

  <tr>
  <td align="right">Instituci&oacuten donde trabaja:</td>
  <td><span id="sprytextfield2">
  <input name="trabajo" class="caja" type="text" id="trabajo" size="28" autocomplete="off" required><font color="red">*</font>
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr>
  <td align="right">A&ntildeos de Servicio:</td>
  <td><span id="sprytextfield2">
  <input name="ano_servicio" class="caja" type="text" id="ano_servicio" size="28" autocomplete="off" required><font color="red">*</font>
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr>
  <td align="right">Tipo de Organizaci&oacuten:</td>
  <td><span id="sprytextfield4">
  <select name="tipo_org" required class="caja">
      <option value="">------------------ Seleccione --------------------</option>
      <option value="Publica">Publica</option>
      <option value="Privada">Privada</option>
  </select><font color="red">*</font>
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr align="center">
    <td><h3>Documentos a Consignar</h3></td>
  </tr>

  <tr>
  <td align="right">Dos Copias de C&eacutedula de Identidad:</td>
  <td><span id="sprytextfield2">
  <input  type="checkbox" name="checkbox[]" value="Dos Copias de Cedula de Identidad" id="checkbox" size="28" autocomplete="off">
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr>
  <td align="right">Dos Copias Carnet Militar:</td>
  <td><span id="sprytextfield2">
  <input  type="checkbox" name="checkbox[]" value="Dos Copias Carnet Militar" id="checkbox" size="28" autocomplete="off">
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr>
  <td align="right">Fondo Negro T&iacutetulo Pregrado (Orig. y Copia):</td>
  <td><span id="sprytextfield2">
  <input  type="checkbox" name="checkbox[]" value="Fondo Negro Titulo Pregrado (Orig. y Copia)" id="checkbox" size="28" autocomplete="off">
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr>
  <td align="right">Notas Certificadas de Pregrado (Orig. y Copia):</td>
  <td><span id="sprytextfield2">
  <input  type="checkbox" name="checkbox[]" value="Notas Certificadas de Pregrado (Orig. y Copia)" id="checkbox" size="28" autocomplete="off">
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr>
  <td align="right">Certificaci&oacuten de T&iacutetulo:</td>
  <td><span id="sprytextfield2">
  <input  type="checkbox" name="checkbox[]" value="Certificacion de Titulo" id="checkbox" size="28" autocomplete="off">
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr>
  <td align="right">Partida de Nac. (Orig. y Copia):</td>
  <td><span id="sprytextfield2">
  <input  type="checkbox" name="checkbox[]" value="Partida de Nac. (Orig. y Copia)" id="checkbox" size="28" autocomplete="off">
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr>
  <td align="right">Otros Documentos:</td>
  <td><span id="sprytextfield2">
  <input  type="checkbox" name="checkbox[]" value="Otros Documentos" id="checkbox" size="28" autocomplete="off">
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>

  <tr>
  <td align="right">Observaciones:</td>
  <td><span id="sprytextfield4">
  <textarea name="observacion" class="caja"  id="observacion" size="28" autocomplete="off"></textarea>
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>
  
  <tr><td colspan="2"><input type="submit" class="boot" name="guarda" value="GUARDAR"> <input type="reset" class="boot" name="guarda" value="LIMPIAR"></td></tr>
  </tbody></table>
  
 
  </form></center>
  
  <script type="text/javascript">
	
	var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
	var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
	var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
    var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
	
	</script>


</body></html>