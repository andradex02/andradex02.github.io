<div class="row">
	<div class="col-md-12 text-right">
		<a href="inicio.php?controller=sensor&action=edit" class="btn btn-outline-primary">Crear nota</a>
		<hr/>
	</div>
	<?php
	if(count($dataToView["data"])>0){
		foreach($dataToView["data"] as $sensor){
			?>
			<div class="col-md-3">
				<div class="card-body border border-secondary rounded">
				<h5 class="card-nombre"><?php echo $sensor['cod']; ?></h5>
					<h5 class="card-nombre"><?php echo $sensor['nombre']; ?></h5>
					<div class="card-text"><?php echo nl2br($sensor['tipo']); ?></div>
					<hr class="mt-1"/>
					<a href="inicio.php?controller=sensor&action=edit&cod=<?php echo $sensor['cod']; ?>" class="btn btn-primary">Editar</a>
					<a href="inicio.php?controller=sensor&action=confirmDelete&cod=<?php echo $sensor['cod']; ?>" class="btn btn-danger">Eliminar</a>
				</div>
			</div>
			<?php
		}
	}else{
		?>
		<div class="alert alert-info">
			Actualmente no existen notas.
		</div>
		<?php
	}
	?>
</div>