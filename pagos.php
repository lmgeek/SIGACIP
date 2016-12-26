  <html xmlns="http://www.w3.org/1999/xhtml"><head><link href="css/main.css" rel="stylesheet" type="text/css">
<script src="js/validacion_campo_vacio.js" type="text/javascript"></script>
<link href="css/Estilo_Error.css" rel="stylesheet" type="text/css">
<link href="css/tablas.css" rel="stylesheet" type="text/css">
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/prototype.js" type="text/javascript"></script>
<script src="js/ValidacionesEspeciales.js" type="text/javascript"></script>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<link href="css/Estilo_Error.css" rel="stylesheet" type="text/css">

<!-- Refresca la pagina cada 2 sg automaticamente
<meta http-equiv="refresh" content="2">
-->

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
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>

<input type="button" style="cursor: pointer;" class="boot" onclick="javascript:window.history.back();" value="REGRESAR" /> 
<form name="form1" method="post" action="pagos2.php">
         <center>
          <h3 class="text-center">
             Listar Alumnos por Curso</h3>
            <table  width="50%" border="0" align="center"  class="down1">
              <tr align="center">
                <td colspan="2"><h3>Ingrese la C&eacutedula de Identidad del Aspirante para imprimir planilla de inscripci&oacuten</h3></td>
              </tr>

              <tr>
              <td align="right" width="40%">Cedula:</td>
              <td><span id="sprytextfield4">
              <select name="cedula1" required>
                <option value="V-">V-</option>
                <option value="E-">E-</option>
              </select>
              <input name="cedula2" class="caja2" onblur="validarEmail(this.value)" type="text" id="cedula2" size="7" autocomplete="off" pattern="[0-9]{7,8}" required><font color="red">*</font>
              <span class="textfieldRequiredMsg"><img src="imagenes/error.gif" title="CAMPO VACIO"></span></span></td>
              </tr>

              <tr>
                    <td align="right">Cohorte:</td>
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

              <tr align="center">
                <td colspan="2">
                  <input type="reset" class="boot" name="guarda" value="LIMPIAR">
                  <input type="submit" class="boot" name="guarda" value="BUSCAR">
                </td>
              </tr>

          </table>
        </form>
         </center>