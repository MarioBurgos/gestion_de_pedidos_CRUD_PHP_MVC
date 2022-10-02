<?php 

class Cliente {

	private $table = 'clientes';
	private $conection;

	public function __construct() {
		
	}

	/* Set conection */
	public function getConection(){
		$dbObj = new DbConnector();
		$this->conection = $dbObj->conection;
	}

	/* Get all clientes */
	public function getClientes(){
		$this->getConection();
		$sql = "SELECT * FROM ".$this->table;
		$stmt = $this->conection->prepare($sql);
		$stmt->execute();

		return $stmt->fetchAll();
	}

	/* Get cliente by id */
	public function getClienteById($id){
		if(is_null($id)) return false;
		$this->getConection();
		$sql = "SELECT * FROM ".$this->table. " WHERE id = ?";
		$stmt = $this->conection->prepare($sql);
		$stmt->execute([$id]);

		return $stmt->fetch();
	}

	/* Save cliente */
	public function save($param){
		$this->getConection();

		/* Set default values */
		$dni = $nombre = $apellido1 = $apellido2 = "";
        $precio = 0;

		/* Check if exists */
		$exists = false;
		if(isset($param["id"]) and $param["id"] !=''){
			$actualProducto = $this->getClienteById($param["id"]);
			if(isset($actualProducto["id"])){
				$exists = true;	
				/* Actual values */
				$id = $param["id"];
				$dni = $actualProducto["dni"];
				$nombre = $actualProducto["nombre"];
				$apellido1 = $actualProducto["apellido1"];
				$apellido2 = $actualProducto["precio"];
			}
		}

		/* Received values */
		if(isset($param["dni"])) $dni = $param["dni"];
		if(isset($param["nombre"])) $nombre = $param["nombre"];
		if(isset($param["apellido1"])) $apellido1 = $param["apellido1"];
		if(isset($param["apellido2"])) $apellido2 = $param["apellido2"];

		/* Database operations */
		if($exists){
			$sql = "UPDATE ".$this->table. " SET dni=?, nombre=?, apellido1=?, apellido2=? WHERE id=?";
			$stmt = $this->conection->prepare($sql);
			$stmt->execute([$dni, $nombre, $apellido1, $apellido2, $id]);
		}else{
			$sql = "INSERT INTO ".$this->table. " (dni, nombre, apellido1, apellido2) values(?, ?, ?, ?)";
			$stmt = $this->conection->prepare($sql);
			$stmt->execute([$dni, $nombre, $apellido1, $apellido2]);
			$id = $this->conection->lastInsertId();
		}	
		return $id;	
	}

	/* Delete cliente by id */
	public function deleteClienteById($id){
		$this->getConection();
		$sql = "DELETE FROM ".$this->table. " WHERE id = ?";
		$stmt = $this->conection->prepare($sql);
		return $stmt->execute([$id]);
	}

}

?>