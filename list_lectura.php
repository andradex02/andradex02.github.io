<div class="row">
	<div class="col-md-12 text-right">
		<a href="inicio.php?controller=lectura&action=edit" class="btn btn-outline-primary">insertar lectura</a>
		<hr/>
	</div>
	<?php
	if(count($dataToView["data"])>0){
		foreach($dataToView["data"] as $lectura){
			?>
			<div class="col-md-3">
				<div class="card-body border border-secondary rounded">
					<div class="card-text"><?php echo nl2br($lectura['cod_sensor']);?></div>
					<h5 class="card-nombre"><?php echo $lectura['lectura']; ?></h5>
					<div class="card-text"><?php echo nl2br($lectura['fecha']); ?></div>
					

					<hr class="mt-1"/>
					<a href="inicio.php?controller=lectura&action=edit&cod=<?php echo $lectura['cod']; ?>" class="btn btn-primary">Editar</a>
					<a href="inicio.php?controller=lectura&action=confirmDelete&cod=<?php echo $lectura['cod']; ?>" class="btn btn-danger">Eliminar</a>
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