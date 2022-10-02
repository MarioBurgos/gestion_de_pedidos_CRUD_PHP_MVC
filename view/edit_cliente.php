<?php
$id = $dni = $nombre = $apellido1 = $apellido2 = "";

if (isset($dataToView["data"]["id"])) $id = $dataToView["data"]["id"];
if (isset($dataToView["data"]["dni"])) $dni = $dataToView["data"]["dni"];
if (isset($dataToView["data"]["nombre"])) $nombre = $dataToView["data"]["nombre"];
if (isset($dataToView["data"]["apellido1"])) $apellido1 = $dataToView["data"]["apellido1"];
if (isset($dataToView["data"]["apellido2"])) $apellido2 = $dataToView["data"]["apellido2"];

?>
<div class="section-two w-100">
	<div class="container">
		<?php
		if (isset($_GET["response"]) and $_GET["response"] === true) {
		?>
			<div class="alert alert-success">
				Operación realizada correctamente. <a href="index.php?controller=cliente&action=list">Volver al listado</a>
			</div>
		<?php
		}
		?>
		<div class="col col-lg-6 mx-auto">
			<form class="form bg-light p-5 rounded shadow-lg" action="index.php?controller=cliente&action=save" method="POST">
				<input type="hidden" name="id" value="<?= $id; ?>" />
				<div class="form-group">
					<label>DNI:</label>
					<input class="form-control" type="text" name="dni" value="<?= $dni; ?>" />
				</div>
				<div class="form-group mb-2">
					<label>Nombre:</label>
					<input class="form-control" type="text" name="nombre" value="<?= $nombre; ?>" />
				</div>
				<div class="form-group mb-4">
					<label>Apellidos:</label>
					<input class="form-control mb-2" type="text" name="nombre" value="<?= $apellido1; ?>" />
					<input class="form-control mb-2" type="text" name="nombre" value="<?= $apellido2; ?>" />
				</div>
				<input type="submit" value="Guardar" class="btn btn-primary" />
				<a class="btn btn-outline-danger" href="index.php?controller=cliente&action=list">Cancelar</a>
			</form>
		</div>

	</div>
</div>