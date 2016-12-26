<link href="css/MenuPrincipal.css" rel="stylesheet" type="text/css"/>
<meta http-equiv="Content-type" content="text/html" charset="utf-8">


<?php
	    error_reporting(0);
		$Nivel = $_GET['Nivel'];
		if($Nivel==0){
			echo ' <ul id="navigation">';
			echo '<li><a href="Contenido.php?Nivel=0" target="admin" class="last">Inicio</a></li>';
			echo '<li><a href="Menu.php?Nivel=1">Admisión</a></li>';
			echo '<li><a href="Menu.php?Nivel=2">Materias</a></li>';
			echo '<li><a href="listalumnoscurso.php" target="admin">Inscripción</a></li>';
			echo '<li><a href="Menu.php?Nivel=3">Constancias</a></li>';
			echo '<li><a href="administrativo.php" target="admin">Operador</a></li>';
			echo '<li><a href="planilladministrativa.php" target="admin" class="last">Administrativo</a></li>';
			echo '<li><a href="acercade.php" target="admin" class="last">Acerca</a></li>';

			echo '</ul>';
		}
		if($Nivel==1){
			echo ' <ul id="navigation">';
			echo '<li><a href="Menu.php?Nivel=0" class="last">Inicio</a></li>';
			echo '<li><a href="registraralumno.php" target="admin">Registrar</a></li>';
			echo '<li><a href="editaralumno.php" target="admin">Editar</a></li>';
			echo '<li><a href="listalumnos.php" target="admin">Listar</a></li>';
			echo '<li><a href="pagos.php" target="admin">Registrar Pago</a></li>';
			echo '<li><a href="constancia_admision.php" target="admin">Constancia de Admisión</a></li>';
			echo '</ul>';
		}
		
		if($Nivel==2){
			echo ' <ul id="navigation">';
			echo '<li><a href="Menu.php?Nivel=0" class="last">Inicio</a></li>';
			echo '<li><a href="nuevocurso.php" target="admin">Registrar Materia a Especialidad</a></li>';
			echo '<li><a href="listacurso.php" target="admin">Listar Materias</a></li>';
			
			echo '</ul>';
		}
		
		if($Nivel==3){
			echo ' <ul id="navigation">';
			echo '<li><a href="Menu.php?Nivel=0" class="last">Inicio</a></li>';
			echo '<li><a href="admision.php" target="admin">Admisi&oacuten</a></li>';
			echo '<li><a href="Menu.php?Nivel=4">Estudiantes de Postgrado</a></li>';
			echo '<li><a href="constancia_estudios.php" target="admin">Constancia de Estudios</a></li>';
			
			echo '</ul>';
		}



		if($Nivel==4){
			echo ' <ul id="navigation">';
			echo '<li><a href="Menu.php?Nivel=0" class="last">Inicio</a></li>';
			echo '<li><a href="estudiante.php" target="admin">Por Estudiante</a></li>';
			echo '<li><a href="grupo.php" target="admin">Por Grupo</a></li>';
			
			echo '</ul>';
		}


 ?>
