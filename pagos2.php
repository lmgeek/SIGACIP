<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/main.css" rel="stylesheet" type="text/css"/>
<link href="css/tablas.css" rel="stylesheet" type="text/css" />
<script src="js/validacion_campo_vacio.js" type="text/javascript"></script>
<link href="css/Estilo_Error.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="calendario/tcal.css" />
<script type="text/javascript" src="calendario/tcal.js"></script>


 <link rel="stylesheet" type="text/css" href="css/default.css" />
  <link rel="stylesheet" type="text/css" href="css/jquery-ui-1.7.2.custom.css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui.min.js"></script>
  <script type="text/javascript">
jQuery(function($){
  $.datepicker.regional['es'] = {
    closeText: 'Cerrar',
    prevText: '&#x3c;Ant',
    nextText: 'Sig&#x3e;',
    currentText: 'Hoy',
    monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
    'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
    monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
    'Jul','Ago','Sep','Oct','Nov','Dic'],
    dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
    dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
    weekHeader: 'Sm',
    dateFormat: 'dd/mm/yy',
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: ''};
  $.datepicker.setDefaults($.datepicker.regional['es']);
});    

        $(document).ready(function() {
       $("#datepicker").datepicker({
          //minDate: new Date(2010, 5, 1),
           //maxDate: new Date(2010, 9, 30),
           dateFormat: 'yy-mm-dd',
           constrainInput: true,
           changeMonth: true,
           changeYear: true,
           numberOfMonths:2,
           minDate: '-2Y',
           maxDate: 'Y,m,d', 
           yearRange: '-100',
      });

       $("#datepicker3").datepicker({
          //minDate: new Date(2010, 5, 1),
           //maxDate: new Date(2010, 9, 30),
           dateFormat: 'yy-mm-dd',
           constrainInput: true,
           changeMonth: true,
           changeYear: true,
           numberOfMonths:2,
           minDate: '-2Y',
           maxDate: 'Y,m,d', 
           yearRange: '-100',
      });

       $("#datepicker2").datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-mm-dd',
                minDate: '-70Y',
                maxDate: '-20Y', 
                yearRange: '1',

            });
    });

        
    
    var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
    var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
    var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
    </script>

  <?php 



        
            
            include('config.php');
      $cedula1 = $_POST['cedula1'];
      $cedula2 = $_POST['cedula2'];
      $cohorte = $_POST['cohorte'];
    $a    = $cedula1.$cedula2;

    $idexis = "";
    $idexis2 = "";
    

    $sqlx = "SELECT * FROM alumno WHERE cedula='{$a}'"; 
      $rsx  = mysql_query($sqlx,$conexion);
      if(mysql_num_rows($rsx)!=0){
        $rowx = mysql_fetch_assoc($rsx);
      }
      $idalumno = $rowx['idalumno'];
   ?>
