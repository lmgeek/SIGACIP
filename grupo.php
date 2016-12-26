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
</style>

<?php 
include('config.php');




					if(isset($_POST['idcurso']) && !empty($_POST['idcurso']) &&
						isset($_POST['cohorte']) && !empty($_POST['cohorte'])){
                            $idcurso = htmlentities($_POST['idcurso']);
                            $cohorte = htmlentities($_POST['cohorte']);

                            $query = mysql_query("SELECT * FROM rel_alumno_curso WHERE idcurso='".$idcurso."'
                            						AND cohorte='".$cohorte."'") or die(mysql_error());
                            //Verificamos que la Cedula Exista en la Base de Datos
                            if (mysql_num_rows($query)>0){

                            	$row = mysql_fetch_array($query);

                      $consulta = mysql_query("SELECT * FROM especialidad WHERE cod_especialidad='".$row['cod_especialidad']."'")or die(mysql_error());
                      $especialidad = mysql_fetch_array($consulta);

                      $consultacurso = mysql_query("SELECT * FROM curso WHERE idcurso='".$row['idcurso']."'")or die(mysql_error());
                      $curso = mysql_fetch_array($consultacurso);


?>

<div id="imprimir">
<center>
	<img src="img/banner.png" width="70%">
	<h3><?php echo $especialidad['especialidad']; ?> COHORTE <u><?php echo $cohorte; ?></u></h3>
	<h3>UNIDAD CURRICULAR: <u><i><?php echo $curso['nombre']; ?></i></u></h3>

	<br>
	<table id="table" cellspacing="0" width="100%" border="1">
 <thead>
  <tr class="asc" id="head">
   <th>Nro</th>
   <th>C&EacuteDULA</th>
   <th>NOMBRES</th>
   <th>APELLIDOS</th>
   <th>FIRMA</th>
  </tr>
 </thead>
 <tbody id="tbody">
 <?php 
 include('config.php');
 $contador = 0;

	while($row=mysql_fetch_assoc($query)){
		$class="odd";
		$contador = $contador + 1;	 
		if($contador%2){$class="even";}
		
		 $consulta = mysql_query("SELECT * FROM alumno WHERE idalumno='".$row['idalumno']."'")or die(mysql_error());
                      $alumno = mysql_fetch_array($consulta);

		
		echo '<tr class="'.$class.'">';
			echo '<td>'.$alumno['cedula'].'</td>';
			echo '<td>'.$alumno['nombre'].' '.$alumno['segundo_nombre'].'</td>';
			echo '<td>'.$alumno['apellido_paterno'].' '.$alumno['apellido_materno'].'</td>';
			echo '<td>'.$alumno['correo'].'</td>';
			echo '<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>';
		echo '</tr>';
	}
 
 ?>
 
 </tbody>
</table>

	
	<br><br><br><br><br>
	____________________________________________<br>
	TUTOR(A):<br>
	C&EacuteDULA:
	<br>
	</div>
		<button type="button" class="btn btn-danger btn-lg" onclick="javascript:imprSelec('imprimir');function imprSelec(imprimir)
            {var ficha=document.getElementById(imprimir);var ventimp=window.open(' ','popimpr');ventimp.document.write(ficha.innerHTML);
            ventimp.document.close();ventimp.print();ventimp.close();};">
                        <span class="glyphicon glyphicon-print"></span> Imprimir Listado
                      </button>
</center>

<?php 


} else {
                      $consultacurso = mysql_query("SELECT * FROM curso WHERE idcurso='".$idcurso."'")or die(mysql_error());
                      $curso = mysql_fetch_array($consultacurso);
                      $nombre_curso=$curso['nombre'];
                      echo "<script>
                                      alert('El Curso  ".$nombre_curso."\\nNo contiene Alumnos registrados para el\\nPeriodo Academico ".$cohorte."');
                                       document.location=('Contenido.php');
                                    </script>";
                            }
                     }else{

 ?>

				<form name="form1" method="post" action="grupo.php">
				 <center>
                        <h3 class="text-center">
                           Listar Alumnos por Curso</h3>
	                        <table  width="50%" border="0" align="center"  class="down1">
		                        <tr>
						            <td align="right">Seleccione un Curso:</td>
						            <td>
						            <?php
						                    $conn=mysqli_connect("localhost","root","","ejemplo") ;
						                    $consulta="select * from curso";
						                    $resultado=mysqli_query($conn,$consulta);
						                    echo "<select class='caja' name='idcurso' required>";
						                     echo "<option value='' selected>------- SELECCIONE --------</optopn>";
						                    while($lista=mysqli_fetch_array($resultado))
						                    echo "<option  value='".$lista["idcurso"]."'>".$lista["nombre"]."</option>";
						                    echo  "</select>";
						            echo "</td>";
						          ?>
						          <td rowspan="2">
						          	<input type="submit" class="boot" name="guarda" value="Buscar Estudiante">
						          </td>
								<tr>
								  <td align="right">Seleccione una Cohorte:</td>
								  <td>
								  <?php
						                    $conn=mysqli_connect("localhost","root","","ejemplo") ;
						                    $consulta="select * from cohortes";
						                    $resultado=mysqli_query($conn,$consulta);
						                    echo "<select class='caja' name='cohorte' required>";
						                     echo "<option value='' selected>------- SELECCIONE --------</optopn>";
						                    while($lista=mysqli_fetch_array($resultado))
						                    echo "<option  value='".$lista["cohorte"]."'>".$lista["cohorte"]."</option>";
						                    echo  "</select>";
						            echo "</td>";
						          ?>
								</tr>

							</table>
	                    </form>
              </center>
              <br><br><br><br>

                    <?php   } ?>