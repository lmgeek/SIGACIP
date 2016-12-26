<html xmlns="http://www.w3.org/1999/xhtml"><head><link href="css/main.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="css/bootstrap.min.css" rel="stylesheet">

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

<style type="text/css">
	p {
		font-size: 19px;
	}

    #constancia{
        margin-left: 120px;
        margin-right: 120px;
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

            $idalumno = $row['idalumno'];
            $especialidad = $row['especialidad'];

            $sqlx = "SELECT * FROM rel_alumno_curso WHERE idalumno='{$idalumno}'";    
            $rsx  = mysql_query($sqlx,$conexion);
            if(mysql_num_rows($rsx)!=0){
              $rowx = mysql_fetch_assoc($rsx);
            }else{
            	echo "<script>
                      alert('El Aspirante de la Cédula de Identidad  ".$cedula."\\nNo contiene registros de Inscripción,debe de inscribirlo\\npara poder generar la Constancia de Inscripción');
                       document.location=('Contenido.php');
                    </script>";
            }

            //Consulta para ver si tiene alguna deuda en los pagos
          /*  $costo = "";
            $sql2 = "SELECT * FROM pagos WHERE idalumno ='{$idalumno}' AND cohorte ='{$cohorte}'";
            $rs2 = mysql_query($sql2,$conexion);
            if(mysql_num_rows($rs2)!=0){
              while($row2 = mysql_fetch_assoc($rs2)){
                $costo = $costo+$row2['monto_deposito'];
              }
            }

            if ($costo >= $rowx['monto_total']) {
                echo "No hay";
            }else{
                $deuda = "";
                $deuda = $costo-$rowx['monto_total'];
                echo "<script>
                                  alert('El Aspirante de la Cédula de Identidad  ".$cedula."\\nContiene una deuda de  ".$deuda." BsF.\\npara poder generar la Constancia de Inscripción debe cancelar primero');
                                   document.location=('Contenido.php');
                                </script>";
            }*/

            $sql3 = "SELECT * FROM especialidad WHERE cod_especialidad = '".$especialidad."'";
            $rs3 = mysql_query($sql3,$conexion);
            if(mysql_num_rows($rs3)!=0){
              $row3 = mysql_fetch_assoc($rs3);
            }
//Captura de Fecha Actual Separada 
$dia = array("Un","Dos","Tres","Cuatro","Cinco","Seis","Siete","Ocho","Nueve","Diez","Once","Doce","Trece","Catorce","Quince",
    "Dieciseis","Diecisiete","Dieciocho","Diecinueve","Veinte","Veintiun","Veintidos","Veintitres","Veinticuatro","Veinticinco",
    "Veintiseis","Veintisiete","Veintiocho","Veintinueve","Treinta","Treinta y un");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
$anio = date("Y"); 


    ?>
    <input type="button" style="cursor: pointer;" class="boot" onclick="javascript:window.history.back();" value="REGRESAR" /> 
    <br><br>
        <div id="constancia">
            <center><img src="img/banner.png" width="90%"></center><br>
            <h1 align="center"><i>Constancia de Estudios</i></h1>
            <br>
            <p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Quien suscribe, <b>Msc. Jos&eacute Mart&iacutenez, Coordinador Local de Investigaci&oacuten y Postgrado del N&uacutecleo Acad&eacutemico Falc&oacuten, de la Universidad Pedag&oacutegica Experimental Libertador en su Instituto de Mejoramiento Profesional del Magisterio,</b> por medio de la presente hace constar que el ciudadano(a):</p>
            <br>
            <center>
                <h2><?php echo $row['apellido_paterno']." ".$row['apellido_materno']." ".$row['nombre']." ".$row['segundo_nombre']; ?></h2>
            </center>
            <br>
            <p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Titular de la Cedula de Identidad <b>N° <?php echo $cedula; ?>,</b> es estudiante Regular de Postgrado de la Especialidad de <b><?php echo $row3['especialidad']; ?>,</b> en esta Universidad.</p>
            <br>
            <p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Constancia que se expide a petici&oacuten de la parte interesada en Santa Ana de Coro, a los <?php echo $dia[date('d')-2]; ?> d&iacuteas del mes de <?php echo $meses[date('n')-1]; ?> del <?php echo $anio; ?></p>
            <br><br><br>

            <center>
                Msc. Jos&eacute Mart&iacutenez<br>
                Coordinador Local de Investigaci&oacuten y Postgrado<br>
                N&uacutecleo Acad&eacutemico Falc&oacuten<br>
                UPEL-IMPM
            </center>


</div>
        <center><br><br>
            <button type="button" class="btn btn-danger btn-lg" onclick="javascript:imprSelec('constancia');function imprSelec(constancia)
            {var ficha=document.getElementById(constancia);var ventimp=window.open(' ','popimpr');ventimp.document.write(ficha.innerHTML);
            ventimp.document.close();ventimp.print();ventimp.close();};">
                        <span class="glyphicon glyphicon-print"></span> Imprimir Constancia
                      </button>
        </center>




<?php



}else {
	header("Location:Contenido.php");
}


 ?>
