
<?php
if (!isset($_GET["id"])) {
	header("Location: ./CuentaCRUD.php");
    exit();
}
$cuentaid = $_GET["id"];
include "../../database/Database.php";
$sentencia = $base_de_datos->query("SELECT ID ,cuentaid,numero_tarjeta,fecha,cvv FROM Tarjeta where cuentaid=$cuentaid;");
$tarjetas = $sentencia->fetchAll(PDO::FETCH_OBJ);;
// if (!$cuentas) {
//     #No existe
// 	header("Location: ./CuentaCRUD.php?=id=".$idcliente);
// 	echo "¡No existe alguna cuenta con ese ID!";
//     exit();
// }
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
        <a class="navbar-brand" target="_blank" href="../Cliente/ClienteRead.php">
        Tarjeta
        </a>
        <div class="collapse navbar-collapse" id="miNavbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo "./TarjetaCRUD.php?id=".$cuentaid?>">Agregar</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Termina la definición del menú -->
    <main role="main" class="container">
        
<div class="row">
<!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
	<div class="col-12">
		<h1>Tarjetas</h1>
		<br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>ID</th>
						<th>Numero de Tarjeta</th>
						<th>CVV</th>
						<th>Editar</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody>
					<!--
					Atención aquí, sólo esto cambiará
					Pd: no ignores las llaves de inicio y cierre {}
					-->
					<?php foreach($tarjetas as $tarjeta){ ?>
						<tr>
							<td><?php echo $tarjeta->id ?></td>
							<td><?php echo $tarjeta->numero_tarjeta ?></td>
							<td><?php echo $tarjeta->fecha ?></td>
							<td><a class="btn btn-warning" href="<?php echo "../../app/tarjeta/TUpdate.php?id=" . $tarjeta->id?>">Editar 📝</a></td>
							<td><a class="btn btn-danger" href="<?php echo "../../app/tarjeta/TDelete.php?id=" . $tarjeta->id?>">Eliminar 🗑️</a></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once "../../resources/footer.php" ?>