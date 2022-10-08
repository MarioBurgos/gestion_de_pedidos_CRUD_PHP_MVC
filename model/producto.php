<?php
class Producto
{

	private $table = 'productos';
	private $conection;

	public function __construct()
	{
	}

	/* Set conection */
	public function getConection()
	{
		$dbObj = new DbConnector();
		$this->conection = $dbObj->conection;
	}

	/* Get all productos */
	public function getProductos()
	{
		$this->getConection();
		$sql = "SELECT * FROM " . $this->table . " ORDER BY codigo";
		$stmt = $this->conection->prepare($sql);
		$stmt->execute();

		return $stmt->fetchAll();
	}

	/* Get producto by id */
	public function getProductoById($id)
	{
		if (is_null($id)) return false;
		$this->getConection();
		$sql = "SELECT * FROM " . $this->table . " WHERE id = ?";
		$stmt = $this->conection->prepare($sql);
		$stmt->execute([$id]);

		return $stmt->fetch();
	}

	/* Save producto */
	public function save($param)
	{
		$this->getConection();

		/* Set default values */
		$codigo = $nombre = $descripcion = "";
		$precio = 0;

		/* Check if exists */
		$exists = false;
		if (isset($param["id"]) and $param["id"] != '') {
			$actualProducto = $this->getProductoById($param["id"]);
			if (isset($actualProducto["id"])) {
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
		if (isset($param["codigo"])) $codigo = $param["codigo"];
		if (isset($param["nombre"])) $nombre = $param["nombre"];
		if (isset($param["descripcion"])) $descripcion = $param["descripcion"];
		if (isset($param["precio"])) $precio = $param["precio"];

		/* Database operations */
		if ($exists) {
			$sql = "UPDATE " . $this->table . " SET codigo=?, nombre=?, descripcion=?, precio=? WHERE id=?";
			$stmt = $this->conection->prepare($sql);
			$res = $stmt->execute([$codigo, $nombre, $descripcion, $precio, $id]);
		} else {
			$sql = "INSERT INTO " . $this->table . " (codigo, nombre, descripcion, precio) values(?, ?, ?, ?)";
			$stmt = $this->conection->prepare($sql);
			$stmt->execute([$codigo, $nombre, $descripcion, $precio]);
			$id = $this->conection->lastInsertId();
		}
		return $id;
	}

	/* Delete producto by id */
	public function deleteProductoById($id)
	{
		$this->getConection();
		$sql = "DELETE FROM " . $this->table . " WHERE id = ?";
		$stmt = $this->conection->prepare($sql);
		return $stmt->execute([$id]);
	}

	/* XML Generator  */
	public function createXML()
	{
		$file = fopen("listado_productos.xml", "w");
		//apertura del documento xml y la etiqueta raiz
		
		$txt = utf8_encode('<productos>');
		$productos = $this->getProductos();
		foreach ($productos as $p) {
			$txt .= utf8_encode('<producto>');
			$txt .= utf8_encode('<id><![CDATA[' . $p['id'] . ']]></id>');
			$txt .= utf8_encode('<codigo><![CDATA[' . $p['codigo'] . ']]></codigo>');
			$txt .= utf8_encode('<nombre><![CDATA[' . $p['nombre'] . ']]></nombre>');
			$txt .= utf8_encode('<descripcion><![CDATA[' . $p['descripcion'] . ']]></descripcion>');
			$txt .= utf8_encode('<precio><![CDATA[' . $p['precio'] . ']]></precio>');
			$txt .= utf8_encode('</producto>');
		}
		//cierre de la etiqueta raiz
		$txt .= utf8_encode('</productos>');
		fwrite($file, $txt);
		fclose($file);
		return $txt;
	}
}
