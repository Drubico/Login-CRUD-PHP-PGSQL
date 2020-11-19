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
$sentencia = $base_de_datos->query("select id,nombre, apellido,dui from cliente order by id;");
$clientes = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->
<!doctype html>
<html lang="es">
<!--
================================
Este archivo define un encabezado que es
incluido y reutilizado por otros archivos
================================
-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="CRUD">
    <title>CRUD</title>
    <!-- Cargar el CSS de Boostrap-->

    <link href="../../resources/style/bootstrap.min.css" rel="stylesheet">
    <!-- Cargar estilos propios -->
    <link href="../../resources/style/style.css" rel="stylesheet">
</head>

<body>
    <!-- Definición del menú -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" target="_blank" href="./ClienteRead.php">
        Home
        </a>
        <div class="collapse navbar-collapse" id="miNavbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./ClienteCRUD.php">Agregar</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Termina la definición del menú -->
    <main role="main" class="container">
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