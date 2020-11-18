<?php

/*
================================

Este archivo elimina un dato por ID sin
pedir confirmación. El ID viene de la URL
================================
*/
if (!isset($_GET["id"])) {
    exit();
}

$id = $_GET["id"];
include "../../database/Database.php";
$sentencia = $base_de_datos->prepare("DELETE FROM tarjeta WHERE id = ?;");
$resultado = $sentencia->execute([$id]);
if ($resultado === true) {
    header("Location: ../../view/Cliente/ClienteRead.php");
} else {
    echo "Algo salió mal";
}
