<style type="text/css">
	p table {
		font-size: 15px;
	}
</style>

<?php 

	include('config.php');
        if (isset($_GET['cedula1']) && isset($_GET['cedula2'])){

        	$cedula1 = $_GET['cedula1'];
        	$cedula2 = $_GET['cedula2'];

        	$cedula  = $cedula1.$cedula2;

        	

        	$sql = "SELECT * FROM alumno WHERE cedula='{$cedula}'";
            $rs = mysql_query($sql,$conexion);
            if(mysql_num_rows($rs)!=0){
              $row = mysql_fetch_assoc($rs);
            }

            $idalumno = $row['idalumno'];

            $sqlx = "SELECT * FROM rel_alumno_curso WHERE idalumno='{$idalumno}'";    
            $rsx  = mysql_query($sqlx,$conexion);
            if(mysql_num_rows($rsx)!=0){
              $rowx = mysql_fetch_assoc($rsx);
            }

    ?>
        <div id="constancia">
            <center><img src="img/banner.png" width="90%"></center><br>
            <h1 align="center"><i>Constancia de Inscripci&oacuten</i></h1>
            <br>
            <div style="margin-left: 30px; font-size: 13px;">
            	<i>N&uacutecleo / Extensi&oacuten: <u>N&uacutecleo Acad&eacutemico Falc&oacuten.</u><br>
	            Fecha de Inscripci&oacuten: <?php  ?> <br>
	            C&eacutedula de Identidad: <u>&nbsp;&nbsp;<?php echo $cedula; ?>&nbsp;&nbsp;</u>
	            Apellidos: <u>&nbsp;&nbsp;<?php echo $row['apellido_paterno']." ".$row['apellido_materno']; ?>&nbsp;&nbsp;</u>
	            Nombres: <u>&nbsp;&nbsp;<?php echo $row['nombre']." ".$row['segundo_nombre']; ?>&nbsp;&nbsp;</u><br>
	            Cohorte: <u>&nbsp;&nbsp;<?php echo $rowx['cohorte']; ?>&nbsp;&nbsp;</u> Subprograma: <u>&nbsp;&nbsp;<?php  ?>&nbsp;&nbsp;</u>
            </div><br>
            <table border="1" width="90%" align="center" style="font-size: 13px;">
            	<tr align="center" style="font-style: italic;">
            		<td>Unidades Curriculares</td>
            		<td>Lapso</td>
            		<td>A&ntildeo</td>
            		<td>Nro de Unidades de Cr&eacutedito (U.C)</td>
            	</tr>

            <?php	

            while($curso=mysql_fetch_array($rsx)){
            	$cursos = $curso['idcurso'];
            	$sqlc = "SELECT * FROM curso WHERE idcurso='{$cursos}'";
            	$rsc  = mysql_query($sqlc,$conexion);
            	if(mysql_num_rows($rsc)!=0){
	              $rowc = mysql_fetch_assoc($rsc);
	            }
            	echo "<tr align='center'>
		            	<td>".$rowc['nombre']."</td>
		            	<td>Lapso</td>
		            	<td>A&ntildeo</td>
		            	<td>".$rowc['uc']."</td>
		              </tr>";
            }
            ?></table>
            <br>
           <table align="center" border="0" width="110%" style="font-style: italic; font-size: 13px;">
           
<?php
			$sql4 = "SELECT * FROM rel_alumno_curso WHERE idalumno='{$idalumno}'";    
            $rsx2  = mysql_query($sql4,$conexion);
            while($curso2=mysql_fetch_array($rsx2)){
            	echo     "<tr>
           	<td>Nro Dep&oacutesito:</td>
           	<td><u>&nbsp;&nbsp;".$curso2['nro_deposito']."&nbsp;&nbsp;</u></td>
           	<td>Monto del Dep&oacutesito:</td>
           	<td><u>&nbsp;&nbsp;".$curso2['monto_deposito']." BsF.&nbsp;&nbsp;</u></td>
           	<td>Fecha del Dep&oacutesito:</td>
           	<td><u>&nbsp;&nbsp;".$curso2['fecha_deposito']."&nbsp;&nbsp;</u></td>
           </tr>";
            }

            echo "</table>";
            echo "<br><br><br>
            <center>";
            echo "____________________________________________<br>
            Responsable de la Unidad de Secretar&iacutea</i>";
            echo "</center>";

?>
</div>
<button type="button" class="btn btn-danger btn-lg" onclick="javascript:imprSelec('constancia');function imprSelec(constancia)
            {var ficha=document.getElementById(constancia);var ventimp=window.open(' ','popimpr');ventimp.document.write(ficha.innerHTML);
            ventimp.document.close();ventimp.print();ventimp.close();};">
                        <span class="glyphicon glyphicon-print"></span> Imprimir Constancia
                      </button>




<?php



}else {
	header("Location:Contenido.php");
}


 ?>
