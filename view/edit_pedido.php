<?php
$idCliente = $dniCliente = $nombreCliente = $apellido1 = $apellido2 = $idProducto = $codigoProducto = $nombreProducto = $descripcionProducto = $precioUnidad = $idPedido = $cantidad = $codigoPedido = $fechaPedido = "";

if (isset($dataToView["data"]["id_cliente"])) $idCliente = $dataToView["data"]["id_cliente"];
if (isset($dataToView["data"]["dni"])) $dniCliente = $dataToView["data"]["dni"];
if (isset($dataToView["data"]["nombre_cliente"])) $nombreCliente = $dataToView["data"]["nombre_cliente"];
if (isset($dataToView["data"]["apellido1"])) $apellido1 = $dataToView["data"]["apellido1"];
if (isset($dataToView["data"]["apellido2"])) $apellido2 = $dataToView["data"]["apellido2"];
if (isset($dataToView["data"]["id_producto"])) $idProducto = $dataToView["data"]["id_producto"];
if (isset($dataToView["data"]["codigo_producto"])) $codigoProducto = $dataToView["data"]["codigo_producto"];
if (isset($dataToView["data"]["nombre_producto"])) $nombreProducto = $dataToView["data"]["nombre_producto"];
if (isset($dataToView["data"]["descripcion"])) $descripcionProducto = $dataToView["data"]["descripcion"];
if (isset($dataToView["data"]["precio_unidad"])) $precioUnidad = $dataToView["data"]["precio_unidad"];
if (isset($dataToView["data"]["id_pedido"])) $idPedido = $dataToView["data"]["id_pedido"];
if (isset($dataToView["data"]["cantidad"])) $cantidad = $dataToView["data"]["cantidad"];
if (isset($dataToView["data"]["codigo_pedido"])) $codigoPedido = $dataToView["data"]["codigo_pedido"];
if (isset($dataToView["data"]["fecha"])) $fechaPedido = $dataToView["data"]["fecha"];

?>
<div class="section-two w-100">
	<div class="container">
		<?php
		if (isset($_GET["response"]) and $_GET["response"] === true) {
		?>
			<div class="alert alert-success">
				Operación realizada correctamente. <a href="index.php?controller=pedido&action=list">Volver al listado</a>
			</div>
		<?php
		}
		?>
		<div class="col col-lg-6 mx-auto">
			<form class="form bg-light p-5 rounded shadow-lg" action="index.php?controller=pedido&action=save" method="POST">
				<input type="hidden" name="id_pedido" value="<?= $idPedido; ?>" />
				<div class="form-group">
					<label>Código de pedido:</label>
					<input class="form-control" type="text" name="dni" value="<?= $codigoPedido; ?>" />
				</div>
				<div class="form-group mb-2">
					<label>Nombre:</label>
					<input class="form-control" type="text" name="nombre" value="<?= $nombre; ?>" />
				</div>
				<div class="form-group mb-4">
					<label>Apellidos:</label>
					<input class="form-control mb-2" type="text" name="apellido1" value="<?= $apellido1; ?>" />
					<input class="form-control mb-2" type="text" name="apellido2" value="<?= $apellido2; ?>" />
				</div>
				
				<input type="submit" value="Guardar" class="btn btn-primary" />
				<a class="btn btn-outline-danger" href="index.php?controller=cliente&action=list">Cancelar</a>
			</form>
		</div>

	</div>
</div>