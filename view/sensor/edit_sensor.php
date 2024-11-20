<?php
$cod = $nombre = $tipo = "";

if(isset($dataToView["data"]["cod"])) $cod = $dataToView["data"]["cod"];
if(isset($dataToView["data"]["nombre"])) $nombre = $dataToView["data"]["nombre"];
if(isset($dataToView["data"]["tipo"])) $tipo = $dataToView["data"]["tipo"];

?>
<div class="row">
	<?php
	if(isset($_GET["response"]) and $_GET["response"] === true){
		?>
		<div class="alert alert-success">
			Operación realizada correctamente. <a href="inicio.php?controller=sensor&action=list">Volver al listado</a>
		</div>
		<?php
	}
	?>
	<form class="form" action="inicio.php?controller=sensor&action=save" method="POST">
		<input type="hidden" name="cod" value="<?php echo $cod; ?>" />
		<div class="form-group">
			<label>nombre</label>
			<input class="form-control" type="text" name="nombre" value="<?php echo $nombre; ?>" />
		</div>
		<div class="form-group mb-2">
			<label>tipo</label>
			<textarea class="form-control" style="white-space: pre-wrap;" name="tipo"><?php echo $tipo; ?></textarea>
		</div>
		<input type="submit" value="Guardar" class="btn btn-primary"/>
		<a class="btn btn-outline-danger" href="inicio.php?controller=sensor&action=list">Cancelar</a>
	</form>
</div>