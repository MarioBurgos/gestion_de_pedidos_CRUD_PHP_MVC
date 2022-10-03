<?php

class Pedido {

	private $columns = 'clientes.id as id_cliente, clientes.dni, clientes.nombre as nombre_cliente, clientes.apellido1, clientes.apellido2, productos.id as id_producto, productos.codigo as codigo_producto, productos.nombre as nombre_producto, productos.descripcion, productos.precio as precio_unidad, pedidos.id as id_pedido, pedidos.cantidad, pedidos.codigo_pedido, pedidos.fecha';
	private $tables = 'clientes, productos, pedidos';
	private $condition = 'pedidos.id_cliente = clientes.id AND pedidos.id_producto = productos.id';
	private $conection;

	public function __construct() {
		
	}

	/* Set conection */
	public function getConection(){
		$dbObj = new DbConnector();
		$this->conection = $dbObj->conection;
	}

	/* Get all pedidos */
	public function getPedidos(){
		$this->getConection();
		$sql = "SELECT ".$this->columns." FROM ".$this->tables." WHERE ".$this->condition;
		$stmt = $this->conection->prepare($sql);
		$stmt->execute();

		return $stmt->fetchAll();
	}

	/* Get pedido by id */
	public function getPedidoById($id){
		if(is_null($id)) return false;
		$this->getConection();
		$sql = "SELECT * FROM ".$this->tables. " WHERE id = ?";
		$stmt = $this->conection->prepare($sql);
		$stmt->execute([$id]);

		return $stmt->fetch();
	}

	/* Save pedido */
	public function save($param){
		$this->getConection();

		/* Set default values */
		$codigo = $nombre = $descripcion = "";
        $precio = 0;

		/* Check if exists */
		$exists = false;
		if(isset($param["id"]) and $param["id"] !=''){
			$actualProducto = $this->getPedidoById($param["id"]);
			if(isset($actualProducto["id"])){
				$exists = true;	
				/* Actual values */
				$id = $param["id"];
				$codigo = $actualProducto["codigo"];
				$nombre = $actualProducto["nombre"];
				$descripcion = $actualProducto["descripcion"];
				$precio = $actualProducto["precio"];
			}
		}

		/* Received values */
		if(isset($param["codigo"])) $codigo = $param["codigo"];
		if(isset($param["nombre"])) $nombre = $param["nombre"];
		if(isset($param["descripcion"])) $descripcion = $param["descripcion"];
		if(isset($param["precio"])) $precio = $param["precio"];

		/* Database operations */
		if($exists){
			$sql = "UPDATE ".$this->tables. " SET codigo=?, nombre=?, descripcion=?, precio=? WHERE id=?";
			$stmt = $this->conection->prepare($sql);
			$res = $stmt->execute([$codigo, $nombre, $descripcion, $precio, $id]);
		}else{
			$sql = "INSERT INTO ".$this->tables. " (codigo, nombre, descripcion, precio) values(?, ?, ?, ?)";
			$stmt = $this->conection->prepare($sql);
			$stmt->execute([$codigo, $nombre, $descripcion, $precio]);
			$id = $this->conection->lastInsertId();
		}	
		return $id;	
	}

	/* Delete pedido by id */
	public function deletePedidoById($id){
		$this->getConection();
		$sql = "DELETE FROM ".$this->tables. " WHERE id = ?";
		$stmt = $this->conection->prepare($sql);
		return $stmt->execute([$id]);
	}


}

?>