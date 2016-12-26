<?php
	include('config.php');
	$id = $_GET['Id'];
	$nombre     = "";
	$descripcion = "";
	$costo      = "";
	
	$sql = "SELECT * FROM curso WHERE idcurso=".$id;
   $rs  = mysql_query($sql,$conexion);
	if(mysql_num_rows($rs) !=0 ){
		$row=mysql_fetch_assoc($rs);
		$nombre 	= $row['nombre'];
		$descripcion = $row['descripcion'];
		$costo = $row['costo_curso'];
	}
	
 ?>
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
  <form id="form1" name="form1" method="post" action="guardaredicioncurso.php">  
  <strong><h3>EDITAR CURSO</h3></strong>
  <table width="68%" border="0" align="center" class="down1">
  <input name="id" class="caja"  value="<?php echo $id;?>" type="hidden" id="id"/>
  <tbody>
  
  <tr>
  <td align="right">Nombre:</td>
  <td><span id="sprytextfield1">
  <input name="nombre" class="caja" value="<?php echo $nombre;?>" onkeypress="return soloLetras(event)" type="text" id="nombre" size="28" autocomplete="off">
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>
	
  <tr>
  <td align="right">Descripcion:</td>
  <td><span id="sprytextfield2">
  <input name="descripcion" class="caja" value="<?php echo $descripcion;?>" onkeypress="return soloLetras(event)" type="text" id="descripcion" size="28" autocomplete="off">
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
  </tr>
  
  <tr>
  <td align="right">Costo:</td>
  <td>
  <span id="sprytextfield3">
  <input name="costo" class="caja" value="<?php echo $costo;?>"  type="text" id="costo" size="28" autocomplete="off">
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span>
  </td>
  </tr>
  
  
  
  <tr><td colspan="2"><input type="submit" class="boot" name="guarda" value="GUARDAR"> <input type="button" onclick="javascript:window.history.back();" class="boot" name="guarda" value="REGRESAR"></td></tr>
  </tbody></table>
  
 
  </form></center>
  
  <script type="text/javascript">
	
	var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
	var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
	var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
	
	</script>


</body></html>