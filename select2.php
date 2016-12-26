<?php
// datos de conexion a la BD.
$servidor  ="localhost"; // host
$usuario   ="root"; 
$clave     ="";
$basedatos ="ejemplo"; // Indicar una Base de datos.

// si se ha pulsao el boton enviar ($enviado) se procesa el formulario ..
// Sino, se continua con el formulario y los nuevos valores de los Select ..
// OJO si se tienen mas varibles (mas <input> ) se van a perder sus valores a no ser
// que los obtengamos y se les de como valor inicial en el value= de cada uno segun corresponda.



   // Conexión a la BD
   $conexion = mysql_connect($servidor, $usuario, $clave) or die(mysql_error());
   mysql_select_db($basedatos, $conexion) or die(mysql_error());

   // Obtener el $id_padre del envio a si mismo del formulario ..
   $id_padre=$_POST['id_padre'];

   // Inicio Formulario .. PHP_SELF enviamos a si mismo (a este script).
   echo "<form action=\"".$_SERVER['PHP_SELF']."\" method=\"POST\">\n\n";

   // Formar Selec "Padre".
   echo "<select name=\"id_padre\" onChange=\"this.form.submit()\">\n";
   echo "<option value=\"\"> Seleccione un Item </option>\n";

   $SQLconsulta_padre="SELECT * FROM estados";
   $consulta_padre = mysql_query($SQLconsulta_padre,$conexion) or die(mysql_error());

   While   ($registro_padre=mysql_fetch_assoc($consulta_padre)){
      // Se mira si el ID del registro es el mismo q el $id_padre q recibimos si hemos cambiado el select hijo.
      // Se selecciona en consecuencia (selected) la opción elegida.
      if ($id_padre == $registro_padre['id_estado']){
         echo "<option value=\"".$registro_padre['id_estado']."\" selected>".$registro_padre['estado']."</option>\n";
      } else {
         echo "<option value=\"".$registro_padre['id_estado']."\">".$registro_padre['estado']."</option>\n";
      }
    }
   echo "</select>\n\n";

   mysql_free_result($consulta_padre); // Liberar memoria usada por consulta.

   // Formar Select "Hijo"
   echo "<select name=\"id_hija\">\n";

   // Si $id_padre no tiene valor (caso de que no se ha seleccionado ningua opcion del select hijo
   // se muestra el mensaje de "seleccine un item" (del select padre).
   if (!empty($id_padre)){

       $SQLconsulta_hija="SELECT * FROM ciudades WHERE id_estado='$id_padre'";
       $consulta_hija = mysql_query($SQLconsulta_hija,$conexion) or die(mysql_error());
       // se mira el total de registros de la consulta .. si es 0 se muestra mensaje en el select ..
       if (mysql_num_rows($consulta_hija) != 0){
          While   ($registro_hija=mysql_fetch_assoc($consulta_hija)){
            echo "<option value=\"".$registro_hija['id_ciudad']."\">".$registro_hija['ciudad']."</option>\n";
          }
        } else {
            echo "<option value=\"\"> No hay registros para este Item </option>";
        }
    } else {
        echo "<option value=\"\"> <-- Seleccione un Item  </option>";
    }

    mysql_free_result($consulta_hija); // Liberar memoria usada por consulta.
    
    echo "</select>\n\n";



   // Formar Select "Hijo"
   echo "<select name=\"id_mcpio\">\n";

   // Si $id_padre no tiene valor (caso de que no se ha seleccionado ningua opcion del select hijo
   // se muestra el mensaje de "seleccine un item" (del select padre).
   if (!empty($id_padre)){

       $SQLconsulta_mcpio="SELECT * FROM municipios WHERE id_estado='$id_padre'";
       $consulta_mcpio = mysql_query($SQLconsulta_mcpio,$conexion) or die(mysql_error());
       // se mira el total de registros de la consulta .. si es 0 se muestra mensaje en el select ..
       if (mysql_num_rows($consulta_mcpio) != 0){
          While   ($registro_mcpio=mysql_fetch_assoc($consulta_mcpio)){
            echo "<option value=\"".$registro_mcpio['id_municipio']."\">".$registro_mcpio['municipio']."</option>\n";
          }
        } else {
            echo "<option value=\"\"> No hay registros para este Item </option>";
        }
    } else {
        echo "<option value=\"\"> <-- Seleccione un Item  </option>";
    }

    mysql_free_result($consulta_mcpio); // Liberar memoria usada por consulta.
    
    echo "</select>\n\n";





    echo "</form>\n";




