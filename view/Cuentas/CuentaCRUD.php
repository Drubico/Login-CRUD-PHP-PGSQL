<?php
session_start();
if(!isset($_SESSION["login"])){ 
    header("Location: ../Login/login.php");
}
/*
================================

Este archivo muestra un formulario que
se envía a insertar.php, el cual guardará
los datos
================================
*/
?>
<?php
$clienteid = $_GET["id"];
include "../../database/Database.php";
$sentencia = $base_de_datos->prepare("SELECT id, nombre, apellido,dui FROM cliente WHERE id = ?;");
$sentencia->execute([$clienteid]);
$cliente = $sentencia->fetchObject();


include './headerCuentas.php'; ?>
<div class="row">
	<div class="col-12">
		<h1>Agregar</h1>
		<form action="../../app/cuentas/CuCreate.php" method="POST">
			<div class="form-group">
				<label for="cuenta">Cuenta</label>
				<input  required name="cuenta" type="text" id="cuenta" placeholder="Nombre de Cuenta" class="form-control">
			</div>
			<input type="hidden" name="clienteid" value="<?php echo $cliente->id; ?>">
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="../Cliente/ClienteCRUD.php" class="btn btn-warning">Regresar</a>
		</form>
	</div>
</div>
<?php 
include  '../../resources/footer.php'; ?>
