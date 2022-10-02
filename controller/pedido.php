<?php 
require_once 'model/pedido.php';

class pedidoController{
	public $page_title;
	public $view;

	public function __construct() {
		$this->page_title = '';
		$this->view = 'list_pedido';
		$this->pedidoObj = new Pedido();
	}

	/* List all notes */
	public function list(){
		$this->page_title = 'Lista de pedidos';
		return $this->pedidoObj->getPedidos();
	}

	/* Load note for edit */
	public function edit($id = null){
		$this->page_title = 'Editar pedido';
		$this->view = 'edit_pedido';
		/* Id can from get param or method param */
		if(isset($_GET["id"])) $id = $_GET["id"];
		return $this->pedidoObj->getPedidoById($id);
	}

	/* Create or update note */
	public function save(){
		$this->page_title = 'Nuevo pedido';
		$this->view = 'edit_pedido';
		$id = $this->pedidoObj->save($_POST);
		$result = $this->pedidoObj->getPedidoById($id);
		$_GET["response"] = true;
		return $result;
	}

	/* Confirm to delete */
	public function confirmDelete(){
		$this->page_title = 'Eliminar pedido';
		$this->view = 'confirm_delete_pedido';
		return $this->pedidoObj->getPedidoById($_GET["id"]);
	}

	/* Delete */
	public function delete(){
		$this->page_title = 'Lista de pedidos';
		$this->view = 'delete_pedido';
		return $this->pedidoObj->deletePedidoById($_POST["id"]);
	}

}

?>