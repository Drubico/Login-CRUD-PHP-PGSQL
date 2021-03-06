<?php
session_start();
if(!isset($_SESSION["login"])){ 
    header("Location: ../../view/Login/login.php");
}
/*
================================

Este archivo muestra un formulario llenado automáticamente
(a partir del ID pasado por la URL) para editar
================================
 */
if (!isset($_GET["id"])) {
    $id=$cliente->id;
    if(!isset($id)){
        header('location: ../../view/Cliente/ClienteRead.php');
    }
}else{
    $id = $_GET["id"];
}

include "../../database/Database.php";
$sentencia = $base_de_datos->prepare("SELECT id, nombre, apellido,dui FROM cliente WHERE id = ?;");
$sentencia->execute([$id]);
$cliente = $sentencia->fetchObject();
if (!$cliente) {
    #No existe
    echo "¡No existe algun Cliente con ese ID!";
    exit();
}

#Si el cliente existe, se ejecuta esta parte del código
?>
<?php include '../../view/Cliente/headerCliente.php'?>
    <div class="row">
        <div class="col-12">
            <h1>Editar</h1>
            <form action="./CUpdateDatabase.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $cliente->id; ?>">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input pattern="^([A-Z][a-z]+([ ]?[a-z]?['-]?[A-Z][a-z]+)*)$" title="Tienen que ser Letras" value="<?php echo $cliente->nombre; ?>" required name="nombre" type="text" id="nombre" placeholder="Nombre de cliente" class="form-control">
                </div>
                <div class="form-group">
                    <label for="apelli">Apellido</label>
                    <input pattern="^([A-Z][a-z]+([ ]?[a-z]?['-]?[A-Z][a-z]+)*)$" title="Tienen que ser Letras" value="<?php echo $cliente->apellido; ?>" required name="apellido" type="text" id="apellido" placeholder="Apellido de cliente" class="form-control">
                </div>
                <div class="form-group">
                    <label for="dui">DUI</label>
                    <input pattern="[0-9]{9}" title="tiene que ser formato : 9 numeros" value="<?php echo $cliente->dui; ?>" required name="dui" type="text" id="dui" placeholder="DUI de cliente" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="../../view/Cliente/ClienteRead.php" class="btn btn-warning">Volver</a>
            </form>
        </div>
    </div>
 
<?     include "../../resources/footer.php"?>