<div class="row">
	<form class="form" action="inicio.php?controller=lectura&action=delete" method="POST">
		<input type="hidden" name="cod" value="<?php echo $dataToView["data"]["cod"]; ?>" />
		<div class="alert alert-warning">
			<b>¿Confirma que desea eliminar esta lectura?:</b>
			<i><?php echo $dataToView["data"]["lectura"]; ?></i>
		</div>
		<input type="submit" value="Eliminar" class="btn btn-danger"/>
		<a class="btn btn-outline-success" href="inicio.php?controller=lectura&action=list">Cancelar</a>
	</form>
</div>