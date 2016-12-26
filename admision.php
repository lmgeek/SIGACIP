<html xmlns="http://www.w3.org/1999/xhtml"><head><link href="css/main.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
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

					if(isset($_GET['cohorte']) && !empty($_GET['cohorte'])){
                        	$cohorte = htmlentities($_GET['cohorte']);

?>
<input type="button" style="cursor: pointer;" class="boot" onclick="javascript:window.history.back();" value="REGRESAR" /> <br><br><br>
<div id="imprimir">
<center>
	<img src="img/banner.png" width="70%">
	<h3 class="text-center">LISTADO DE ADMITIDOS</h3>
	<b>COHORTE:</b><i> <?php echo $cohorte; ?> </i></p>
	<br>
	<table id="table" cellspacing="0" width="100%" border="1">
 <thead>
  <tr class="asc" id="head">
   <th>C&EacuteDULA</th>
   <th>PRIMER NOMBRE</th>
   <th>SEGUNDO NOMBRE</th>
   <th>PRIMER APELLIDO</th>
   <th>SEGUNDO APELLIDO</th>
   <th>CORREO ELECTR&OacuteNICO</th>
   <th>TEL&EacuteFONO CELULAR</th>
   <th>TEL&EacuteFONO HABITACIÓN</th>
  </tr>
 </thead>
 <tbody id="tbody">
 <?php 
 include('config.php');
 $contador = 0;
 $sql = "SELECT * FROM alumno WHERE cohorte ='{$cohorte}' order by cedula ASC";
 $rs  = mysql_query($sql,$conexion);
 if(mysql_num_rows($rs) !=0 ){
	while($row=mysql_fetch_assoc($rs)){
		$class="odd";
		$contador = $contador + 1;	 
		if($contador%2){$class="even";}
		
		 $consulta = mysql_query("SELECT * FROM especialidad WHERE cod_especialidad='".$row['especialidad']."'")or die(mysql_error());
                      $especialidad = mysql_fetch_array($consulta);

		
		echo '<tr class="'.$class.'">';
			echo '<td>'.$row['cedula'].'</td>';
			echo '<td>'.$row['nombre'].'</td>';
			echo '<td>'.$row['segundo_nombre'].'</td>';
			echo '<td>'.$row['apellido_paterno'].'</td>';
			echo '<td>'.$row['apellido_materno'].'</td>';
			echo '<td>'.$row['correo'].'</td>';
			echo '<td>'.$row['telefono'].'</td>';
			echo '<td>'.$row['telef_habitacion'].'</td>';
		echo '</tr>';
	}
 }else{
	echo '<tr><td colspan=7><center>No Existe Registros</center></td></tr>';
 }
 ?>
 
 </tbody>
</table>
<br>
			<?php
// primero conectamos siempre a la base de datos mysql
$sql = "SELECT * FROM alumno WHERE cohorte = '{$cohorte}'";  // sentencia sql
$result = mysql_query($sql);
$numero = mysql_num_rows($result); // obtenemos el número de filas
echo 'El número de Admitidos son: <b> '.$numero.' Participantes</b>';  // imprimos en pantalla el número generado
?>

	</div>
			<center>


			<br><br><br><br>
					<button type="button" class="btn btn-danger btn-lg" onclick="javascript:imprSelec('imprimir');function imprSelec(imprimir)
            {var ficha=document.getElementById(imprimir);var ventimp=window.open(' ','popimpr');ventimp.document.write(ficha.innerHTML);
            ventimp.document.close();ventimp.print();ventimp.close();};">
                        <span class="glyphicon glyphicon-print"></span> Imprimir Listado
                      </button>

            </center>
</center>
<br><br><br>


<?php

                     }else{

 ?>
<input type="button" style="cursor: pointer;" class="boot" onclick="javascript:window.history.back();" value="REGRESAR" /> 
				<form name="form1" method="get" action="admision.php">
				 <center>
                        <h3 class="text-center">
                           Listado de Admitidos</h3>
	                        <table  width="50%" border="0" align="center"  class="down1">
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
						                    echo  "</select>";
						            echo "</td>";
						          ?>
								
						          <td rowspan="2">
						          	<input type="submit" class="boot" name="guarda" value="Buscar Estudiante">
						          </td>
								</tr>

							</table>
	                    </form>
              </center>

                    <?php   } ?>

                    