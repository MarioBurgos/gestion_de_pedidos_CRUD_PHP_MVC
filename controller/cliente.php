<?php
require_once 'model/cliente.php';
class clienteController{
	public $page_title;
	public $view;

	public function __construct() {
		$this->page_title = '';
		$this->view = 'list_cliente';
		$this->clienteObj = new Cliente();
	}

	/* List all clientes */
	public function list(){
		$this->page_title = 'Lista de clientes';
		return $this->clienteObj->getClientes();
	}

	/* Show info */
	public function detalle($id = null){
		$this->page_title = 'Detalle cliente';
		$this->view = 'detalle_cliente';
		/* Id can from get param or method param */
		if(isset($_GET["id"])) $id = $_GET["id"];
		return $this->clienteObj->getClienteById($id);
	}

	/* Load cliente for edit */
	public function edit($id = null){
		$this->page_title = 'Editar cliente';
		$this->view = 'edit_cliente';
		/* Id can from get param or method param */
		if(isset($_GET["id"])) $id = $_GET["id"];
		return $this->clienteObj->getClienteById($id);
	}

	/* Create or update cliente */
	public function save(){
		$this->page_title = 'Nuevo cliente';
		$this->view = 'edit_cliente';
		$id = $this->clienteObj->save($_POST);
		$result = $this->clienteObj->getClienteById($id);
		$_GET["response"] = true;
		return $result;
	}

	/* Confirm to delete */
	public function confirmDelete(){
		$this->page_title = 'Eliminar cliente';
		$this->view = 'confirm_delete_cliente';
		return $this->clienteObj->getClienteById($_GET["id"]);
	}

	/* Delete */
	public function delete(){
		$this->page_title = 'Cliente eliminado';
		$this->view = 'delete_cliente';
		return $this->clienteObj->deleteClienteById($_POST["id"]);
	}

	public function createXML(){
		$this->page_title = 'Clientes en formato XML';
		$this->view = 'xml_view';
		return $this->clienteObj->createXML();
	}
}

?>