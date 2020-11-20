<?php
session_start();
if(!isset($_SESSION["login"])){ 
    header("Location: ../../view/Login/login.php");
}
/*
================================

Este archivo inserta los datos 
enviados a través de formulario.php
================================
*/
?>
<?php
#Salir si alguno de los datos no está presente
if (!isset($_POST["nombre"]) || !isset($_POST["apellido"]) || !isset($_POST["dui"])) {
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include "../../database/Database.php";
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$dui = $_POST["dui"];


/*
Al incluir el archivo "../database/base_de_datos.php", todas sus variables están
a nuestra disposición. Por lo que podemos acceder a ellas tal como si hubiéramos
copiado y pegado el código
 */
$sentencia = $base_de_datos->prepare("INSERT INTO cliente(nombre, apellido,dui) VALUES (?, ?,?);");
$resultado = $sentencia->execute([$nombre, $apellido,$dui]); # Pasar en el mismo orden de los ?

#execute regresa un booleano. True en caso de que todo vaya bien, falso en caso contrario.
#Con eso podemos evaluar

if ($resultado === true) {
    # Redireccionar a la lista
	header("Location: ../../view/Cliente/ClienteRead.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista";
}
