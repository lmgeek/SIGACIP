<link href="css/main.css" rel="stylesheet" type="text/css"/>
<link href="css/tablas.css" rel="stylesheet" type="text/css" />
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
<small><font color="red">* Al eliminar una Materia, igual se eliminan los que le pertenece a un Aspirante</font></small>
<table width="100%">
		<tr>
		<td class="down1">
		<strong><center> ESPECIALIDADES DISPONIBLES </center></strong>
		</td>
		</tr>
		</table>
<table id="table" cellspacing="0" width="100%">
 <thead>
  <tr class="asc" id="head">
   <th></th>
   <th>Nro.</th>
   <th>ESPECIALIDAD</th>
   <th>NOMBRE</th>
   <th>DESCRIPCION</th>
   <th>COSTO</th>
  </tr>
 </thead>
 <tbody id="tbody">
 <?php 
 include('config.php');
 $contador = 0;
 $sql = "SELECT * FROM curso order by especialidad";
 $rs  = mysql_query($sql,$conexion);
 if(mysql_num_rows($rs) !=0 ){
	while($row=mysql_fetch_assoc($rs)){
		$class="odd";
		$contador = $contador + 1;	 
		if($contador%2){$class="even";}
		
		$especialidad = $row['especialidad'];
		$costo_curso = $row['uc']*177;

		$sql1 = "SELECT especialidad FROM especialidad WHERE cod_especialidad ='{$especialidad}'";
		$rs1  = mysql_query($sql1,$conexion);
		if(mysql_num_rows($rs1) !=0 ){
			$espec = mysql_fetch_assoc($rs1);
	
		
		echo '<tr class="'.$class.'">';
		echo '<td>';
	    echo '<img src="imagenes/actions-edit.png" onclick="editar('.$row['idcurso'].')"/> Editar ';
		echo '<img src="imagenes/actions-delete.png" onclick="eliminar('.$row['idcurso'].')"/> Borrar';
		echo '</td>';
		echo '<td>'.$contador.'</td>';
		echo '<td>'.$espec['especialidad'].'</td>';
		echo '<td>'.$row['nombre'].'</td>';
		echo '<td>'.$row['descripcion'].'</td>';
		echo '<td>BsF. '.$costo_curso.'</td>';
		
		echo '</tr>';
	}
}
 }else{
	echo '<tr><td colspan=7><center>No Existe Registros</center></td></tr>';
 }
 ?>
 
 </tbody>
</table>