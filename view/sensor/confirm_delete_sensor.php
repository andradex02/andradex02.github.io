<div class="row">
	<form class="form" action="inicio.php?controller=sensor&action=delete" method="POST">
		<input type="hidden" name="cod" value="<?php echo $dataToView["data"]["cod"]; ?>" />
		<div class="alert alert-warning">
			<b>¿Confirma que desea eliminar este sensor?:</b>
			<i><?php echo $dataToView["data"]["nombre"]; ?></i>
		</div>
		<input type="submit" value="Eliminar" class="btn btn-danger"/>
		<a class="btn btn-outline-success" href="inicio.php?controller=sensor&action=list">Cancelar</a>
	</form>
</div>