<?php
/*
================================

Este archivo muestra un formulario que
se envía a insertar.php, el cual guardará
los datos
================================
*/
?>
<?php

include './headerCliente.php'; ?>
<div class="row">
	<div class="col-12">
		<h1>Agregar</h1>
		<form action="../../app/cliente/CCreate.php" method="POST">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input pattern="^([A-Z][a-z]+([ ]?[a-z]?['-]?[A-Z][a-z]+)*)$" title="Tienen que ser Letras" required name="nombre" type="text" id="nombre" placeholder="Nombre de Cliente" class="form-control">
			</div>
			<div class="form-group">
				<label for="apellido">Apellido</label>
				<input pattern="^([A-Z][a-z]+([ ]?[a-z]?['-]?[A-Z][a-z]+)*)$" title="Tienen que ser Letras" required name="apellido" type="text" id="apellido" placeholder="Apellido de Cliente" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">DUI</label>
				<input pattern="[0-9]{9}" title="tiene que ser formato : 9 numeros" required name="dui" type="text" id="dui" placeholder="DUI de Cliente" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar Cliente</button>
		</form>
	</div>
</div>
<?php 
include  '../../resources/footer.php'; ?>
