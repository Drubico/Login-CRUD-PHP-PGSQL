<?php

/*
================================

Este archivo lista todos los
datos de la tabla, obteniendo a
los mismos como un arreglo
================================
*/
?>
<?php
if (!isset($_GET["id"])) {
	header("Location: ../Cliente/ClienteRead.php");
    exit();
}
$idcliente = $_GET["id"];
include "../../database/Database.php";
$sentencia = $base_de_datos->query("SELECT ID ,cuenta,ClienteID FROM Cuentas where ClienteID=$idcliente;");
$cuentas = $sentencia->fetchAll(PDO::FETCH_OBJ);;
if (!$cuentas) {
    #No existe
	echo "¡No existe alguna cuenta con ese ID!";
	header("Location: ../Cliente/ClienteRead.php");
    exit();
}
?>
<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->
<?php include_once ('./headerCuentas.php'); ?>
<div class="row">
<!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
	<div class="col-12">
		<h1>Cuentas Bancarias</h1>
		<br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>ID</th>
						<th>Cuentas</th>
						<th>Editar</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody>
					<!--
					Atención aquí, sólo esto cambiará
					Pd: no ignores las llaves de inicio y cierre {}
					-->
					<?php foreach($cuentas as $cuentaporCliente){ ?>
						<tr>
							<td><?php echo $cuentaporCliente->id ?></td>
							<td><?php echo $cuentaporCliente->cuenta ?></td>
							<td><a class="btn btn-warning" href="<?php echo "editar.php?id=" . $cuentaporCliente->id?>">Editar 📝</a></td>
							<td><a class="btn btn-danger" href="<?php echo "eliminar.php?id=" . $cuentaporCliente->id?>">Eliminar 🗑️</a></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once "../../resources/footer.php" ?>