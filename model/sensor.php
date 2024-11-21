<?php 



class Sensor {



	private $table = 'sensor';

	private $conection;



	public function __construct() {

		

	}



	/* Set conection */

	public function getConection(){

		$dbObj = new Db();

		$this->conection = $dbObj->conection;

	}



	/* Get all sensors */

	public function getSensores(){

		$this->getConection();

		$sql = "SELECT * FROM ".$this->table;

		$stmt = $this->conection->prepare($sql);

		$stmt->execute();



		return $stmt->fetchAll();

	}



	/* Get sensor by cod */

	public function getSensorById($cod){

		if(is_null($cod)) return false;

		$this->getConection();

		$sql = "SELECT * FROM ".$this->table. " WHERE cod = ?";

		$stmt = $this->conection->prepare($sql);

		$stmt->execute([$cod]);



		return $stmt->fetch();

	}



	/* Save sensor */

	public function save($param){

		$this->getConection();



		/* Set default values */

		$nombre = $tipo = "";



		/* Check if exists */

		$exists = false;

		if(isset($param["cod"]) and $param["cod"] !=''){

			$actualSensor = $this->getSensorById($param["cod"]);

			if(isset($actualSensor["cod"])){

				$exists = true;	

				/* Actual values */

				$cod = $param["cod"];

				$nombre = $actualSensor["nombre"];

				$tipo = $actualSensor["tipo"];

			}

		}



		/* Received values */

		if(isset($param["nombre"])) $nombre = $param["nombre"];

		if(isset($param["tipo"])) $tipo = $param["tipo"];



		/* Database operations */

		if($exists){

			$sql = "UPDATE ".$this->table. " SET nombre=?, tipo=? WHERE cod=?";

			$stmt = $this->conection->prepare($sql);

			$res = $stmt->execute([$nombre, $tipo, $cod]);

		}else{

			$sql = "INSERT INTO ".$this->table. " (nombre, tipo) values(?, ?)";

			$stmt = $this->conection->prepare($sql);

			$stmt->execute([$nombre, $tipo]);

			$cod = $this->conection->lastInsertId();

		}	



		return $cod;	



	}



	/* Delete Sensor by cod */

	public function deleteSensorById($cod){

		$this->getConection();

		$sql = "DELETE FROM ".$this->table. " WHERE cod = ?";

		$stmt = $this->conection->prepare($sql);

		return $stmt->execute([$cod]);

	}



}



?>
