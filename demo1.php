<?php 

	include('config.php');

SELECT mi_campo, count(mi_campo) FROM mi_tabla GROUP BY mi_campo HAVING count(mi_campo) >1



?>