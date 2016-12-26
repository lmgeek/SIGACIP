<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<style type="text/css">
	p table {
		font-size: 15px;
	}
</style>

<?php 

	include('config.php');
        if (isset($_GET['cedula1']) && isset($_GET['cedula2']) && isset($_GET['cohorte'])){

        	$cedula1 = $_GET['cedula1'];
            $cedula2 = $_GET['cedula2'];
        	$cohorte = $_GET['cohorte'];

        	$cedula  = $cedula1.$cedula2;

        	

        	$sql = "SELECT * FROM alumno WHERE cedula='{$cedula}'";
            $rs = mysql_query($sql,$conexion);
            if(mysql_num_rows($rs)!=0){
              $row = mysql_fetch_assoc($rs);
            }

            $sql2 = mysql_query("SELECT * FROM unidad_tributaria") or die(mysql_error());
            $ut = mysql_fetch_array($sql2);

            $idalumno = $row['idalumno'];
            $especialidad = $row['especialidad'];

            

            $especialidad1 = "";
            $sql3 = "SELECT * FROM especialidad WHERE cod_especialidad = '".$especialidad."'";
            $rs3 = mysql_query($sql3,$conexion);
            if(mysql_num_rows($rs3)!=0){
              $row3 = mysql_fetch_assoc($rs3);
              $especialidad1 = $row3['especialidad'];
            }else {
                $especialidad1 = "";
            }

            $costo  = "";
            $total1 = "";
            $sql2 = "SELECT * FROM pagos WHERE idalumno ='{$idalumno}' AND cohorte ='".$cohorte."'";
            $rs2 = mysql_query($sql2,$conexion);
            if(mysql_num_rows($rs2)!=0){
              while($row2 = mysql_fetch_assoc($rs2)){
                $costo = $costo+$row2['monto_deposito'];
                $total1 = $total1+$row2['monto_total'];
              }
            }

            //Si existe un pago mayor o igual al monto total a cancelar por cohorte
            if ($costo >= $total1) {
                
            

    ?>
    <input type="button" style="cursor: pointer;" class="boot" onclick="javascript:window.history.back();" value="REGRESAR" /> 
    <br><br>
        <div id="constancia">
            <center><img src="img/banner.png" width="90%"></center><br>
            <h1 align="center"><i>Constancia de Inscripci&oacuten</i></h1>
            <br>
            <div style="margin-left: 30px; font-size: 13px;">
            	<i><b>N&uacutecleo / Extensi&oacuten:</b> <u>N&uacutecleo Acad&eacutemico Falc&oacuten.</u><br>
	            <b>Fecha de Inscripci&oacuten:</b> <?php echo date("d-m-Y"); ?> <br>
	            <b>C&eacutedula de Identidad:</b> <u>&nbsp;&nbsp;<?php echo $cedula; ?>&nbsp;&nbsp;</u>
	            <b>Apellidos:</b> <u>&nbsp;&nbsp;<?php echo $row['apellido_paterno']." ".$row['apellido_materno']; ?>&nbsp;&nbsp;</u>
	            <b>Nombres:</b> <u>&nbsp;&nbsp;<?php echo $row['nombre']." ".$row['segundo_nombre']; ?>&nbsp;&nbsp;</u><br>
	            <b>Cohorte:</b> <u>&nbsp;&nbsp;<?php echo $cohorte; ?>&nbsp;&nbsp;</u> <b>Subprograma:</b> <u>&nbsp;&nbsp;<?php echo $especialidad1; ?>&nbsp;&nbsp;</u>
            </div><br>
            <table border="1" width="90%" align="center" style="font-size: 13px;">
            	<tr align="center" style="font-style: italic; font-weight: bold;">
            		<td>Unidades Curriculares</td>
            		<td>Nro de Unidades de Cr&eacutedito (U.C)</td>
            		<td>Unidad Tributaria</td>
            		<td>Costo Materia</td>
            	</tr>

            <?php	

           $sqlx = "SELECT * FROM rel_alumno_curso WHERE idalumno='{$idalumno}'";    
            $rsx  = mysql_query($sqlx,$conexion);
            if(mysql_num_rows($rsx)!=0){
              
              while($curso=mysql_fetch_assoc($rsx)){
                $cursos = $curso['idcurso'];
                $sqlc = "SELECT * FROM curso WHERE idcurso='".$cursos."'";
                $rsc  = mysql_query($sqlc,$conexion);
                if(mysql_num_rows($rsc)!=0){
                  $rowc = mysql_fetch_assoc($rsc);
                }
                $costo_materia = $rowc['uc']*$ut['ut']*2.5;
                echo "<tr align='center'>
                        <td>".$rowc['nombre']."</td>
                        <td>".$rowc['uc']."</td>
                        <td>".$ut['ut']." <i>BsF.</i></td>
                        <td>".$costo_materia." <i>BsF.</i></td>
                      </tr>";
              }

            }else{
                echo "<script>
                      alert('El Aspirante de la Cédula de Identidad  ".$cedula."\\nNo contiene registros de Inscripción,debe de inscribirlo\\npara poder generar la Constancia de Inscripción');
                       document.location=('Contenido.php');
                    </script>";
            }


            ?></table>
            <br>
           <table align="center" border="0" width="110%" style="font-style: italic; font-size: 13px;">
           
<?php
			$sql4 = "SELECT * FROM pagos WHERE idalumno='".$idalumno."'";    
            $rsx2  = mysql_query($sql4,$conexion);
            if(mysql_num_rows($rsx)==0){
                echo     "<tr align='center'>
                <td>Nro Dep&oacutesito:</td>
                <td><u>&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;</u></td>
                <td>Monto del Dep&oacutesito:</td>
                <td><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;</u></td>
                <td>Fecha del Dep&oacutesito:</td>
                <td><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;</u></td>
               </tr>";
               echo     "<tr align='center'>
                <td>Nro Dep&oacutesito:</td>
                <td><u>&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;</u></td>
                <td>Monto del Dep&oacutesito:</td>
                <td><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;</u></td>
                <td>Fecha del Dep&oacutesito:</td>
                <td><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;</u></td>
               </tr>";
               echo     "<tr align='center'>
                <td>Nro Dep&oacutesito:</td>
                <td><u>&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;</u></td>
                <td>Monto del Dep&oacutesito:</td>
                <td><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;</u></td>
                <td>Fecha del Dep&oacutesito:</td>
                <td><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;</u></td>
               </tr>";
            }else {
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
}else{
                $deuda = "";
                $deuda = $costo-$row2['monto_total'];
                echo "<script>
                                  alert('El Aspirante de la Cédula de Identidad  ".$cedula."\\nContiene una deuda de  ".$deuda." BsF.\\npara poder generar la Constancia de Inscripción debe cancelar primero');
                                   document.location=('Contenido.php');
                                </script>";
            }


}else {
	header("Location:Contenido.php");
}


 ?>
