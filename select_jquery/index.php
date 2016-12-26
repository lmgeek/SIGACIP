<?php
	include("pais.php");
?>

<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nebaris - Dropdowns en cascada</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$("#cboestados").change(function() {
				var estado = $(this).val();
				
				if(estado > 0)
				{
			        var datos = {
			            id_estado : $(this).val()  
			        };

			        $.post("ciudad.php", datos, function(ciudades) {
			        	
					  	var $comboCiudades = $("#cboCiudades");
		                $comboCiudades.empty();
		                $.each(ciudades, function(index, cuidad) {
		                	//
	                        $comboCiudades.append("<option>" + cuidad.ciudad + "</option>");
		                });
					}, 'json');
				}
				else
				{
					var $comboCiudades = $("#cboCiudades");
	                $comboCiudades.empty();
					$comboCiudades.append("<option>Seleccione un país</option>");
				}
			});
		}); 
	</script>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="divContenedor">
		<h2>Combos de selección anidados</h2>
		<div class="divLabels">
			<label for="cboestados">estados</label>
		</div>
		<div class="divSelects">
			<select id="cboestados">
				<option value="0">Seleccione un país</option>
				<?php
					$estados = obtenerTodosLosEstados();
					foreach ($estados as $estado) { 
						echo '<option value="'.$estado->id.'">'.utf8_encode($estado->estado).'</option>';		
					}
				?>
			</select>
		</div>
		<div class="divLabels">
			<label for="cboCiudades">Ciudades</label>
		</div>
		<div class="divSelects">
			<select id="cboCiudades">
				<option value="0">Seleccione un país</option>
			</select>
		</div>
		<div id="nebaris">
	      Para ver más tutoriales <a href="http://www.nebaris.com">www.nebaris.com</a> 
	    </div>
	</div>	
</body>
</html>