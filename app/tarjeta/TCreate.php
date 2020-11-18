<?php
/*
================================

Este archivo inserta los datos 
enviados a través de formulario.php
================================
*/
?>
<?php
#Salir si alguno de los datos no está presente
// if (!isset($_POST["nombre"]) || !isset($_POST["edad"])) {
//     exit();
// }

#Si todo va bien, se ejecuta esta parte del código...

include "../../database/Database.php";
$cuentaid = $_POST["cuentaid"];
$numero_tarjeta = $_POST["numero_tarjeta"];
$fecha=$_POST["fecha"];
$cvv=$_POST["cvv"];

/*
Al incluir el archivo "../database/base_de_datos.php", todas sus variables están
a nuestra disposición. Por lo que podemos acceder a ellas tal como si hubiéramos
copiado y pegado el código
 */
$sentencia = $base_de_datos->prepare("INSERT INTO tarjeta(cuentaid, numero_tarjeta,fecha,cvv) VALUES (?, ?,?,?);");
$resultado = $sentencia->execute([$cuentaid, $numero_tarjeta,$fecha,$cvv]); # Pasar en el mismo orden de los ?

#execute regresa un booleano. True en caso de que todo vaya bien, falso en caso contrario.
#Con eso podemos evaluar

if ($resultado === true) {
    # Redireccionar a la lista
	header("Location: ../../view/Cliente/ClienteRead.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista";
}
