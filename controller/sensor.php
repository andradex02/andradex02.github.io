<?php 

require_once 'model/sensor.php';

class sensorController{
	public $page_title;
	public $view;

	public function __construct() {
		$this->view = 'list_sensor';
		$this->page_title = '';
		$this->sensorObj = new Sensor();
	}

	/* List all sensors */
	public function list(){
		$this->page_title = 'Listado de sensores';
		return $this->sensorObj->getSensores();
	}

	/* Load sensor for edit */
	public function edit($cod = null){
		$this->page_title = 'Editar sensor';
		$this->view = 'edit_sensor';
		/* Id can from get param or method param */
		if(isset($_GET["cod"])) $cod = $_GET["cod"];
		return $this->sensorObj->getSensorById($cod);
	}

	/* Create or update sensor */
	public function save(){
		$this->view = 'edit_sensor';
		$this->page_title = 'Editar sensor';
		$cod = $this->sensorObj->save($_POST);
		$result = $this->sensorObj->getSensorById($cod);
		$_GET["response"] = true;
		return $result;
	}

	/* Confirm to delete */
	public function confirmDelete(){
		$this->page_title = 'Eliminar sensor';
		$this->view = 'confirm_delete_sensor';
		return $this->sensorObj->getSensorById($_GET["cod"]);
	}

	/* Delete */
	public function delete(){
		$this->page_title = 'Listado de sensores';
		$this->view = 'delete_sensor';
		return $this->sensorObj->deleteSensorById($_POST["cod"]);
	}

}

?>