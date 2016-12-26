<html xmlns="http://www.w3.org/1999/xhtml"><head><link href="css/main.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/main.css" rel="stylesheet" type="text/css"/>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
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

<script>
function editar(id){
	window.location="editarcurso.php?Id="+id;
}
function eliminar(id){
         var mensaje = "ESTAS SEGURO QUE QUIERES ELIMINAR";
	if(confirm(mensaje)){
		window.location="eliminarcurso.php?Id="+id;
	}else{
	
	}
	
}
</script>
<?php 
include('config.php');




					if(isset($_POST['cohorte']) && !empty($_POST['cohorte']) && isset($_POST['tipo_reporte']) && !empty($_POST['tipo_reporte'])){
                            $cohorte = htmlentities($_POST['cohorte']);
                            $tipo_reporte = htmlentities($_POST['tipo_reporte']);

                 if ($tipo_reporte=="ADMITIDOS") {

                 


						?>
						<input type="button" style="cursor: pointer;" class="boot" onclick="javascript:window.history.back();" value="REGRESAR" /> <br><br><br>
						<div id="imprimir">
						<CENTER><img src="img/banner.png" align="center"></CENTER>
						<table width="100%">
								<tr>
								<td class="down1">
								<strong><center> REPORTE ADMINISTRATIVO  PERIODO ACADEMICO: <?php echo $cohorte; ?> ALUMNOS <?php echo $tipo_reporte; ?></center></strong>
								</td>
								</tr>
								<tr>
									<td>
										<center>Cuenta Banco de Venezuela Cta Cte N° 0102-0501-83-0000939867 A Nombre de "UPEL"</center>
									</td>
								</tr>
								</table>
						<table id="table" cellspacing="0" width="100%" border="1">
						 <thead>
						  <tr class="asc" id="head">
						   <th>Nro.</th>
						   <th>CEDULA</th>
						   <th>PARTICIPANTES</th>
						   <th>NRO DE DEPOSITO</th>
						   <th>FECHA</th>
						   <th>MONTO</th>
						  </tr>
						 </thead>
						 <tbody id="tbody">

						 <?php 
						 $contador = 0;
						 $total = 0;
						 $sql = "SELECT * FROM alumno";
						 $rs  = mysql_query($sql,$conexion);
						 if(mysql_num_rows($rs) !=0 ){
							while($row=mysql_fetch_assoc($rs)){
								$class="odd";
								$contador = $contador + 1;	 
								if($contador%2){$class="even";}
								
								$idalumno = $row['idalumno'];
								$total = $total+$row['monto_deposito'];

							
								
								echo '<tr class="'.$class.'">';

								echo '<td>'.$contador.'</td>';
								echo '<td>'.$row['cedula'].'</td>';
								echo '<td>'.$row['nombre']." ".$row['apellido_paterno'].'</td>';
								echo '<td>'.$row['nro_deposito'].'</td>';
								echo '<td>'.$row['fecha_deposito'].'</td>';
								echo '<td>BsF. '.$row['monto_deposito'].'</td>';				
								echo '</tr>';
							}
								echo '<tr >';
								echo '<td colspan="5" align=right><b>TOTAL:</b></td>';
								echo '<td><b>BsF. '.$total.'</b></td>';
								echo '</tr>';
						 }else{
							echo '<tr><td colspan=7><center>No Existe Registros</center></td></tr>';
						 }
							 ?>
							 </tbody>
							</table>

							<table align="center">
								<tr align="center">
									<td colspan="6"><br><br><br><img src="img/firma.png" align="center" width="50%"></td>
								</tr>
							</table>
							<br><br><br>
							</div>
									<center>
									<button type="button" class="btn btn-danger btn-lg" onclick="javascript:imprSelec('imprimir');function imprSelec(imprimir)
							            {var ficha=document.getElementById(imprimir);var ventimp=window.open(' ','popimpr');ventimp.document.write(ficha.innerHTML);
							            ventimp.document.close();ventimp.print();ventimp.close();};">
							                        <span class="glyphicon glyphicon-print"></span> Imprimir Listado
							                      </button>
							                      </center>
							                      <br><br><br>
							<?php 
						}else{

							


							?>
						<input type="button" style="cursor: pointer;" class="boot" onclick="javascript:window.history.back();" value="REGRESAR" /> <br><br><br>
						<div id="imprimir">
						<CENTER><img src="img/banner.png" align="center"></CENTER>
						<table width="100%">
								<tr>
								<td class="down1">
								<strong><center> REPORTE ADMINISTRATIVO  PERIODO ACADEMICO: <?php echo $cohorte; ?> ALUMNOS <?php echo $tipo_reporte; ?></center></strong>
								</td>
								</tr>
								
									<td>
										<center>Cuenta Banco de Venezuela Cta Cte N° 0102-0106-36-0001028023 A Nombre de "IMPM-UPEL"</center>
									</td>
								</tr>
								</table>
						<table id="table" cellspacing="0" width="100%" border="1">
						 <thead>
						  <tr class="asc" id="head">
						   <th>Nro.</th>
						   <th>CEDULA</th>
						   <th>PARTICIPANTES</th>
						   <th>ESPECIALIDAD</th>
						   <th>NRO DE DEPOSITO</th>
						   <th>FECHA</th>
						   <th>MONTO</th>
						  </tr>
						 </thead>
						 <tbody id="tbody">

						 <?php 
						 $contador = 0;
						 $total = 0;
						 $sql = "SELECT * FROM pagos WHERE cohorte ='{$cohorte}'";
						 $rs  = mysql_query($sql,$conexion);
						 if(mysql_num_rows($rs) !=0 ){
							while($row=mysql_fetch_assoc($rs)){
								$class="odd";
								$contador = $contador + 1;	 
								if($contador%2){$class="even";}
								
								$idalumno = $row['idalumno'];
								$total = $total+$row['monto_deposito'];

								$sql1 = "SELECT * FROM alumno WHERE idalumno ='{$idalumno}'";
								$rs1  = mysql_query($sql1,$conexion);
								if(mysql_num_rows($rs1) !=0 ){
									$espec = mysql_fetch_assoc($rs1);

									$especialidad2 = $espec['especialidad'];
							
								$sql2 = "SELECT * FROM especialidad WHERE cod_especialidad ='{$especialidad2}'";
								$rs2  = mysql_query($sql2,$conexion);
								if(mysql_num_rows($rs1) !=0 ){
									$espec2 = mysql_fetch_assoc($rs2);
								}
								echo '<tr class="'.$class.'">';

								echo '<td>'.$contador.'</td>';
								echo '<td>'.$espec['cedula'].'</td>';
								echo '<td>'.$espec['nombre']." ".$espec['apellido_paterno'].'</td>';
								echo '<td>'.$espec2['especialidad'].'</td>';
								echo '<td>'.$row['nro_deposito'].'</td>';
								echo '<td>'.$row['fecha_deposito'].'</td>';
								echo '<td>BsF. '.$row['monto_deposito'].'</td>';				
								echo '</tr>';
							}
						}		echo '<tr >';
								echo '<td colspan="5" align=right><b>TOTAL:</b></td>';
								echo '<td><b>BsF. '.$total.'</b></td>';
								echo '</tr>';
						 }else{
							echo "<script>
				                      alert('No existen registros para este Periodo Académico.');
				                       document.location=('Contenido.php');
				                    </script>";
						 }
							 ?>
							 </tbody>
							</table>

							<table align="center" >
								<tr align="center">
									<td colspan="6"><br><br><br><img src="img/firma.png" align="center" width="50%"></td>
								</tr>
							</table>
							<br><br><br>
							</div>
									<center>
									<button type="button" class="btn btn-danger btn-lg" onclick="javascript:imprSelec('imprimir');function imprSelec(imprimir)
							            {var ficha=document.getElementById(imprimir);var ventimp=window.open(' ','popimpr');ventimp.document.write(ficha.innerHTML);
							            ventimp.document.close();ventimp.print();ventimp.close();};">
							                        <span class="glyphicon glyphicon-print"></span> Imprimir Listado
							                      </button>
							                      </center>
							                      <br><br><br>
							 <?php 

						}

                     }else{

 ?>
<input type="button" style="cursor: pointer;" class="boot" onclick="javascript:window.history.back();" value="REGRESAR" /> <br>
				<form name="form1" method="post" action="planilladministrativa.php">
				 <center>
                        <h3 class="text-center">
                           LISTADO ADMINISTRATIVO DE PAGOS</h3>
	                        <table  width="50%" border="0" align="center"  class="down1">
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
						          <td colspan="2"><input type="submit" class="boot" name="guarda" value="BUSCAR"> </td>
								</tr>

								<tr>
									<td align="right">Seleccione tipo de Reporte</td>
									<td>
										<select name="tipo_reporte" class="caja">
											<option value="">------- SELECCIONE --------</option>
											<option value="ADMITIDOS">Admitidos</option>
											<option value="REGULARES">Regulares</option>
										</select>
									</td>
								</tr>

							</table>
	                    </form>
              </center>
              <br><br><br>

                    <?php   } ?>