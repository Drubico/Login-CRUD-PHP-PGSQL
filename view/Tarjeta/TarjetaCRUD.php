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
$cuentaid = $_GET["id"];
include "../../database/Database.php";
$sentencia = $base_de_datos->prepare("SELECT id, clienteid,cuenta FROM cuentas WHERE id = ?;");
$sentencia->execute([$cuentaid]);
$cuenta = $sentencia->fetchObject();


include './headerTarjeta.php'; ?>
<div class="row">
	<div class="col-12">
		<h1>Agregar</h1>
		<form action="../../app/tarjeta/TCreate.php" method="POST">
			<div class="form-group">
				<label for="numero_tarjeta">Numero de Tarjeta</label>
				<input required name="numero_tarjeta" type="text" id="numero_tarjeta" placeholder="Numero de Tarjeta" class="form-control">
			</div>
			<div class="form-group">
				<label for="fecha">Fecha de Vencimiento(yy/mm)</label>
				<input required name="fecha" type="text" id="fecha" placeholder="Fecha de Vencimiento(yy/mm)" class="form-control">
			</div>
			<div class="form-group">
				<label for="cvv">Numero de Cvv</label>
				<input required name="cvv" type="text" id="cvv" placeholder="Numero de Cvv" class="form-control">
			</div>
			<input type="hidden" name="cuentaid" value="<?php echo $cuenta->id; ?>">
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="../Cliente/ClienteCRUD.php" class="btn btn-warning">Regresar</a>
		</form>
	</div>
</div>
<?php 
include  '../../resources/footer.php'; ?>
