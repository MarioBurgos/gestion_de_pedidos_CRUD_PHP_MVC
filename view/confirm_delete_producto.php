<div class="section-three">
	<div class="container">
		<form class="form" action="index.php?controller=producto&action=delete" method="POST">
			<input type="hidden" name="id" value="<?php echo $dataToView["data"]["id"]; ?>" />
			<div class="alert alert-warning">
				<b>¿Confirma que desea eliminar el producto?:</b>
				<hr>
				<i><?= $dataToView["data"]["codigo"] . ' - ' . $dataToView["data"]["nombre"]; ?></i>
			</div>
			<input type="submit" value="Eliminar" class="btn btn-danger" />
			<a class="btn btn-outline-success" href="index.php?controller=producto&action=list">Cancelar</a>
		</form>
	</div>
</div>