<?php
	include("db.php");

	function obtenerTodosLosEstados() {
		$estados = array();
		$sql = "SELECT id_estado, estado 
			    FROM estados"; 

		$db = obtenerConexion();
		$result = ejecutarQuery($db, $sql);

		while($row = $result->fetch_assoc()){
			$estado = new estado($row['id_estado'], $row['estado']);
		    array_push($estados, $estado);
		}

		cerrarConexion($db, $result);

		return $estados;
	}

	class estado {
		public $id;
		public $estado;

		function __construct($id, $estado) {
			$this->id = $id;
			$this->estado = $estado;
		}
	}
?>