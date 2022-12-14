<?php
$id = $codigo = $nombre = $descripcion = "";
$precio = 0;

if (isset($dataToView["data"]["id"])) $id = $dataToView["data"]["id"];
if (isset($dataToView["data"]["codigo"])) $codigo = $dataToView["data"]["codigo"];
if (isset($dataToView["data"]["nombre"])) $nombre = $dataToView["data"]["nombre"];
if (isset($dataToView["data"]["descripcion"])) $descripcion = $dataToView["data"]["descripcion"];
if (isset($dataToView["data"]["precio"])) $precio = $dataToView["data"]["precio"];

?>
<div class="section-two w-100">
	<div class="container">
		<?php
		if (isset($_GET["response"]) and $_GET["response"] === true) {
		?>
			<div class="alert alert-success">
				Operación realizada correctamente. <a href="index.php?controller=producto&action=list">Volver al listado</a>
			</div>
		<?php
		}
		?>
		<div class="col col-lg-6 mx-auto">
			<form class="form bg-light p-5 rounded shadow-lg" action="index.php?controller=producto&action=save" method="POST">
				<input type="hidden" name="id" value="<?= $id; ?>" />
				<div class="form-group">
					<label>Código de barras:</label>
					<input class="form-control" type="text" name="codigo" value="<?= $codigo; ?>" />
				</div>
				<div class="form-group mb-2">
					<label>Nombre:</label>
					<input class="form-control" type="text" name="nombre" value="<?= $nombre; ?>" />
				</div>
				<div class="form-group mb-2">
					<label>Breve descripcion (máx. 512 caracteres):</label>
					<textarea class="form-control" style="white-space: pre-wrap;" name="descripcion"><?= $descripcion; ?></textarea>
				</div>
				<div class="form-group mb-2">
					<label>Precio:</label>
					<input class="form-control" type="number" step="0.01" name="precio" value="<?= $precio; ?>" />
				</div>
				<input type="submit" value="Guardar" class="btn btn-primary" />
				<a class="btn btn-outline-danger" href="index.php?controller=producto&action=list">Cancelar</a>
			</form>
		</div>

	</div>
</div>