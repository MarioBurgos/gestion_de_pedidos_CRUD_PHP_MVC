<?php
class Pedido {

	private $columns = 'clientes.id as id_cliente, clientes.dni, clientes.nombre as nombre_cliente, clientes.apellido1, clientes.apellido2, productos.id as id_producto, productos.codigo as codigo_producto, productos.nombre as nombre_producto, productos.descripcion, productos.precio as precio_unidad, pedidos.id as id_pedido, pedidos.cantidad, pedidos.codigo_pedido, pedidos.fecha';
	private $tables = 'clientes, productos, pedidos';
	private $condition = 'pedidos.id_cliente = clientes.id AND pedidos.id_producto = productos.id ORDER BY pedidos.id';
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
	public function getPedidoByCodigoPedido($codigoPedido){
		if(is_null($codigoPedido)) return false;
		$this->getConection();
		$sql = "SELECT * FROM ".$this->tables. " WHERE pedidos.codigo_pedido = ?";
		$stmt = $this->conection->prepare($sql);
		$stmt->execute([$codigoPedido]);

		return $stmt->fetch();
	}

	/* Save pedido */
	public function save($param){
		$this->getConection();

		/* Set default values */
		$idCliente = $idProducto = $cantidad = $codigoPedido = $fecha = "";

		/* Check if exists */
		$exists = false;
		if(isset($param["codigo_pedido"]) and $param["codigo_pedido"] !=''){
			$actualPedido = $this->getPedidoByCodigoPedido($param["codigo_pedido"]);
			if(isset($actualPedido["codigo_pedido"])){
				$exists = true;	
				/* Actual values */
				$idCliente = $param['id_cliente'];
				$dniCliente = $param['dni'];
				$nombreCliente = $param['nombre_cliente'];
				$apellido1 = $param['apellido1'];
				$apellido2 = $param['apellido2'];
				$idProducto = $param['id_producto'];
				$codigoProducto = $param['codigo_producto'];
				$nombreProducto = $param['nombre_producto'];
				$descripcion = $param['descripcion'];
				$precioUnidad = $param['precio_unidad'];
				$idPedido = $param['id_pedido'];
				$cantidad = $param['cantidad'];
				$codigoPedido = $param['codigo_pedido'];
				$fecha = $param['fecha'];
			}
		}

		/* Received values */
		if(isset($param["id_cliente"])) $idCliente = $param["id_cliente"];
		if(isset($param["dni"])) $dni = $param["dni"];
		if(isset($param["nombre_cliente"])) $nombreCliente = $param["nombre_cliente"];
		if(isset($param["apellido1"])) $apellido1 = $param["apellido1"];
		if(isset($param["apellido2"])) $apellido2 = $param["apellido2"];
		if(isset($param["id_producto"])) $idProducto = $param["id_producto"];
		if(isset($param["codigo_producto"])) $codigoProducto = $param["codigo_producto"];
		if(isset($param["nombre_producto"])) $nombreProducto = $param["nombre_producto"];
		if(isset($param["descripcion"])) $descripcion = $param["descripcion"];
		if(isset($param["precio_unidad"])) $precioUnidad = $param["precio_unidad"];
		if(isset($param["id_pedido"])) $idPedido = $param["id_pedido"];
		if(isset($param["cantidad"])) $cantidad = $param["cantidad"];
		if(isset($param["codigo_pedido"])) $codigoPedido = $param["codigo_pedido"];
		if(isset($param["fecha"])) $fecha = $param["fecha"];

		/* Database operations */
		if($exists){
			$sql = "UPDATE pedidos SET id_cliente=?, id_producto=?, precio=?, precio=?, precio=?, precio=?, precio=?, precio=?, precio=?, precio=?, precio=?, precio=?, precio=?, precio=? WHERE id=?";
			$stmt = $this->conection->prepare($sql);
			//$res = $stmt->execute([$codigo, $nombre, $descripcion, $precio, $id]);
		}else{
			$sql = "INSERT INTO ".$this->tables. " (id_cliente, dni, nombre_cliente, precio) values(?, ?, ?, ?)";
			$stmt = $this->conection->prepare($sql);
			//$stmt->execute([$codigo, $nombre, $descripcion, $precio]);
			$id = $this->conection->lastInsertId();
		}	
		return $id;	
	}

	/* Delete pedido by id */
	public function deleteProductoDelPedido($id){
		$this->getConection();
		$sql = "DELETE FROM ".$this->tables. " WHERE id = ?";
		$stmt = $this->conection->prepare($sql);
		return $stmt->execute([$id]);
	}

	/* XML Generator  */
	public function createXML()
	{
		// $file = fopen("listado_productos.xml", "w");
		// //apertura del documento xml y la etiqueta raiz
		
		// $txt = utf8_encode('<productos>');
		// $productos = $this->getProductos();
		// foreach ($productos as $p) {
		// 	$txt .= utf8_encode('<producto>');
		// 	$txt .= utf8_encode('<id><![CDATA[' . $p['id'] . ']]></id>');
		// 	$txt .= utf8_encode('<codigo><![CDATA[' . $p['codigo'] . ']]></codigo>');
		// 	$txt .= utf8_encode('<nombre><![CDATA[' . $p['nombre'] . ']]></nombre>');
		// 	$txt .= utf8_encode('<descripcion><![CDATA[' . $p['descripcion'] . ']]></descripcion>');
		// 	$txt .= utf8_encode('<precio><![CDATA[' . $p['precio'] . ']]></precio>');
		// 	$txt .= utf8_encode('</producto>');
		// }
		// //cierre de la etiqueta raiz
		// $txt .= utf8_encode('</productos>');
		// fwrite($file, $txt);
		// fclose($file);
		// return $txt;
	}

}

?>