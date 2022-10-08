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
			$actualcliente = $this->getClienteById($param["id"]);
			if(isset($actualcliente["id"])){
				$exists = true;	
				/* Actual values */
				$id = $param["id"];
				$dni = $actualcliente["dni"];
				$nombre = $actualcliente["nombre"];
				$apellido1 = $actualcliente["apellido1"];
				$apellido2 = $actualcliente["precio"];
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

	/* XML Generator  */
	public function createXML()
	{
		$file = fopen("listado_clientes.xml", "w");
		//apertura del documento xml y la etiqueta raiz
		$txt = utf8_encode('<clientes>');
		$clientes = $this->getClientes();
		foreach ($clientes as $c) {
			$txt .= utf8_encode('<cliente>');
			$txt .= utf8_encode('<id><![CDATA[' . $c['id'] . ']]></id>');
			$txt .= utf8_encode('<dni><![CDATA[' . $c['dni'] . ']]></dni>');
			$txt .= utf8_encode('<nombre><![CDATA[' . $c['nombre'] . ']]></nombre>');
			$txt .= utf8_encode('<apellido1><![CDATA[' . $c['apellido1'] . ']]></apellido1>');
			$txt .= utf8_encode('<apellido2><![CDATA[' . $c['apellido2'] . ']]></apellido2>');
			$txt .= utf8_encode('</cliente>');
		}
		//cierre de la etiqueta raiz
		$txt .= utf8_encode('</clientes>');
		fwrite($file, $txt);
		fclose($file);
		return $txt;
	}

}

?>