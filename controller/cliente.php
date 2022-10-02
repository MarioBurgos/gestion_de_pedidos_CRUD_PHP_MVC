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

	/* List all notes */
	public function list(){
		$this->page_title = 'Lista de clientes';
		return $this->clienteObj->getClientes();
	}

	/* Load note for edit */
	public function edit($id = null){
		$this->page_title = 'Editar cliente';
		$this->view = 'edit_cliente';
		/* Id can from get param or method param */
		if(isset($_GET["id"])) $id = $_GET["id"];
		return $this->clienteObj->getClienteById($id);
	}

	/* Create or update note */
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
		$this->page_title = 'Lista de clientes';
		$this->view = 'delete_cliente';
		return $this->clienteObj->deleteClienteById($_POST["id"]);
	}

}

?>