<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/main.css" rel="stylesheet" type="text/css"/>
<link href="css/tablas.css" rel="stylesheet" type="text/css" />
<script src="js/validacion_campo_vacio.js" type="text/javascript"></script>
<link href="css/Estilo_Error.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="calendario/tcal.css" />
<script type="text/javascript" src="calendario/tcal.js"></script>
  <script type="text/javascript">
	
	var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
	var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
	var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
	</script>

  <?php 

  if (isset($_GET['especialidad']) && isset($_GET['Id']) && isset($_GET['cohorte'])) {
            $especialidad = $_GET['especialidad'];
            $Id = $_GET['Id'];
            $cohorte = $_GET['cohorte'];


$conn=mysqli_connect("localhost","root","","ejemplo") ;
            $sql2 = mysqli_query($conn,"SELECT idcurso, count(*) as cohorte FROM rel_alumno_curso WHERE idalumno='{$Id}' AND cohorte='{$cohorte}'") or die(mysql_error());
            $conteo = mysqli_fetch_array($sql2);
            if ($conteo['cohorte']<1) {

              ?>
          <form method="get" action="alumno.php">
          <input type="hidden" value="<?php echo $Id; ?>" name="Id"></input>
          <input type="hidden" value="<?php echo $especialidad; ?>" name="especialidad"></input>
          <input type="hidden" value="<?php echo $cohorte; ?>" name="cohorte"></input>

          <center><strong>Seleccine las Materias a Inscribir </strong>
          <table width="50%" border="0" align="center"  class="down1">
           <tr>
            <td align="right">Unidad Curricular I:</td>
            <td>
            <?php
                    $conn=mysqli_connect("localhost","root","","ejemplo") ;
                    $consulta="select * from curso where especialidad='{$especialidad}'";
                    $resultado=mysqli_query($conn,$consulta);
                    echo "<select class='form-control' name='uc1' required>";
                     echo "<option value='' selected>------- SELECCIONE --------</optopn>";
                    while($lista=mysqli_fetch_array($resultado))
                    echo "<option  value='".$lista["idcurso"]."'>".$lista["nombre"]."</option>";
                    echo  "</select>";
            echo "</td>
          </tr>";

          echo "<tr>
                <td align='right'>Unidad Curricular II:</td>
                <td>";
           
                    $conn=mysqli_connect("localhost","root","","ejemplo") ;
                    $consulta="select * from curso where especialidad='{$especialidad}'";
                    $resultado=mysqli_query($conn,$consulta);
                    echo "<select class='form-control' name='uc2'>";
                     echo "<option value='' selected>------- SELECCIONE --------</optopn>";
                    while($lista=mysqli_fetch_array($resultado))
                    echo "<option  value='".$lista["idcurso"]."'>".$lista["nombre"]."</option>";
                    echo  "</select>";
            echo "</td>
          </tr>";

          echo "<tr>
            <td align='right'>Unidad Curricular III:</td>
            <td>";
            
                    $conn=mysqli_connect("localhost","root","","ejemplo") ;
                    $consulta="select * from curso where especialidad='{$especialidad}'";
                    $resultado=mysqli_query($conn,$consulta);
                    echo "<select class='form-control' name='uc3'>";
                     echo "<option value='' selected>------- SELECCIONE --------</optopn>";
                    while($lista=mysqli_fetch_array($resultado))
                    echo "<option  value='".$lista["idcurso"]."'>".$lista["nombre"]."</option>";
                    echo  "</select>";
            echo "</td>
          </tr>";

          ?>

          <tr>
  <td colspan=2>
  <input type="button" style="cursor: pointer;" class="boot" onclick="javascript:window.history.back();" value="REGRESAR" /> 
  <input type="submit" style="cursor: pointer;"  class="boot"  name="guarda" value="SIGUIENTE" />
  </td>
  </tr>
  
  </table>

    </form>

  </center>
  <?php

            }if ($conteo['cohorte']==1) {
              ?>
          <form method="get" action="alumno.php">
          <input type="hidden" value="<?php echo $Id; ?>" name="Id"></input>
          <input type="hidden" value="<?php echo $especialidad; ?>" name="especialidad"></input>
          <input type="hidden" value="<?php echo $cohorte; ?>" name="cohorte"></input>

          <center><strong>Seleccine las Materias a Inscribir </strong>
          <table width="50%" border="0" align="center"  class="down1">
           <tr>
            <td align="right">Unidad Curricular I:</td>
            <td>
            <?php
                    $conn=mysqli_connect("localhost","root","","ejemplo") ;
                    $consulta="select * from curso where especialidad='{$especialidad}'";
                    $resultado=mysqli_query($conn,$consulta);
                    echo "<select class='form-control' name='uc2' required>";
                     echo "<option value='' selected>------- SELECCIONE --------</optopn>";
                    while($lista=mysqli_fetch_array($resultado))
                    echo "<option  value='".$lista["idcurso"]."'>".$lista["nombre"]."</option>";
                    echo  "</select>";
            echo "</td>
          </tr>";

          echo "<tr>
                <td align='right'>Unidad Curricular II:</td>
                <td>";
           
                    $conn=mysqli_connect("localhost","root","","ejemplo") ;
                    $consulta="select * from curso where especialidad='{$especialidad}'";
                    $resultado=mysqli_query($conn,$consulta);
                    echo "<select class='form-control' name='uc3'>";
                     echo "<option value='' selected>------- SELECCIONE --------</optopn>";
                    while($lista=mysqli_fetch_array($resultado))
                    echo "<option  value='".$lista["idcurso"]."'>".$lista["nombre"]."</option>";
                    echo  "</select>";
            echo "</td>
          </tr>";

          ?>

          <tr>
  <td colspan=2>
  <input type="button" style="cursor: pointer;" class="boot" onclick="javascript:window.history.back();" value="REGRESAR" /> 
  <input type="submit" style="cursor: pointer;"  class="boot"  name="guarda" value="SIGUIENTE" />
  </td>
  </tr>
  
  </table>

    </form>

  </center>

  <?php


            }if ($conteo['cohorte']==2) {
              ?>
          <form method="get" action="alumno.php">
          <input type="hidden" value="<?php echo $Id; ?>" name="Id"></input>
          <input type="hidden" value="<?php echo $especialidad; ?>" name="especialidad"></input>
          <input type="hidden" value="<?php echo $cohorte; ?>" name="cohorte"></input>

          <center><strong>Seleccine las Materias a Inscribir </strong>
          <table width="50%" border="0" align="center"  class="down1">
           <tr>
            <td align="right">Unidad Curricular I:</td>
            <td>
            <?php
                    $conn=mysqli_connect("localhost","root","","ejemplo") ;
                    $consulta="select * from curso where especialidad='{$especialidad}'";
                    $resultado=mysqli_query($conn,$consulta);
                    echo "<select class='form-control' name='uc3' required>";
                     echo "<option value='' selected>------- SELECCIONE --------</optopn>";
                    while($lista=mysqli_fetch_array($resultado))
                    echo "<option  value='".$lista["idcurso"]."'>".$lista["nombre"]."</option>";
                    echo  "</select>";
            echo "</td>
          </tr>";

          ?>

          <tr>
  <td colspan=2>
  <input type="button" style="cursor: pointer;" class="boot" onclick="javascript:window.history.back();" value="REGRESAR" /> 
  <input type="submit" style="cursor: pointer;"  class="boot"  name="guarda" value="SIGUIENTE" />
  </td>
  </tr>
  
  </table>

    </form>

  </center>
  <?php


            }if ($conteo['cohorte']==3) {
              echo "<script>
                      alert('El Aspirante ya contiene las tres materias ingresadas, debe registrarlo en otra cohorte\\nVerifiquelo y vuelva a intentarlo nuevamente.');
                       document.location=('Contenido.php');
                    </script>";
            }


        } else {
            
            include('config.php');
    $a    = $_GET['Id'];

    $idexis = "";
    $idexis2 = "";
    

    $sqlx = "SELECT * FROM alumno WHERE idalumno=".$a;    
      $rsx  = mysql_query($sqlx,$conexion);
      if(mysql_num_rows($rsx)!=0){
        $rowx = mysql_fetch_assoc($rsx);
      }
   ?>

  <center>
    <form method="get" action="asignarcursoalumno2.php">
    <input type="hidden" value="<?php echo $a; ?>" name="Id"></input>

     <center><strong>Planilla de Inscripcion </strong>
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

    <form method="get" action="asignarcursoalumno2.php">
    <input type="hidden" value="<?php echo $a; ?>" name="Id"></input>

    <tr>
    <td align="right">Especialidad o Carrera:</td>
    <td><span id="sprytextfield2">
    <?php
      $conn=mysqli_connect("localhost","root","","ejemplo") ;
      $consulta1="select * from rel_alumno_curso where idalumno like '{$a}'";
      $resultado1=mysqli_query($conn,$consulta1);
      if($lista1=mysqli_fetch_array($resultado1)){
        $Especialidad=$lista1['cod_especialidad'];
        $consulta2="select * from especialidad where cod_especialidad='{$Especialidad}'";
        $resultado2=mysqli_query($conn,$consulta2);
        if($lista2=mysqli_fetch_array($resultado2)){
          echo "<input type='text'  value='".$lista2["especialidad"]."' class='caja'/>";
          echo "<input type='hidden'  value='".$Especialidad."' class='caja' name='especialidad'/>";
        }
      }else{
        $consulta="select * from especialidad";
      $resultado=mysqli_query($conn,$consulta);
      echo "<select class='caja' name='especialidad' required>";
      echo "<option value='' selected>------- SELECCIONE --------</optopn>";
      while($lista=mysqli_fetch_array($resultado))
      echo "<option  value='".$lista["cod_especialidad"]."'>".$lista["especialidad"]."</option>";
      echo  "</select>";
      }
      
    ?>
    
    <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"/></span></span></td>
    </tr>

    <tr>
                    <td align="right">Lapso:</td>
                    <td>
                    <?php
                            $conn=mysqli_connect("localhost","root","","ejemplo") ;
                            $consulta="select * from cohortes";
                            $resultado=mysqli_query($conn,$consulta);
                            echo "<select class='caja' name='cohorte' required>";
                             echo "<option value='' selected>------- SELECCIONE --------</option>";
                            while($lista=mysqli_fetch_array($resultado))
                            echo "<option  value='".$lista["cohorte"]."'>".$lista["cohorte"]."</option>";
                        ?>
                          </select>
                    </td>
                  </tr>

    <tr>
  <td colspan=2>
  <input type="button" style="cursor: pointer;" class="boot" onclick="javascript:window.history.back();" value="REGRESAR" /> 
  <input type="submit" style="cursor: pointer;"  class="boot"  name="guarda" value="SIGUIENTE" />
  </td>
  </tr>
  
  </table>

    </form>

  </center>

  <?php
        }



    
?>

