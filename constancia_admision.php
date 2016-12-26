<html xmlns="http://www.w3.org/1999/xhtml"><head><link href="css/main.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<script src="js/validacion_campo_vacio.js" type="text/javascript"></script>
<link href="css/Estilo_Error.css" rel="stylesheet" type="text/css">
<link href="css/tablas.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
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

hr { 
  background-color: blue; 
  height: 2px;
}

.fuente{
	font-size: 20px
}
</style>

<?php 
include('config.php');




					if(isset($_POST['cedula1']) && !empty($_POST['cedula1']) &&
						isset($_POST['cedula2']) && !empty($_POST['cedula2'])){
                            $cedula1 = htmlentities($_POST['cedula1']);
                            $cedula2 = htmlentities($_POST['cedula2']);

                            $cedula = $cedula1.$cedula2;

                            $query = mysql_query("SELECT * FROM alumno WHERE cedula='".$cedula."'") or die(mysql_error());
                            //Verificamos que la Cedula Exista en la Base de Datos
                            if (mysql_num_rows($query)>0){

                              $row2 = mysql_fetch_array($query);

                              $sql = mysql_query("SELECT * FROM especialidad WHERE cod_especialidad ='".$row2['especialidad']."'") or die(mysql_error());
                              $especialidad = mysql_fetch_array($sql);

                              $sql2 = mysql_query("SELECT * FROM rel_alumno_curso WHERE idalumno ='".$row2['idalumno']."'") or die(mysql_error());
                              $alumno = mysql_fetch_array($sql2);

                              
                              if ($row2['pasaporte']!=0) {
                              	$pasaporte = $row2['pasaporte'];
                              }else{
                              	$pasaporte = "";
                              }


?>
<input type="button" style="cursor: pointer;" class="boot" onclick="javascript:window.history.back();" value="REGRESAR" /> 
<br><br>
<div id="imprimir">

	<table  width="100%" id="tabla" >
	<tr>
		<td><img src="img/logo-upel.jpg" width="90px"></td>
		<td align="center" colspan="4">Republica Bolivariana de Venezuela<br>Universidad Pedagogica Experimental El Libertador<br>
		Instituto de Mejoramiento Profesional del Magisterio<br>Nucleo Academico Falcon</td>
		<td><img src="img/LOGO-IPM.gif" width="90px"></td>
	</tr>
	<tr>
			<td colspan="6" align="center"<font size="3px"><b>CONSTANCIA DE ADMISION</b></font></td>
		</tr>
		<tr>
			<td colspan="6"><b><font class="fuente">Datos B&aacutesicos</font></b><hr></td>
		</tr>
		<tr>
			<td style="font-weight: bold">Nacionalidad</td>
			<td><?php echo $row2['pais']; ?></td>
			<td style="font-weight: bold">C&eacutedula</td>
			<td><?php echo $row2['cedula']; ?></td>
		</tr>
		<tr>
			<td style="font-weight: bold" colspan="2">N&uacutemero de Pasaporte</td>
			<td><?php echo $pasaporte; ?></td>
		</tr>
		<tr>
			<td style="font-weight: bold">Deposito N&uacutemero</td>
			<td><?php echo $row2['nro_deposito']; ?></td>
			<td style="font-weight: bold">Fecha del deposito</td>
			<td><?php echo $row2['fecha_deposito']; ?></td>
		</tr>
		<tr>
			<td style="font-weight: bold">Monto del deposito</td>
			<td><?php echo $row2['monto_deposito']; ?></td>
			<td style="font-weight: bold">Modo de Ingreso</td>
			<td><?php echo $row2['modo_ingreso']; ?></td>
		</tr>
		<tr>
			<td style="font-weight: bold">Subprograma</td>
			<td><?php echo $especialidad['especialidad']; ?></td>
		</tr>
		<tr>
			<td style="font-weight: bold">Cohorte</td>
			<td><?php echo $alumno['cohorte']; ?></td>
		</tr>

		<tr>
			<td colspan="6"><br><b><font class="fuente">Datos Personales</font></b><hr></td>
		</tr>
		<tr>
			<td style="font-weight: bold">Apellidos</td>
			<td><?php echo $row2['apellido_paterno']." ".$row2['apellido_materno']; ?></td>
			<td style="font-weight: bold">Nombres</td>
			<td><?php echo $row2['nombre']." ".$row2['segundo_nombre']; ?></td>
		</tr>
		<tr>
			<td style="font-weight: bold">Fecha de Nac.</td>
			<td><?php echo $row2['fecha_nac']; ?></td>
			<td style="font-weight: bold">Estado Civil</td>
			<td><?php echo $row2['estado_civil']; ?></td>
			<td style="font-weight: bold">S&eacutexo</td>
			<td><?php echo $row2['sexo']; ?></td>
		</tr>
		<tr>
			<td style="font-weight: bold" >Tel&eacutefono de Habitaci&oacuten</td>
			<td><?php echo $row2['telef_habitacion']; ?></td>
			<td style="font-weight: bold">Tel&eacutefono Celular</td>
			<td colspan="2"><?php echo $row2['telefono']; ?></td>
		</tr>
		<tr>
			<td style="font-weight: bold">Correo</td>
			<td><?php echo $row2['correo']; ?></td>
		</tr>
		<tr>
			<td style="font-weight: bold">Direcci&oacuten</td>
			<td><?php echo $row2['direccion']; ?></td>
		</tr>

		<tr>
			<td colspan="6"><br><b><font class="fuente">Datos Acad&eacutemicos</font></b><hr></td>
		</tr>
		<tr>
			<td style="font-weight: bold">T&iacutetulo de Pregrado</td>
			<td><?php echo $row2['titulo']; ?></td>
		</tr>
		<tr>
			<td style="font-weight: bold" colspan="2">Universidad donde Egres&oacute</td>
			<td><?php echo $row2['universidad']; ?></td>
		</tr>
		<tr>
			<td colspan="6"><br><b><font class="fuente">Datos Laborales</font></b><hr></td>
		</tr>
		<tr>
			<td style="font-weight: bold" colspan="2">Instituci&oacuten donde Trabaja</td>
			<td><?php echo $row2['universidad']; ?></td>
		</tr>
		<tr>
			<td style="font-weight: bold">A&ntildeos de Servicio</td>
			<td><?php echo $row2['ano_servicio']; ?></td>
			<td style="font-weight: bold" colspan="">Tipo de Organizaci&oacuten</td>
			<td><?php echo $row2['tipo_org']; ?></td>
		</tr>
		<tr>
			<td style="font-weight: bold">Direcci&oacuten</td>
			<td colspan="2"><?php echo $row2['direccion']; ?></td>
		</tr>
		<tr>
			<td style="font-weight: bold">Tel&eacutefono</td>
			<td><?php echo $row2['telef_oficina']; ?></td>
		</tr>
		<tr>
			<td style="font-weight: bold" colspan="6"><u>Observaci&oacuten</u></td>
		</tr>
		<tr>
			<td rowspan="4"><?php echo $row2['observacion']; ?></td>
		</tr>




	</table>
</div>
		<center>
		<br><br><br><br>
			<button type="button" class="btn btn-danger btn-lg" onclick="javascript:imprSelec('imprimir');function imprSelec(imprimir)
            {var ficha=document.getElementById(imprimir);var ventimp=window.open(' ','popimpr');ventimp.document.write(ficha.innerHTML);
            ventimp.document.close();ventimp.print();ventimp.close();};">
                        <span class="glyphicon glyphicon-print"></span> Imprimir Listado
            </button>
        </center>

<?php



} else {
                              echo "<script>
                                      alert('El Estudiante de la Cedula de Identidad  ".$cedula."\\nNo existe debe registrarlo');
                                       document.location=('registraralumno.php');
                                    </script>";
                            }
                    } else{

 ?>
<input type="button" style="cursor: pointer;" class="boot" onclick="javascript:window.history.back();" value="REGRESAR" /> <br><br>
				 <form name="form1" method="post" action="constancia_admision.php">
				 <center>
        
                        

                        <h3 class="text-center">
                           Constancia de Admisi&oacuten</h3>
	                        <table  width="50%" border="0" align="center"  class="down1">
		                        <tr>
								  <td align="right">Cedula:</td>
								  <td><span id="sprytextfield4">
								  <select name="cedula1" required>
								    <option value="V-">V-</option>
								    <option value="E-">E-</option>
								  </select>
								  <input name="cedula2" class="caja2" onblur="validarEmail(this.value)" type="text" id="cedula2" size="7" autocomplete="off" pattern="[0-9]{6,8}" required maxlength="8"><font color="red">*</font>
								  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
								  <td>
								  	<input type="submit" class="boot" name="guarda" value="Buscar Estudiante">
								  </td>
								</tr>
							</table>
	                    </form>
              </center>

                    <?php   } ?>