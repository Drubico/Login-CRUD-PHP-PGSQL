<?php
session_start();
if(isset($_SESSION["login"])){ 
  header("Location: ../Cliente/ClienteRead.php");
};



include "../../database/Database.php";
if(isset($_POST['submit'])&&!empty($_POST['submit'])){
  //Esto evita ataque de Injection SQL
    $hashpassword = md5($_POST['pwd']);
    $email=$_POST['email'];
    $sentencia = $base_de_datos->prepare("select * from public.user where email = ? and password = ?;");
    $sentencia->execute([$email,$hashpassword]);
    # Fetch all es para traer el usuario $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //Contamos los usuarios que coinciden
    $resultado = $sentencia->fetchColumn();
    if($resultado>0){ 
        // Session 
        if(isset($_SESSION["login"])){
          session_unset(); 
          session_destroy(); 
          session_start();
        };
        $_SESSION["login"]=true;
        sleep(1); 
        //var_dump(isset($_SESSION["login"]));
        header("Location: ../Cliente/ClienteRead.php");
    }else{
      echo $resultado;
      echo "Invalid Details";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login-Register</title>
  <meta name="keywords" content="PHP,PostgreSQL,Insert,Login">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Login  </h2>
  <form method="post">
  
     
    <div class="form-group">
      <label for="email">Email:</label>
      <input  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    
     
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,}" type="password"  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 4 or more characters" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
     
    <input type="submit" name="submit" class="btn btn-primary" value="Submit">
    <a href="./register.php" class="btn btn-warning">Registrarse</a>
  </form>
</div>

</body>
</html>