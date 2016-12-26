<html xmlns="http://www.w3.org/1999/xhtml"><head><link href="css/main.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<script src="js/validacion_campo_vacio.js" type="text/javascript"></script>
<link href="css/Estilo_Error.css" rel="stylesheet" type="text/css">
<link href="css/tablas.css" rel="stylesheet" type="text/css">
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/prototype.js" type="text/javascript"></script>
<script src="js/ValidacionesEspeciales.js" type="text/javascript"></script>
<!--Calendario-->
<script type="text/javascript" src="calendario/tcal.js"></script>
<link rel="stylesheet" type="text/css" href="calendario/tcal.css" />

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
<?php 
include('config.php');
 ?>

<table  width="100%" id="tabla" border="0" align="center" class="down1">
	<tr>
		<td align="right" width="50%"><img src="img/logo-uptag.png" width="100%"></td>
		<td align="left"><img src="img/logo-pnfi.jpg" width="50%"></td>
	</tr>
	<tr>
		<td colspan="2" align="center"><br><br><h1>Desarrolladores</h1></td>
	</tr>
	<tr>
		<td>Br. Hely Arteaga</td>
		<td>Correo: hfamfernando@gmail.com</td>
	</tr>
	<tr>
		<td>Br. Dimas Delmoral</td>
		<td>Correo: evangeliondimas@gmail.com</td>
	</tr>
	<tr>
		<td>Br. Jos&eacute Higuera</td>
		<td>Correo: josehiguerac@hotmail.com</td>
	</tr>
	<tr>
		<td>Br. Juan Higuera</td>
		<td>Correo: juan_higuerac@hotmail.com</td>
	</tr>
	<tr>
		<td>Br. Martin Reyes</td>
		<td>Correo: martinreyeslovera@hotmail.com</td>
	</tr>
</table>	

<?php
$url = "manual.pdf";

 echo "
<div style='text-align: left; border: none;'>    
<object type='application/pdf' data=".$url." width='1000' height='1100' id='pdf'> 
<param name='src' value=".$url." /> 
<p style='text-align:center; width: 60%;'>Adobe Reader no se encuentra o la versi&oacute;n no es compatible, utiliza el icono para ir a la p&aacute;gina de descarga <br /> 
<a href='http://get.adobe.com/es/reader/' onclick='this.target='_blank''>
<img src='reader_icon_special.jpg' alt='Descargar Adobe Reader' width='32' height='32' style='border: none;' /></a> 
</p> 
</object> 
</div>
";
                        
                    ?>