<meta http-equiv="Content-type" content="text/html" charset="utf-8">
<link href="css/main.css" rel="stylesheet" type="text/css"/>
<link href="css/tablas.css" rel="stylesheet" type="text/css" />
<script>
function editar(id){
	window.location="editaralumno.php?Id="+id;
}
function eliminar(id){
        var mensaje = "ESTAS SEGURO QUE QUIERES ELIMINAR";
	if(confirm(mensaje)){
		window.location="eliminaralumno.php?Id="+id;
	}else{
	
	}
	
}
</script>
<input type="button" style="cursor: pointer;" class="boot" onclick="javascript:window.history.back();" value="REGRESAR" /> <br><br><br>
<small><font color="red">* Al eliminar un Alumno, igual se eliminan los Especialidades la que le pertenece y los cursos a las materias a la cual pertenecia</font></small>
<table width="100%">
		<tr>
		<td class="down1">
		<strong><center> LISTA DE ASPIRANTES </center></strong>
		</td>
		</tr>
                
		</table>
                
<table id="table" cellspacing="0" width="100%">
 <thead>
  <tr class="asc" id="head">
   <th></th>
   <th>C&EacuteDULA</th>
   <th>PRIMER NOMBRE</th>
   <th>PRIMER APELLIDO</th>
   <th>CORREO ELECTR&OacuteNICO</th>
   <th>TEL&EacuteFONO CELULAR</th>
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
		
		
		
		echo '<tr class="'.$class.'">';
		echo '<td>';
	    echo '<a href="editaralumno.php?cedula='.$row["cedula"].'"><img src="imagenes/edit.png" width="20px"/></a>' ;
		echo ' <img src="imagenes/delete.png" onclick="eliminar('.$row['idalumno'].')" width="20px"/>';
		echo '</td>';
		echo '<td>'.$row['cedula'].'</td>';
		echo '<td>'.$row['nombre'].'</td>';
		echo '<td>'.$row['apellido_paterno'].'</td>';
		echo '<td>'.$row['correo'].'</td>';
		echo '<td>'.$row['telefono'].'</td>';
		
		echo '</tr>';
	}
	echo '<tr>
			<td><br><br></td>
		  </tr>';
 }else{
	echo '<tr><td colspan=7><center>No Existe Registros</center></td></tr>';
 }
 ?>
 
 </tbody>
</table>