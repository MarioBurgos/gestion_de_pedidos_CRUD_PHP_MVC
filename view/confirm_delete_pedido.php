<div class="section-two w-100">
	<div class="container">
		<form class="form" action="index.php?controller=pedido&action=delete" method="POST">
			<input type="hidden" name="id" value="<?php echo $dataToView["data"]["id"]; ?>" />
			<div class="alert alert-warning">
				<b>¿Confirma que desea eliminar este pedido?:</b>
				<hr>
				<!-- <i><?php //echo $dataToView["data"]["codigo"] . ' - ' . $dataToView["data"]["nombre"]; ?></i> -->
			</div>
			<input type="submit" value="Eliminar" class="btn btn-danger" />
			<a class="btn btn-outline-success" href="index.php?controller=producto&action=list">Cancelar</a>
		</form>
	</div>
</div>