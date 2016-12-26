<?php
	include("db.php");
	
	if(isset($_POST['id_estado'])) {
		$ciudades = array();
		$sql = "SELECT id_ciudad, ciudad 
				FROM ciudades 
				WHERE id_estado = ".$_POST['id_estado']; 

		$db = obtenerConexion();
		$result = ejecutarQuery($db, $sql);

		while($row = $result->fetch_assoc()){
			$ciudad = new ciudad($row['id_ciudad'], $row['ciudad']);
		    array_push($ciudades, $ciudad);
		}

		cerrarConexion($db, $result);

		echo json_encode($ciudades);
	}
	
	class ciudad {
		public $id;
		public $ciudad;

		function __construct($id, $ciudad) {
			$this->id = $id;
			$this->ciudad = $ciudad;
		}
	}
?>