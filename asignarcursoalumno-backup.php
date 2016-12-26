<meta http-equiv="Content-type" content="text/html" charset="utf-8">
<link href="css/main.css" rel="stylesheet" type="text/css"/>
<link href="css/tablas.css" rel="stylesheet" type="text/css" />
<script src="js/validacion_campo_vacio.js" type="text/javascript"></script>
<link href="css/Estilo_Error.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="calendario/tcal.css" />
<script type="text/javascript" src="calendario/tcal.js"></script>
<?php
	
	include('config.php');
	$a 		= $_GET['Id'];
	
	$idexis = "";
	$idexis2 = "";
	

  $sqlx = "SELECT * FROM alumno WHERE idalumno=".$a;    
    $rsx  = mysql_query($sqlx,$conexion);
    if(mysql_num_rows($rsx)!=0){
      $rowx = mysql_fetch_assoc($rsx);
    }
	
	#obtenemos que materia ya fue asignado para no mostrarlo en el combo
	$idexiste = "SELECT idcurso FROM rel_alumno_curso WHERE idalumno=".$a;
	$rsexiste = mysql_query($idexiste,$conexion);
	if(mysql_num_rows($rsexiste)!=0){
		while($rowxx = mysql_fetch_assoc($rsexiste)){
			$idexis = $idexis.$rowxx['idcurso'].',';
		}
	}

    #obtenemos que especialidad ya fue asignado para no mostrarlo en el combo
  $idexiste2 = "SELECT cod_especialidad FROM rel_alumno_curso WHERE idalumno=".$a;
  $rsexiste2 = mysql_query($idexiste2,$conexion);
  if(mysql_num_rows($rsexiste2)!=0){
    $rowxx2 = mysql_fetch_assoc($rsexiste2);
      $idexis2 = $rowxx2['cod_especialidad'];
    
  }else{
    $idexis2 = 0;
  }
	echo $idexis2;
