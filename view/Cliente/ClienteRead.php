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

include "../../database/Database.php";
$sentencia = $base_de_datos->query("select id,nombre, apellido,dui from cliente");
$clientes = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->
<?php include_once ('./headerCliente.php'); ?>
<div class="row">
<!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
	<div class="col-12">
		<h1>Clientes</h1>
		<br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Dui</th>
						<th>Editar</th>
						<th>Eliminar</th>
						<th>Ceuntas</th>
					</tr>
				</thead>
				<tbody>
					<!--
					Atención aquí, sólo esto cambiará
					Pd: no ignores las llaves de inicio y cierre {}
					-->
					<?php foreach($clientes as $cliente){ ?>
						<tr>
							<td><?php echo $cliente->id ?></td>
							<td><?php echo $cliente->nombre ?></td>
							<td><?php echo $cliente->apellido ?></td>
							<td><?php echo $cliente->dui ?></td>
							<td><a class="btn btn-warning" href="<?php echo "../../app/cliente/CUpdate.php?id=" . $cliente->id?>">Editar 📝</a></td>
							<td><a class="btn btn-danger" href="<?php echo "../../app/cliente/CDelete.php?id=" . $cliente->id?>">Eliminar 🗑️</a></td>
							<td><a class="btn btn-primary" href="<?php echo "../Cuentas/CuentaRead.php?id=" . $cliente->id?>">Cuentas 💳</a></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once '../../resources/footer.php'?>