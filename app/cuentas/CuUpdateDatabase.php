<?php
session_start();
if(!isset($_SESSION["login"])){ 
    header("Location: ../../view/Login/login.php");
}
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
    !isset($_POST["clienteid"]) ||
    !isset($_POST["cuenta"])
) {
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include "../../database/Database.php";
$id = $_POST["id"];
$clienteid = $_POST["clienteid"];
$cuenta = $_POST["cuenta"];

$sentencia = $base_de_datos->prepare("UPDATE cuentas SET clienteid = ?, cuenta = ? WHERE id = ?;");
$resultado = $sentencia->execute([$clienteid, $cuenta, $id]); # Pasar en el mismo orden de los ?
if ($resultado === true) {
    header("Location: ../../view/Cliente/ClienteRead.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del usuario";
}
