<?php
/*
================================

Este archivo guarda los datos del formulario
en donde se editan
================================
*/
?>

<?php

#Salir si alguno de los datos no está presente
if (
    !isset($_POST["id"]) ||
    !isset($_POST["cuentaid"]) ||
    !isset($_POST["numero_tarjeta"]) ||
    !isset($_POST["fecha"]) ||
    !isset($_POST["cvv"])
) {
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include "../../database/Database.php";
$id = $_POST["id"];
$cuentaid = $_POST["cuentaid"];
$numero_tarjeta = $_POST["numero_tarjeta"];
$fecha = $_POST["fecha"];
$cvv = $_POST["cvv"];

$sentencia = $base_de_datos->prepare("UPDATE tarjeta SET cuentaid = ?, numero_tarjeta = ?,fecha = ?,cvv =? WHERE id = ?;");
$resultado = $sentencia->execute([$cuentaid, $numero_tarjeta,$fecha,$cvv, $id]); # Pasar en el mismo orden de los ?
if ($resultado === true) {
    header("Location: ../../view/Cliente/ClienteRead.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del usuario";
}
