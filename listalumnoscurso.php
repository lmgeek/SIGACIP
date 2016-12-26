<link href="css/main.css" rel="stylesheet" type="text/css"/>
<link href="css/tablas.css" rel="stylesheet" type="text/css" />
<!-- Refresca la pagina cada 2 sg automaticamente -->

<script>
function inscribir(id){
	window.location="asignarcursoalumno.php?Id="+idalumno;
}

</script>
<table width="100%">
		<tr>
		<td class="down1">
		<strong><center> LISTA DE ALUMNOS PARA INSCRIBIR A UNA ESPECIALIDAD  </center></strong>
		</td>
		</tr>
		</table>
<table id="table" cellspacing="0" width="100%">
 <thead>
  <tr class="asc" id="head">
   <th></th>
   <th>CEDULA</th>
   <th>PRIMER NOMBRE</th>
   <th>SEGUNDO NOMBRE</th>
   <th>APELLIDO PATERNO</th>
   <th>APELLIDO MATERNO</th>
   <th>CORREO</th>
   <th>ESPECIALIDAD</th>
   <th>MATERIAS INSCRITAS</th>
  </tr>
 </thead>
 <tbody id="tbody">
 <?php 
 include('config.php');
 $contador = 0;
 $sql = "SELECT * FROM alumno order by idalumno";
 $rs  = mysql_query($sql,$conexion);
 if(mysql_num_rows($rs) !=0 ){
	while($row=mysql_fetch_assoc($rs)){
		$class="odd";
		$contador = $contador + 1;	 
		if($contador%2){$class="even";}
		
		$idcursos = "";
		$sqlx = "SELECT * FROM rel_alumno_curso WHERE idalumno=".$row['idalumno'];		
		$rsx  = mysql_query($sqlx,$conexion);
		if(mysql_num_rows($rsx)!=0){
			while($rowx = mysql_fetch_assoc($rsx)){
				$idcursos = $idcursos.$rowx['idcurso'].',';


					


			}


			
			
		}

				
		$cursosasignados = "";
	    #obtenemos cursos que existe.
		$sqlrs = "SELECT * FROM curso WHERE idcurso IN (".$idcursos."0)";
		$rsxs  = mysql_query($sqlrs,$conexion);
		if(mysql_num_rows($rsxs)!=0){
			while($rowxs = mysql_fetch_assoc($rsxs)){
				$cursosasignados = $cursosasignados.$rowxs['nombre'].',';
			}
		}else {
                    $cursosasignados  = "<font color='red'>NO hay materias inscritas</font>";
                }
		
		$idalumno = $row['idalumno'];
			$espec = $row['especialidad'];
			$consulta = "SELECT `especialidad`.`especialidad` FROM `especialidad`, `rel_alumno_curso` WHERE `rel_alumno_curso`.`cod_especialidad`=`especialidad`.`cod_especialidad` AND `rel_alumno_curso`.`idalumno`=".$row['idalumno'];
			$result = mysql_query($consulta,$conexion);
			if(mysql_num_rows($rsx)!=0){
				$resultad = mysql_fetch_assoc($result);
				$resultado = $resultad['especialidad'];

			}else {
            	$resultado  = "<font color='red'>NO hay Carrera inscrita</font>";
        }

        
		echo '<tr class="'.$class.'">';
		echo '<td>';
	    echo '<a href="asignarcursoalumno2.php?Id='.$row['idalumno'].'"><img src="imagenes/inscribe.jpg" onclick="inscribir('.$row['idalumno'].')"/> </a> ';
		echo '</td>';
		echo '<td>'.$row['cedula'].'</td>';
		echo '<td>'.$row['nombre'].'</td>';
		echo '<td>'.$row['segundo_nombre'].'</td>';
		echo '<td>'.$row['apellido_paterno'].'</td>';
		echo '<td>'.$row['apellido_materno'].'</td>';
		echo '<td>'.$row['correo'].'</td>';
		echo '<td>'.$resultado.'</td>';
		echo '<td>'.$cursosasignados.'</td>';
		echo '</tr>';
	}
 }else{
	echo '<tr><td colspan=7><center>No Existe Registros</center></td></tr>';
 }
 ?>
 
 </tbody>
</table>