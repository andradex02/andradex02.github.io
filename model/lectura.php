<?php 

class Lectura {

	private $table = 'lectura';
	private $conection;

	public function __construct() {
		
	}

	/* Set conection */
	public function getConection(){
		$dbObj = new Db();
		$this->conection = $dbObj->conection;
	}

	/* Get all lecturas */
	public function getLectura(){
		$this->getConection();
		$sql = "SELECT * FROM ".$this->table;
		$stmt = $this->conection->prepare($sql);
		$stmt->execute();

		return $stmt->fetchAll();
	}

	/* Get lectura by cod */
	public function getLecturaById($cod){
		if(is_null($cod)) return false;
		$this->getConection();
		$sql = "SELECT * FROM ".$this->table. " WHERE cod = ?";
		$stmt = $this->conection->prepare($sql);
		$stmt->execute([$cod]);

		return $stmt->fetch();
	}

	/* Save lectura */
	public function save($param){
		$this->getConection();

		/* Set default values */
		$lectura = $fecha = $cod_sensor = "";

		/* Check if exists */
		$exists = false;
		if(isset($param["cod"]) and $param["cod"] !=''){
			$actualLectura = $this->getLecturaById($param["cod"]);
			if(isset($actualLectura["cod"])){
				$exists = true;	
				/* Actual values */
				$cod = $param["cod"];				
				$fecha = $actualLectura["fecha"];
				$lectura = $actualLectura["lectura"];
				$cod_sensor = $actualLectura["cod_sensor"];								
    		}
		}
		/* Received values */
		if(isset($param["lectura"])) $lectura = $param["lectura"];
		if(isset($param["fecha"])) $fecha = $param["fecha"];
		if(isset($param["cod_sensor"])) $cod_sensor = $param["cod_sensor"];

		/* Database operations */
		if($exists){
			$sql = "UPDATE ".$this->table. " SET lectura=?, fecha=?, cod_sensor=? WHERE cod=?";
			$stmt = $this->conection->prepare($sql);
			$res = $stmt->execute([$lectura, $fecha, $cod_sensor, $cod]);
		}else{
			$sql = "INSERT INTO ".$this->table. " (lectura, fecha, cod_sensor) values(?, ?, ?)";
			$stmt = $this->conection->prepare($sql);
			$stmt->execute([$lectura, $fecha, $cod_sensor]);
			$cod = $this->conection->lastInsertId();
		}	

		return $cod;	

	}

	/* Delete Lectura by cod */
	public function deleteLecturaById($cod){
		$this->getConection();
		$sql = "DELETE FROM ".$this->table. " WHERE cod = ?";
		$stmt = $this->conection->prepare($sql);
		return $stmt->execute([$cod]);
	}

}

?>