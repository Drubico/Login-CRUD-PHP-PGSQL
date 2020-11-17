#Si la mascota existe, se ejecuta esta parte del código
?>
<?php include './header.php';?>
<div class="row">
	<div class="col-12">
		<h1>Editar</h1>
		<form action="../database/UpdateDatabase.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $mascota->id; ?>">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input value="<?php echo $mascota->nombre; ?>" required name="nombre" type="text" id="nombre" placeholder="Nombre de mascota" class="form-control">
			</div>
			<div class="form-group">
				<label for="edad">Edad</label>
				<input value="<?php echo $mascota->edad; ?>" required name="edad" type="number" id="edad" placeholder="Edad de mascota" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="./Read.php" class="btn btn-warning">Volver</a>
		</form>
	</div>
</div>
<?php include "./footer.php"?>