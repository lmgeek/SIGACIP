<html xmlns="http://www.w3.org/1999/xhtml"><head><link href="css/main.css" rel="stylesheet" type="text/css">
<script src="js/validacion_campo_vacio.js" type="text/javascript"></script>
<link href="css/Estilo_Error.css" rel="stylesheet" type="text/css">
<link href="css/tablas.css" rel="stylesheet" type="text/css">
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/prototype.js" type="text/javascript"></script>
<script src="js/ValidacionesEspeciales.js" type="text/javascript"></script>

<link href="css/Estilo_Error.css" rel="stylesheet" type="text/css">




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
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title></title>

</head>

<body>
   <center>
  <form id="form1" name="form1" method="post" action="guardarEspecialidad.php">  
  <strong><h3>REGISTRAR NUEVA MATERIA A ESPECIALIDAD</h3></strong>
  <table width="68%" border="0" align="center" class="down1">
  
  <tbody>
  
  <tr>
  <td align="right">Especialidad:</td>
  <td><span id="sprytextfield1">
  <?php
    include('config.php');
    // Consultar la base de datos
    $consulta_mysql='SELECT * FROM especialidad';
    $resultado_consulta_mysql=mysql_query($consulta_mysql,$conexion);
      
    echo "<select name='especialidad' onblur='validarEmail(this.value)' required class='caja'>
            <option value=''>------------ Ingrese un Estado ----------</option>";
    while($fila=mysql_fetch_array($resultado_consulta_mysql)){
        echo "<option value='".$fila['cod_especialidad']."'>".$fila['especialidad']."</option>";
    }
    echo "</select><font color='red'>*</font>";

  ?>
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>
<!--
  <tr>
  <td align="right">C&oacutedigo Materia:</td>
  <td><span id="sprytextfield1">
  <input name="cod_materia" class="caja" onkeypress="return soloLetras(event)" type="text" id="cod_materia" size="28" autocomplete="off" required>
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>-->

  <tr>
  <td align="right">Nombre:</td>
  <td><span id="sprytextfield1">
  <input name="nombre" class="caja" onkeypress="return soloLetras(event)" type="text" id="nombre" size="28" autocomplete="off" required><font color='red'>*</font>
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>
	
  <tr>
  <td align="right">Descripcion:</td>
  <td><span id="sprytextfield2">
  <input name="descripcion" class="caja" onkeypress="return soloLetras(event)" type="text" id="descripcion" size="28" autocomplete="off" required><font color='red'>*</font>
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>
 <!-- 
  <tr>
  <td align="right">Costo: BsF.</td>
  <td>
  <span id="sprytextfield3">
  <input name="costo" class="caja" onkeypress="return soloLetras(event)" type="text" id="costo" size="28" autocomplete="off" required>
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span>
  </td>
  </tr>
-->
  <tr>
  <td align="right">Unidad de Credito (U.C.)</td>
  <td>
  <span id="sprytextfield3">
  <input name="uc" class="caja" onkeypress="return soloLetras(event)" type="number" id="uc" size="28" autocomplete="off" required><font color='red'>*</font>
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span>
  </td>
  </tr>
  
  
  
  <tr><td colspan="2"><input type="submit" class="boot" name="guarda" value="GUARDAR"> <input type="reset" class="boot" name="guarda" value="LIMPIAR"></td></tr>
  </tbody></table>
  
 
  </form></center>
  
  <script type="text/javascript">
	
	var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
	var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
	var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
	
	</script>


</body></html>