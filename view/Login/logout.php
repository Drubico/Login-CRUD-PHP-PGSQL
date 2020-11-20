<?php
    session_start();
    //destroy the session
    if(isset($_SESSION["login"])){ 
        unset($_SESSION["login"]);
    }
    session_set_cookie_params(0);
    session_destroy(); 
    header("location: ./login.php")
?>