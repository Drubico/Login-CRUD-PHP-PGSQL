<?php
$host = "localhost";
$port = "5432";
$dbname = "sed";
$user = "admin";
$password = "admin"; 
$connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
$dbconn = pg_connect($connection_string);

if(isset($_POST['submit'])&&!empty($_POST['submit'])){
    

    $hashpassword = md5($_POST['pwd']);
    
    $sql ="select *from public.user where email = '".pg_escape_string($_POST['email'])."' and password ='".$hashpassword."'";

    $data = pg_query($dbconn,$sql); 
    $login_check = pg_num_rows($data);
    if($login_check > 0){ 
        
        echo "Login Successfully";    
        header("location: ../Cliente/ClienteRead.php");

    }else{
        
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