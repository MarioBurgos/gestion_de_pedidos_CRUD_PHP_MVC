<?php 
require_once 'model/producto.php';

class productoController{
	public $page_title;
	public $view;

	public function __construct() {
		$this->page_title = '';
		$this->view = 'list_producto';
		$this->productoObj = new Producto();
	}

	/* List all notes */
	public function list(){
		$this->page_title = 'Lista de productos';
		return $this->productoObj->getProductos();
	}

	/* Show info */
	public function detalle($id = null){
		$this->page_title = 'Detalle del producto';
		$this->view = 'detalle_producto';
		/* Id can from get param or method param */
		if(isset($_GET["id"])) $id = $_GET["id"];
		return $this->productoObj->getProductoById($id);
	}

	/* Load note for edit */
	public function edit($id = null){
		$this->page_title = 'Editar producto';
		$this->view = 'edit_producto';
		/* Id can from get param or method param */
		if(isset($_GET["id"])) $id = $_GET["id"];
		return $this->productoObj->getProductoById($id);
	}

	/* Create or update note */
	public function save(){
		$this->page_title = 'Nuevo producto';
		$this->view = 'edit_producto';
		$id = $this->productoObj->save($_POST);
		$result = $this->productoObj->getProductoById($id);
		$_GET["response"] = true;
		return $result;
	}

	/* Confirm to delete */
	public function confirmDelete(){
		$this->page_title = 'Eliminar producto';
		$this->view = 'confirm_delete_producto';
		return $this->productoObj->getProductoById($_GET["id"]);
	}

	/* Delete */
	public function delete(){
		$this->page_title = 'Lista de productos';
		$this->view = 'delete_producto';
		return $this->productoObj->deleteProductoById($_POST["id"]);
	}

}

?>