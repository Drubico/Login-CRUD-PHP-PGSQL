<?php
/*
================================

Este archivo muestra un formulario que
se envía a insertar.php, el cual guardará
los datos
================================
*/
?>
<?
include(dirname(__DIR__).'/config/path.php');
include_once (ROOT_PATH."app/MenuBar.php"); ?>
<div class="row">
	<div class="col-12">
		<h1>Agregar</h1>
		<form action="../app/CRUD/Create.php" method="POST">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input required name="nombre" type="text" id="nombre" placeholder="Nombre de mascota" class="form-control">
			</div>
			<div class="form-group">
				<label for="edad">Edad</label>
				<input required name="edad" type="number" id="edad" placeholder="Edad de mascota" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="../app/CRUD/Read.php" class="btn btn-warning">Ver todas</a>
		</form>
	</div>
</div>
<?php include_once "../app/BarDown.php" ?>