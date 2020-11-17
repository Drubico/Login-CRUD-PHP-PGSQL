<?php
include(dirname(__DIR__).'/config/path.php');
include(dirname(__DIR__)."db.php"); 
$index=__DIR__."/app/CRUD.php";
header("Location: ".$index);
echo $index."\n";
echo __FILE__;
?>
