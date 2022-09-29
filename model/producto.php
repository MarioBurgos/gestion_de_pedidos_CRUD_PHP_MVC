<?php 

class Producto {

	private $table = 'productos';
	private $conection;

	public function __construct() {
		
	}

	/* Set conection */
	public function getConection(){
		$dbObj = new DbConnector();
		$this->conection = $dbObj->conection;
	}

	/* Get all notes */
	public function getProductos(){
		$this->getConection();
		$sql = "SELECT * FROM ".$this->table." ORDER BY codigo";
		$stmt = $this->conection->prepare($sql);
		$stmt->execute();

		return $stmt->fetchAll();
	}

	/* Get note by id */
	public function getProductoById($id){
		if(is_null($id)) return false;
		$this->getConection();
		$sql = "SELECT * FROM ".$this->table. " WHERE id = ?";
		$stmt = $this->conection->prepare($sql);
		$stmt->execute([$id]);

		return $stmt->fetch();
	}

	/* Save note */
	public function save($param){
		$this->getConection();

		/* Set default values */
		$codigo = $nombre = $descripcion = "";
        $precio = 0;

		/* Check if exists */
		$exists = false;
		if(isset($param["id"]) and $param["id"] !=''){
			$actualProducto = $this->getProductoById($param["id"]);
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
			$sql = "UPDATE ".$this->table. " SET codigo=?, nombre=?, descripcion=?, precio=? WHERE id=?";
			$stmt = $this->conection->prepare($sql);
			$res = $stmt->execute([$codigo, $nombre, $descripcion, $precio, $id]);
		}else{
			$sql = "INSERT INTO ".$this->table. " (codigo, nombre, descripcion, precio) values(?, ?, ?, ?)";
			$stmt = $this->conection->prepare($sql);
			$stmt->execute([$codigo, $nombre, $descripcion, $precio]);
			$id = $this->conection->lastInsertId();
		}	
		return $id;	
	}

	/* Delete note by id */
	public function deleteProductoById($id){
		$this->getConection();
		$sql = "DELETE FROM ".$this->table. " WHERE id = ?";
		$stmt = $this->conection->prepare($sql);
		return $stmt->execute([$id]);
	}

}

?>