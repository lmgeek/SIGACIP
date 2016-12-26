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
<input type="button" style="cursor: pointer;" class="boot" onclick="javascript:window.history.back();" value="REGRESAR" /> 
<h1 align="center">Agregar Cohorte</h1>
<form method="post" action="cohorte.php">
<table  width="100%" id="tabla" border="0" align="center" class="down1">
	<tr>
		<td align="right">A&ntildeo Actual:</td>
		<td>
			<select class="caja2" name="cohorte1">
			<?php 
			for ($anio=(date("Y")); 2014<=$anio; $anio--) { 
			 	echo "<option value='".$anio."'>".$anio."</option>";
			 } ?>
			</select>
		</td>
	</tr>
	<tr>
		<td align="right">Seleccione Periodo Acad&eacutemico:</td>
		<td>
			<select name="cohorte2" class="caja2">
				<option value="I">I</option>
				<option value="II">II</option>

			</select>
		</td>
		<td>
		  <input type="submit" class="boot" name="guarda" value="Agregar Cohorte">
		</td>
	</tr>
</table>
</form>

<br><br>
<h1 align="center">Actualizar Unidad Tributaria</h1>
<form method="post" action="unidadtributaria.php">
<table width="100%" id="tabla" border="0" align="center" class="down1">
	<?php 
	$sql = mysql_query("SELECT * FROM unidad_tributaria") or die(mysql_error());
	$ut = mysql_fetch_array($sql);

	?>
	<tr>
		<td align="right">Unidad Tributaria Actual:</td>
		<td>
			<input type="text" class="caja2" value="<?php echo $ut['ut'].',00';?> Bs." readonly/>
		</td>
	</tr>
	<tr>
		<td align="right">Nueva Unidad Tributaria:</td>
		<td>
			<input type="text" class="caja2" name="ut" placeholder="0,00 BsF." />
		</td>
		<td>
		  <input type="submit" class="boot" name="guarda" value="Cambiar U.T">
		</td>
	</tr>
	</tr>
</table>
</form>