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


?>
  
  <center><strong>Planilla de Inscripcion </strong>
  <table width="50%" border="0" align="center"  class="down1">


  <tr>
  <td align="right">Cedula:</td>
  <td><span id="sprytextfield2">
  <input type="text" class="caja" name="cedula" id="cedula" value="<?php echo $rowx['cedula']; ?>"readonly/>
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"/></span></span></td>
  </tr>

  <tr>
  <td align="right">Nombre:</td>
  <td><span id="sprytextfield2">
  <input type="text" class="caja" name="nombre" id="id" value="<?php echo $rowx['nombre']; ?>"readonly/>
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"/></span></span></td>
  </tr>

  <tr>
  <td align="right">Segundo Nombre:</td>
  <td><span id="sprytextfield2">
  <input type="text" class="caja" name="nombre2" id="id" value="<?php echo $rowx['segundo_nombre']; ?>"readonly/>
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"/></span></span></td>
  </tr>

  <tr>
  <td align="right">Apellido Materno:</td>
  <td><span id="sprytextfield2">
  <input type="text" class="caja" name="apellido" id="id" value="<?php echo $rowx['apellido_paterno']; ?>"readonly/>
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"/></span></span></td>
  </tr>
  
  <tr>
  <td align="right">Apellido Paterno:</td>
  <td><span id="sprytextfield2">
  <input type="text" class="caja" name="apellido2" id="id" value="<?php echo $rowx['apellido_materno']; ?>"readonly/>
  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"/></span></span></td>
  </tr>

<?php 



    #obtenemos que especialidad ya fue asignado para no mostrarlo en el combo
  $idexiste2 = "SELECT cod_especialidad FROM rel_alumno_curso WHERE idalumno=".$a;
  $rsexiste2 = mysql_query($idexiste2,$conexion);
  if(mysql_num_rows($rsexiste2)!=0){
    $rowxx2 = mysql_fetch_assoc($rsexiste2);
      $idexis2 = $rowxx2['cod_especialidad'];

      $carrera  = mysql_query("SELECT * FROM especialidad WHERE cod_especialidad ='{$idexis2}'") or die(mysql_error());
          $rscarrera  = mysql_fetch_array($carrera);           
    ?>

    <tr>
      <td align="right">Especialidad:</td>
      <td><span id="sprytextfield2">
      <input type="text" class="caja" name="especialidad" id="id" value="<?php echo $rscarrera[1]; ?>"readonly/>
      <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"/></span></span></td>
    </tr>


<form id="form1" name="form1" method="post" action="asignargursoalumno2.php">
    <tr>
  <td align="right">Unidad Curricular I:</td>
  <td>
  <select name="curso" id="curso" class="caja">
  <option value="0">--- SELECCIONE ---</option>
  <?php
  $materia  = "SELECT * FROM curso WHERE especialidad='{$idexis2}'";
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

   <input type="hidden"value="<?php echo $a; ?>" name="Id"/>
 

    <?php
    
  }



   ?>

  
  <tr>
  <td colspan=2>
  <input type="button" style="cursor: pointer;" class="boot" onclick="javascript:window.history.back();" value="REGRESAR" /> 
  <input type="submit" style="cursor: pointer;"  class="boot"  name="guarda" value="SIGUIENTE" />
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



<?php 

/*

  <tr>
  <td align="right">Carrera:</td>
  <td>
  <input type="hidden" name="id" id="id" value="<?php echo $a; ?>"/>
  
  <select name="carrera" id="carrera" >
  <option value="0">--- SELECCIONE ---</option>
  <?php
  $carrera  = "SELECT * FROM especialidad WHERE cod_especialidad NOT IN(".$idexis2.") ";
  $rscarrera  = mysql_query($carrera,$conexion) or die(mysql_error());
  if(mysql_num_rows($rscarrera) != 0){
    while($rowxxxx2 = mysql_fetch_assoc($rscarrera)){
    echo '<option value="'.$rowxxxx2['cod_especialidad'].'">'.$rowxxxx2['especialidad'].'</option>';
    }
  }else{
    echo '<option value="0">--- YA PERTENECE A UNA CARRERA ---</option>';
  }
  ?>
  </select>
  </td>
  </tr>
*/
 ?>

