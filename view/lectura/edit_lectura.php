<?php
$cod = $cod_sensor = $lectura = $fecha = "";

if(isset($dataToView["data"]["cod"])) $cod = $dataToView["data"]["cod"];
if(isset($dataToView["data"]["cod_sensor"])) $cod_sensor = $dataToView["data"]["cod_sensor"];
if(isset($dataToView["data"]["lectura"])) $lectura = $dataToView["data"]["lectura"];
if(isset($dataToView["data"]["fecha"])) $fecha = $dataToView["data"]["fecha"];

?>
<div class="row">
	<?php
	if(isset($_GET["response"]) and $_GET["response"] === true){
		?>
		<div class="alert alert-success">
			Operación realizada correctamente. <a href="inicio.php?controller=lectura&action=list">Volver al listado</a>
		</div>
		<?php
	}
	?>
	<form class="form" action="inicio.php?controller=lectura&action=save" method="POST">
		<input type="hidden" name="cod" value="<?php echo $cod; ?>" />
		<div class="form-group">
			<label>cod_sensor</label>
			<input class="form-control" type="text" name="cod_sensor" value="<?php echo $cod_sensor; ?>" />
		</div>
		<div class="form-group">
			<label>lectura</label>
			<input class="form-control" type="text" name="lectura" value="<?php echo $lectura; ?>" />
		</div>
		<div class="form-group mb-2">
			<label>fecha</label>
			<input type="date" class="form-control" name="fecha" value="<?php echo $fecha; ?>"/>
		</div>
		<input type="submit" value="Guardar" class="btn btn-primary"/>
		<a class="btn btn-outline-danger" href="inicio.php?controller=lectura&action=list">Cancelar</a>
	</form>
</div>