<input type="button" style="cursor: pointer;" class="boot" onclick="javascript:window.history.back();" value="REGRESAR" /> 
  <center>
    <form method="post" action="registropago.php">
    <input type="hidden" value="<?php echo $rowx['idalumno']; ?>" name="Id"></input>

     <center><strong>Planilla de Pago </strong>
      <table width="50%" border="0" align="center"  class="down1">


      <tr>
      <td align="right">Cedula:</td>
      <td><span id="sprytextfield2">
      <input type="text" class="caja" name="cedula" id="cedula" value="<?php echo $rowx['cedula']; ?>"readonly/>
      <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"/></span></span></td>
      </tr>

      <tr>
      <td align="right">Nombre:</td>
      <td><span id="sprytextfield2">
      <input type="text" class="caja" name="nombre" id="id" value="<?php echo $rowx['nombre']; ?>"readonly/>
      <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"/></span></span></td>
      </tr>

      <tr>
      <td align="right">Segundo Nombre:</td>
      <td><span id="sprytextfield2">
      <input type="text" class="caja" name="nombre2" id="id" value="<?php echo $rowx['segundo_nombre']; ?>"readonly/>
      <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"/></span></span></td>
      </tr>

      <tr>
      <td align="right">Apellido Materno:</td>
      <td><span id="sprytextfield2">
      <input type="text" class="caja" name="apellido" id="id" value="<?php echo $rowx['apellido_paterno']; ?>"readonly/>
      <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"/></span></span></td>
      </tr>
      
      <tr>
      <td align="right">Apellido Paterno:</td>
      <td><span id="sprytextfield2">
      <input type="text" class="caja" name="apellido2" id="id" value="<?php echo $rowx['apellido_materno']; ?>"readonly/>
      <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"/></span></span></td>
      </tr>

    <form method="get" action="pagos2.php">
    <input type="hidden" value="<?php echo $rowx['idalumno']; ?>" name="Id"></input>

    <tr>
      <td align="right">Cohorte:</td>
      <td><span id="sprytextfield2">
      <input type="text" class="caja" name="cohorte" id="id" value="<?php echo $cohorte; ?>"readonly/>
      <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"/></span></span></td>
      </tr>


    <tr>
    <td align="right">Especialidad o Carrera:</td>
    <td><span id="sprytextfield2">
    <?php
      $conn=mysqli_connect("localhost","root","","ejemplo") ;
      $consulta1="SELECT * FROM rel_alumno_curso WHERE idalumno LIKE '{$rowx['idalumno']}'";
      $resultado1=mysqli_query($conn,$consulta1);
      if($lista1=mysqli_fetch_array($resultado1)){
        $Especialidad=$lista1['cod_especialidad'];
        $consulta2="SELECT * FROM especialidad WHERE cod_especialidad='{$Especialidad}'";
        $resultado2=mysqli_query($conn,$consulta2);
        if($lista2=mysqli_fetch_array($resultado2)){
          echo "<input type='text'  value='".$lista2["especialidad"]."' class='caja'/>";
          echo "<input type='hidden'  value='".$Especialidad."' class='caja' name='especialidad'/>";
        }
      }else{
        $consulta="SELECT * FROM especialidad";
      $resultado=mysqli_query($conn,$consulta);
      echo "Debe inscribir en una Especialidad";
      }
      
    ?>
    
    <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"/></span></span></td>
    </tr>

    

    <tr>
     <tr>

      <?php 
      $id = $rowx['idalumno'];
      $costo = "";
      $total1 = "";
            $sql2 = "SELECT * FROM pagos WHERE idalumno ='{$idalumno}' AND cohorte ='{$cohorte}'";
            $rs2 = mysql_query($sql2,$conexion);
            if(mysql_num_rows($rs2)!=0){
              while($row2 = mysql_fetch_assoc($rs2)){
                $costo = $costo+$row2['monto_deposito'];
                $total1 = $total1+$row2['monto_total'];
              }
            }
       $deuda = "";
       $deuda = $total1-$costo;

       if ($deuda <= 0){
        echo "<script>
                                  alert('El Aspirante de la Cédula de Identidad  ".$cedula."\\nNo contiene una deuda para este Periodo Académico.');
                                   document.location=('Contenido.php');
                                </script>";
       }

                 ?>
        <td align="right">Total Deuda:</td>
        <td><span id="sprytextfield3">
          <input type="text" name="deuda" id="deuda" size="28" class="caja" value="<?php echo $deuda ?>" readonly />
        <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"/></span></span></td>
        </tr>

        <td align="right">Numero de Deposito:</td>
        <td><span id="sprytextfield3">
          <input type="text" name="nro_deposito" id="nro_deposito" size="28" class="caja" pattern="[0-9]{6,8}" required />
        <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"/></span></span></td>
        </tr>

        <tr>
        <td align="right">Fecha Deposito:</td>
        <td><span id="sprytextfield3">
          <input type="text" name="fecha_deposito" id="datepicker" readonly="readonly" size="12" class="caja" required placeholder="Click para ver Calendario"/>
        <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"/></span></span></td>
        </tr>

        <tr>
        <td align="right">Monto del Deposito:</td>
        <td><span id="sprytextfield3">
          <input type="decimal" name="monto_deposito" id="monto_deposito" size="28" class="caja" required />
        <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"/></span></span></td>
        </tr>


  <td colspan=2>
  <input type="button" style="cursor: pointer;" class="boot" onclick="javascript:window.history.back();" value="REGRESAR" /> 
  <input type="submit" style="cursor: pointer;"  class="boot"  name="guarda" value="SIGUIENTE" />
  </td>
  </tr>
  
  </table>

    </form>

  </center>

