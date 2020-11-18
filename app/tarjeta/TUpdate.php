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
$sentencia = $base_de_datos->prepare("SELECT id,cuentaid, numero_tarjeta,fecha,cvv FROM tarjeta WHERE id = ?;");
$sentencia->execute([$id]);
$tarjeta = $sentencia->fetchObject();
if (!$tarjeta) {
    #No existe
    echo "¡No existe algun Cliente con ese ID!";
    exit();
}

#Si el cliente existe, se ejecuta esta parte del código
?>
<?php include '../../view/Tarjeta/headerTarjeta.php'?>
    <div class="row">
        <div class="col-12">
            <h1>Editar</h1>
            <form action="./TUpdateDatabase.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $tarjeta->id; ?>">
                <input type="hidden" name="cuentaid" value="<?php echo $tarjeta->cuentaid; ?>">
                <div class="form-group">
                    <label for="numero_tarjeta">Numero de Tarjeta</label>
                    <input value="<?php echo $tarjeta->numero_tarjeta; ?>" required name="numero_tarjeta" type="text" id="numero_tarjeta" placeholder="Numero de tarjeta" class="form-control">
                </div>
                <div class="form-group">
                    <label for="fecha">Fecha de vencimiento</label>
                    <input value="<?php echo $tarjeta->fecha; ?>" required name="fecha" type="text" id="fecha" placeholder="Fecha de vencimiento" class="form-control">
                </div>
                <div class="form-group">
                    <label for="cvv">CVV</label>
                    <input value="<?php echo $tarjeta->cvv; ?>" required name="cvv" type="text" id="cvv" placeholder="CVV" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="../../view/Cliente/ClienteRead.php" class="btn btn-warning">Volver</a>
            </form>
        </div>
    </div>
 
<?     include "../../resources/footer.php"?>