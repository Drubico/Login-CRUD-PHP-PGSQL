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
    !isset($_POST["nombre"]) ||
    !isset($_POST["apellido"]) ||
    !isset($_POST["dui"]) ||
    !isset($_POST["id"])
) {
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include "../../database/Database.php";
$id = $_POST["id"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$dui=$_POST["dui"];

$sentencia = $base_de_datos->prepare("UPDATE cliente SET nombre = ?, apellido = ?,dui=? WHERE id = ?;");
$resultado = $sentencia->execute([$nombre, $apellido,$dui, $id]); # Pasar en el mismo orden de los ?
if ($resultado == true) {
    header("Location: ../../view/Cliente/ClienteRead.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del usuario";
}
