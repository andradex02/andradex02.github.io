<?php 



require_once 'model/lectura.php';



class lecturaController{

	public $page_title;

	public $view;



	public function __construct() {

		$this->view = 'list_lectura';

		$this->page_title = '';

		$this->lecturaObj = new Lectura();

	}



	/* List all lecturas */

	public function list(){

		$this->page_title = 'Listado de lecturas';

		return $this->lecturaObj->getLectura();

	}



	/* Load lectura for edit */

	public function edit($cod = null){

		$this->page_title = 'Editar lectura';

		$this->view = 'edit_lectura';

		/* Id can from get param or method param */

		if(isset($_GET["cod"])) $cod = $_GET["cod"];

		return $this->lecturaObj->getLecturaById($cod);

	}



	/* Create or update lectura */

	public function save(){

		$this->view = 'edit_lectura';

		$this->page_title = 'Editar lectura';

		$cod = $this->lecturaObj->save($_POST);

		$result = $this->lecturaObj->getLecturaById($cod);

		$_GET["response"] = true;

		return $result;

	}



	/* Confirm to delete */

	public function confirmDelete(){

		$this->page_title = 'Eliminar lectura';

		$this->view = 'confirm_delete_lectura';

		return $this->lecturaObj->getLecturaById($_GET["cod"]);

	}



	/* Delete */

	public function delete(){

		$this->page_title = 'Listado de lecturas';

		$this->view = 'delete_lectura';

		return $this->lecturaObj->deleteLecturaById($_POST["cod"]);

	}



}



?>
