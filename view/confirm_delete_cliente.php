<div class="section-two w-100">
	<div class="container">
		<form class="form" action="index.php?controller=cliente&action=delete" method="POST">
			<input type="hidden" name="id" value="<?php echo $dataToView["data"]["id"]; ?>" />
			<div class="alert alert-warning">
				<b>¿Confirma que desea eliminar a este cliente?:</b>
				<hr>
				<i><?= $dataToView["data"]["dni"] . ' - ' . $dataToView["data"]["nombre"]. ' - ' . $dataToView["data"]["apellido1"]. ' - ' . $dataToView["data"]["apellido2"]; ?></i>
			</div>
			<input type="submit" value="Eliminar" class="btn btn-danger" />
			<a class="btn btn-outline-success" href="index.php?controller=cliente&action=list">Cancelar</a>
		</form>
	</div>
</div>