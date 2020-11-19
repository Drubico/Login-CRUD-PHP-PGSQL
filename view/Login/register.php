<?php
$host = "localhost";
$port = "5432";
$dbname = "sed";
$user = "admin";
$password = "admin"; 
$connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
$dbconn = pg_connect($connection_string);
if(isset($_POST['submit'])&&!empty($_POST['submit'])){
    
      $sql = "insert into public.user(name,email,password,mobno)values('".$_POST['name']."','".$_POST['email']."','".md5($_POST['pwd'])."','".$_POST['mobno']."')";
    $ret = pg_query($dbconn, $sql);
    if($ret){
        
            echo "Data saved Successfully";
            header("location: ./login.php");
    }else{
        
            echo "Soething Went Wrong";
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
  <h2>Register Here </h2>
  <form method="post">
  
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" requuired>
    </div>
    
    <div class="form-group">
      <label for="email">Email:</label>
      <input  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    
    <div class="form-group">
      <label for="pwd">Mobile No:</label>
      <input type="number" class="form-control" maxlength="10" id="mobileno" placeholder="Enter Mobile Number" name="mobno">
    </div>
    
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,}"  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 4 or more characters" type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
     
    <input type="submit" name="submit" class="btn btn-primary" value="Submit">
    <a href="./login.php" class="btn btn-warning">Ingresar</a>

  </form>
</div>

</body>
</html>