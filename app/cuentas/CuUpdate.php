<?php

/*
================================

Este archivo muestra un formulario llenado automáticamente
(a partir del ID pasado por la URL) para editar
================================
 */

if (!isset($_GET["id"])) {
    exit();
}

$id = $_GET["id"];
include "../../database/Database.php";
$sentencia = $base_de_datos->prepare("SELECT id,clienteid, cuenta FROM Cuentas WHERE id = ?;");
$sentencia->execute([$id]);
$cuentas = $sentencia->fetchObject();
if (!$cuentas) {
    #No existe
    echo "¡No existe algun Cliente con ese ID!";
    exit();
}

#Si el cliente existe, se ejecuta esta parte del código
?>
<?php include '../../view/Cuentas/headerCuentas.php'?>
    <div class="row">
        <div class="col-12">
            <h1>Editar</h1>
            <form action="./CuUpdateDatabase.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $cuentas->id; ?>">
                <input type="hidden" name="clienteid" value="<?php echo $cuentas->clienteid; ?>">
                <div class="form-group">
                    <label for="cuenta">Nombre</label>
                    <input value="<?php echo $cuentas->cuenta; ?>" required name="cuenta" type="text" id="cuenta" placeholder="Nombre de Cuenta" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="../../view/Cliente/ClienteRead.php" class="btn btn-warning">Volver</a>
            </form>
        </div>
    </div>
 
<?     include "../../resources/footer.php"?>