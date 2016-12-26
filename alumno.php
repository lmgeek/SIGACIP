<meta http-equiv="Content-type" content="text/html" charset="utf-8">
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

    </script>
<style type="text/css">
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

        if (isset($_GET['Id']) 
             && isset($_GET['especialidad']) && isset($_GET['cohorte'])) {
            
            $Id = $_GET['Id'];
            $cod_especialidad = $_GET['especialidad'];


            //si la unidad de credito se recibio
            if (isset($_GET['uc1']) && !empty($_GET['uc1'])){
              $uc1 = $_GET['uc1'];
              $sqlx = "SELECT * FROM curso WHERE idcurso=".$uc1;    
              $rsx  = mysql_query($sqlx,$conexion);
              if(mysql_num_rows($rsx)!=0){
                $rowx = mysql_fetch_assoc($rsx);
              }
                $total1=$rowx['uc'];





            }else{
                $total1=0;
              }


            //si la unidad de credito se recibio
            if (isset($_GET['uc2']) && !empty($_GET['uc2'])){
              $uc2 = $_GET['uc2'];

              if ($uc2!=0) {
              $sqlx2 = "SELECT * FROM curso WHERE idcurso=".$uc2;    
              $rsx2  = mysql_query($sqlx2,$conexion);
              if(mysql_num_rows($rsx2)!=0){
                $rowx2 = mysql_fetch_assoc($rsx2);
              }
              $total2=$rowx2['uc'];
              }

              if ($uc1==$uc2){
                echo "<script>
                      alert('Seleccionó Unidades Curriculares iguales, Verifique y vuelva a intentar.');
                      window.history.back();
                    </script>";
              }



            }else{
                $total2=0;
              }

              //si la unidad de credito se recibio
            if (isset($_GET['uc3']) && !empty($_GET['uc3'])){
              $uc3 = $_GET['uc3'];

              
              $sqlx3 = "SELECT * FROM curso WHERE idcurso=".$uc3;    
              $rsx3  = mysql_query($sqlx3,$conexion);
              if(mysql_num_rows($rsx3)!=0){
                $rowx3 = mysql_fetch_assoc($rsx3);
              }
              $total3=$rowx3['uc'];


              if (($uc1==$uc2) || ($uc1==$uc3) || ($uc2==$uc3)){
                echo "<script>
                      alert('Seleccionó Unidades Curriculares iguales, Verifique y vuelva a intentar.');
                      window.history.back();
                    </script>";
              }




              
            }else{
                $total3=0;
              }






            $cohorte = $_GET['cohorte'];

            $row   = "";
            $rowx  = "";
            $costo = "";

            $sql = "SELECT * FROM unidad_tributaria";
            $rs = mysql_query($sql,$conexion);
            if(mysql_num_rows($rs)!=0){
              $row = mysql_fetch_assoc($rs);
            }

            

            

            

            $total_uc = $total1+$total2+$total3;
            $costo = $total_uc*$row['ut']*2.5;
            ?>
            <form method="post" action="guardasignacurso.php">
                <input type="hidden" value="<?php echo $Id; ?>" name="Id"></input>
                <input type="hidden" value="<?php echo $uc1; ?>" name="uc1"></input>
                <input type="hidden" value="<?php echo $uc2; ?>" name="uc2"></input>
                <input type="hidden" value="<?php echo $uc3; ?>" name="uc3"></input>
                <input type="hidden" value="<?php echo $cod_especialidad; ?>" name="especialidad"></input>
                <input type="hidden" value="<?php echo $cohorte; ?>" name="cohorte"></input>


            <center><strong>Planilla de Inscripcion </strong>
                <table width="50%" border="0" align="center"  class="down1">

                <tr>
                  <td align="right">Costo de Unidad Tributaria BsF: </td>
                  <td><span id="sprytextfield3">
                    <input type="text" name="ut" value="<?php echo $row['ut'].',00'; ?>" id="monto" size="20" class="caja" required readonly/>
                  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"/></span></span></td>
                  </tr>

                  <tr>
                  <td align="right">Total Unidades de Credito:</td>
                  <td><span id="sprytextfield3">
                    <input type="text" name="total_uc" value="<?php echo $total_uc; ?>" id="monto" size="28" class="caja" required readonly/>
                  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"/></span></span></td>
                  </tr>

                  <tr>
                  <td align="right">Monto a Cancelar BsF: </td>
                  <td><span id="sprytextfield3">
                    <input type="text" name="monto" value="<?php echo $costo; ?>" id="monto" size="28" class="caja" required readonly/>
                  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"/></span></span></td>
                  </tr>

                  <tr>
                    <td align="right">Cohorte:</td>
                    <td>
                    <?php
                            echo "<input type='text' readonly value='".$cohorte."' name='cohorte' class='caja'/>";
                        ?>
                          </select>
                    </td>
                  </tr>

                  <tr>
                  <td align="right">Numero de Deposito:</td>
                  <td><span id="sprytextfield3">
                    <input type="text" name="nro_deposito" id="nro_deposito" size="28" class="caja" pattern="[0-9]{6,8}" placeholder="123456" required /><font color="red">*</font>
                  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"/></span></span></td>
                  </tr>

                  <tr>
                  <td align="right">Fecha Deposito:</td>
                  <td><span id="sprytextfield3">
                    <input type="text" name="fechadeposito" id="datepicker3" readonly="readonly" size="12" class="caja" required placeholder="Click para ver Calendario"/><font color="red">*</font>
                  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"/></span></span></td>
                  </tr>

                  <tr>
                  <td align="right">Monto del Deposito:</td>
                  <td><span id="sprytextfield3">
                    <input type="text" name="monto_deposito" id="monto_deposito" size="28" class="caja" pattern="[0-9]{4}" required /><font color="red">*</font>
                  <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"/></span></span></td>
                  </tr>
                  
                  <tr>
                  <td colspan=2>
                  <input type="button" style="cursor: pointer;" class="boot" onclick="javascript:window.history.back();" value="REGRESAR" /> 
                  <input type="reset" style="cursor: pointer;"  class="boot"  name="guarda" value="LIMPIAR" />
                  <input type="submit" style="cursor: pointer;"  class="boot"  name="guarda" value="GUARDAR" />
                  </td>
                  </tr>
                  
                  </table>
                  </center>
                  <script type="text/javascript">
                    
                    var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
                    var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
                    var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
                    </script>
                </form>

      <?php

        } else {
            header("location:Contenido.php");
        }



     ?>


    