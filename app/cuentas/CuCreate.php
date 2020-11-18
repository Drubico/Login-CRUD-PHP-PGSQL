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
// if ( !isset($_POST["cuenta"])|| !isset($_POST["clienteid"])) {

//     exit();
// }

#Si todo va bien, se ejecuta esta parte del código...

include "../../database/Database.php";
$cuenta = $_POST["cuenta"];
$clienteid = $_POST["clienteid"];


/*
Al incluir el archivo "../database/base_de_datos.php", todas sus variables están
a nuestra disposición. Por lo que podemos acceder a ellas tal como si hubiéramos
copiado y pegado el código
 */
$sentencia = $base_de_datos->prepare("INSERT INTO cuentas(cuenta,clienteid) VALUES (?,?);");
$resultado = $sentencia->execute([$cuenta, $clienteid]); # Pasar en el mismo orden de los ?

#execute regresa un booleano. True en caso de que todo vaya bien, falso en caso contrario.
#Con eso podemos evaluar

if ($resultado === true) {
    # Redireccionar a la lista
	header("Location: ../../view/Cliente/ClienteRead.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista";
}
