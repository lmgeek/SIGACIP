<html xmlns="http://www.w3.org/1999/xhtml"><head><link href="css/main.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

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




					if(isset($_POST['cedula']) && !empty($_POST['cedula'])){
                            $cedula = htmlentities($_POST['cedula']);

                            $query = mysql_query("SELECT * FROM alumno WHERE cedula='".$cedula."'") or die(mysql_error());
                            //Verificamos que la Cedula Exista en la Base de Datos
                            if (mysql_num_rows($query)>0){

                              $row2 = mysql_fetch_array($query);


?>
<div id="imprimir">

	<table  width="100%" id="tabla" >
	<tr>
		<td><img src="img/logo-upel.jpg" width="90px"></td>
		<td align="center" colspan="4">Republica Bolivariana de Venezuela<br>Universidad Pedagogica Experimental El Libertador<br>
		Instituto de Mejoramiento Profesional del Magisterio<br>Nucleo Academico Falcon</td>
		<td><img src="img/LOGO-IPM.gif" width="90px"></td>
	</tr>
	<tr>
			<td colspan="6" align="center"<font size="3px"><b>CONSTANCIA DE ADMISION</b></font></td>
		</tr>
		<tr>
			<td colspan="6">Datos Basicos<hr></td>
		</tr>
		<tr>
			<td>Nacionalidad</td>
			<td><?php echo $row2['pais']; ?></td>
			<td>Cedula</td>
			<td><?php echo $row2['cedula']; ?></td>
		</tr>
		<tr>
			<td colspan="2">Numero de Pasaporte</td>
			<td><?php echo $row2['pasaporte']; ?></td>
		</tr>
		<tr>
			<td>Deposito Numero</td>
			<td><?php echo $row2['pais']; ?></td>
			<td>Fecha del deposito</td>
			<td><?php echo $row2['pais']; ?></td>
		</tr>
		<tr>
			<td>Modo de Ingreso</td>
			<td><?php echo $row2['pais']; ?></td>
		</tr>
		<tr>
			<td>Subprograma</td>
			<td><?php echo $row2['pais']; ?></td>
		</tr>
		<tr>
			<td>Cohorte</td>
			<td><?php echo $row2['pais']; ?></td>
		</tr>

		<tr>
			<td colspan="6"><br>Datos Personales<hr></td>
		</tr>
		<tr>
			<td>Apellidos</td>
			<td><?php echo $row2['apellido_paterno']." ".$row2['apellido_materno']; ?></td>
			<td>Nombres</td>
			<td><?php echo $row2['nombre']." ".$row2['segundo_nombre']; ?></td>
		</tr>
		<tr>
			<td>Fecha de Nac.</td>
			<td><?php echo $row2['fecha_nac']; ?></td>
			<td>Estado Civil</td>
			<td><?php echo $row2['estado_civil']; ?></td>
			<td>Sexo</td>
			<td><?php echo $row2['sexo']; ?></td>
		</tr>
		<tr>
			<td colspan="2">Telefono de Habitacion</td>
			<td><?php echo $row2['telef_habitacion']; ?></td>
			<td>Telefono Celular</td>
			<td colspan="2"><?php echo $row2['telefono']; ?></td>
		</tr>
		<tr>
			<td>Telefono de oficina </td>
			<td><?php echo $row2['telef_oficina']; ?></td>
			<td>Correo</td>
			<td><?php echo $row2['correo']; ?></td>
		</tr>
		<tr>
			<td>Direccion</td>
			<td><?php echo $row2['direccion']; ?></td>
		</tr>

		<tr>
			<td colspan="6"><br>Datos Academicos<hr></td>
		</tr>
		<tr>
			<td>Titulo de Pregrado</td>
			<td><?php echo $row2['titulo']; ?></td>
		</tr>
		<tr>
			<td>Universidad donde Egreso</td>
			<td><?php echo $row2['universidad']; ?></td>
		</tr>
		<tr>
			<td>A&ntilde de Egreso</td>
			<td><?php echo $row2['pais']; ?></td>
		</tr>

		<tr>
			<td colspan="6"><br>Datos Academicos<hr></td>
		</tr>
		<tr>
			<td>Institucion donde Trabaja</td>
			<td><?php echo $row2['universidad']; ?></td>
		</tr>
		<tr>
			<td>A&ntildes de Servicio</td>
			<td><?php echo $row2['ano_servicio']; ?></td>
			<td colspan="">Tipo de Organizacion</td>
			<td><?php echo $row2['tipo_org']; ?></td>
		</tr>
		<tr>
			<td>Direccion</td>
			<td><?php echo $row2['pais']; ?></td>
		</tr>
		<tr>
			<td>Telefono</td>
			<td><?php echo $row2['pais']; ?></td>
		</tr>
		<tr>
			<td colspan="6"><u>Observacion</u></td>
		</tr>
		<tr>
			<td rowspan="4"><?php echo $row2['observacion']; ?></td>
		</tr>




	</table>
</div>
<button type="button" class="btn btn-danger btn-lg" onclick="javascript:imprSelec('imprimir');function imprSelec(imprimir)
            {var ficha=document.getElementById(imprimir);var ventimp=window.open(' ','popimpr');ventimp.document.write(ficha.innerHTML);
            ventimp.document.close();ventimp.print();ventimp.close();};">
                        <span class="glyphicon glyphicon-print"></span> Imprimir Listado
                      </button>

<?php



} else {
                              echo "<script>
                                      alert('El Estudiante de la Cedula de Identidad  ".$cedula."\\nNo existe debe registrarlo');
                                       document.location=('registraralumno.php');
                                    </script>";
                            }
                    } else{

 ?>

 <form name="form1" method="post" action="buscar.php">
 <center>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                    <?php
                        if(isset($_GET['errordat'])){ 
                        echo "
                        <div class='alert alert-danger-alt alert-dismissable' align='center'>
                                        <span class='glyphicon glyphicon-exclamation-sign'></span>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                                            ×</button>Ha habido un error al insertar los valores.</div>
                        "; 
                        }else{ 
                        echo ""; 
                        } 
                        ?>
                        <?php
                        if(isset($_GET['errordb'])){ 
                        echo "
                        <div class='alert alert-danger-alt alert-dismissable' align='center'>
                                        <span class='glyphicon glyphicon-exclamation-sign'></span>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                                            ×</button>Error, no ha introducido todos los datos.</div>
                        "; 
                        }else{ 
                        echo ""; 
                        }     
                    ?>
                        

                        <h3 class="text-center">
                           Constancia de Admision</h3>
                        <form class="form form-signup" role="form" >
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            <input name="cedula" type="text" id="cedula" class="form-control caja" placeholder="Cedula Ejemplo: V12345678" title="El formato correcto es: V12345678 o E12345678" required/>
                        </div>
                    </div>
                    
                    </div><br>
                    <input type="submit" class="boot" name="guarda" value="Buscar Estudiante">
                    <br>
                    </form>
              </center>

                    <?php   } ?>