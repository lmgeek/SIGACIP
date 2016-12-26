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
			$("#cboPaises").change(function() {
				var pais = $(this).val();
				
				if(pais > 0)
				{
			        var datos = {
			            idPais : $(this).val()  
			        };

			        $.post("ciudad.php", datos, function(ciudades) {
			        	
					  	var $comboCiudades = $("#cboCiudades");
		                $comboCiudades.empty();
		                $.each(ciudades, function(index, cuidad) {
		                	//
	                        $comboCiudades.append("<option>" + cuidad.nombre + "</option>");
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
			<label for="cboPaises">Paises</label>
		</div>
		<div class="divSelects">
			<select id="cboPaises">
				<option value="0">Seleccione un país</option>
				<?php
					$paises = obtenerTodosLosPaises();
					foreach ($paises as $pais) { 
						echo '<option value="'.$pais->id.'">'.utf8_encode($pais->nombre).'</option>';		
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