?>
<form id="form1" name="form1" method="post" action="guardasignacurso.php">  
  <center><strong>Planilla de Inscripcion </strong>
  <table width="50%" border="0" align="center"  class="down1">


  <tr>
  <td align="right">Cedula:</td>
  <td><span id="sprytextfield2">
  <input type="text" class="caja" name="id" id="id" value="<?php echo $rowx['cedula']; ?>"readonly/>
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"/></span></span></td>
  </tr>

  <tr>
  <td align="right">Nombre:</td>
  <td><span id="sprytextfield2">
  <input type="text" class="caja" name="id" id="id" value="<?php echo $rowx['nombre']; ?>"readonly/>
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"/></span></span></td>
  </tr>

  <tr>
  <td align="right">Apellido:</td>
  <td><span id="sprytextfield2">
  <input type="text" class="caja" name="id" id="id" value="<?php echo $rowx['apellido_paterno']; ?>"readonly/>
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"/></span></span></td>
  </tr>
  
  <tr>
  <td align="right">Carrera:</td>
  <td>
  <input type="hidden" name="id" id="id" value="<?php echo $a; ?>"/>
  
  <select name="carrera" id="carrera" >
  <option value="0">--- SELECCIONE ---</option>
  <?php
	$carrera	= "SELECT * FROM especialidad WHERE cod_especialidad NOT IN(".$idexis2.") ";
	$rscarrera	= mysql_query($carrera,$conexion) or die(mysql_error());
	if(mysql_num_rows($rscarrera) != 0){
		while($rowxxxx2	= mysql_fetch_assoc($rscarrera)){
		echo '<option value="'.$rowxxxx2['cod_especialidad'].'">'.$rowxxxx2['especialidad'].'</option>';
		}
	}else{
		echo '<option value="0">--- YA PERTENECE A UNA CARRERA ---</option>';
	}
  ?>
  </select>
  </td>
  </tr>

  <tr>
  <td align="right">Unidad Curricular I:</td>
  <td>
  <input type="hidden" name="id" id="id" value="<?php echo $a; ?>"/>
  
  <select name="curso" id="curso" >
  <option value="0">--- SELECCIONE ---</option>
  <?php
  $materia  = "SELECT * FROM curso WHERE idcurso NOT IN(".$idexis.") ";
  $rsmateria  = mysql_query($materia,$conexion);
  if(mysql_num_rows($rsmateria) != 0){
    while($rowx = mysql_fetch_assoc($rsmateria)){
    echo '<option value="'.$rowx['idcurso'].'">'.$rowx['nombre'].'</option>';
    }
  }else{
    echo '<option value="0">--- NO DISPONIBLE ---</option>';
  }
  ?>
  </select>
  </td>
  </tr>

  <tr>
  <td align="right">Unidad Curricular II:</td>
  <td>
  <input type="hidden" name="id" id="id" value="<?php echo $a; ?>"/>
  
  <select name="curso2" id="curso" >
  <option value="0">--- SELECCIONE ---</option>
  <?php
  $materia2  = "SELECT * FROM curso WHERE idcurso NOT IN(".$idexis."0) ";
  $rsmateria2  = mysql_query($materia2,$conexion);
  if(mysql_num_rows($rsmateria2) != 0){
    while($rowx2 = mysql_fetch_assoc($rsmateria2)){
    echo '<option value="'.$rowx2['idcurso'].'">'.$rowx2['nombre'].'</option>';
    }
  }else{
    echo '<option value="0">--- NO DISPONIBLE ---</option>';
  }
  ?>
  </select>
  </td>
  </tr>

  <tr>
  <td align="right">Unidad Curricular III:</td>
  <td>
  <input type="hidden" name="id" id="id" value="<?php echo $a; ?>"/>
  
  <select name="curso2" id="curso" >
  <option value="0">--- SELECCIONE ---</option>
  <?php
  $materia3  = "SELECT * FROM curso WHERE idcurso NOT IN(".$idexis."0) ";
  $rsmateria3  = mysql_query($materia3,$conexion);
  if(mysql_num_rows($rsmateria3) != 0){
    while($rowx3 = mysql_fetch_assoc($rsmateria3)){
    echo '<option value="'.$rowx3['idcurso'].'">'.$rowx3['nombre'].'</option>';
    }
  }else{
    echo '<option value="0">--- NO DISPONIBLE ---</option>';
  }
  ?>
  </select>
  </td>
  </tr>
  
  <tr>
  <td align="right">Fecha Inicial:</td>
  <td><span id="sprytextfield2">
  <input type="text" name="fechainicial" id="fechainicial" size="28" class="tcal" required />
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"/></span></span></td>
  </tr>
  
  <tr>
  <td align="right">Fecha Final:</td>
  <td><span id="sprytextfield3">
    <input type="text" name="fechafinal" id="fechafinal" size="28" class="tcal" required />
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"/></span></span></td>
  </tr>

  <tr>
  <td align="right">Numero de Deposito:</td>
  <td><span id="sprytextfield3">
    <input type="text" name="nro_deposito" id="nro_deposito" size="28" class="caja" required />
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"/></span></span></td>
  </tr>

  <tr>
  <td align="right">Fecha Deposito:</td>
  <td><span id="sprytextfield3">
    <input type="text" name="fechadeposito" id="fechadeposito" size="28" class="tcal" required />
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"/></span></span></td>
  </tr>

  <tr>
  <td align="right">Monto:</td>
  <td><span id="sprytextfield3">
    <input type="text" name="monto" id="monto" size="28" class="caja" pattern="[0-9]{4}" required />
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"/></span></span></td>
  </tr>
  
  <tr>
  <td colspan=2>
  <input type="button" style="cursor: pointer;" class="boot" onclick="javascript:window.history.back();" value="REGRESAR" /> 
  <input type="reset" style="cursor: pointer;"  class="boot"  name="guarda" value="LIMPIAR" />
  <input type="submit" style="cursor: pointer;"  class="boot"  name="guarda" value="GUARDAR" />
  </td>
  </tr>
  
  </table>
  </center>
  <script type="text/javascript">
	
	var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
	var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
	var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
	</script>
</form>