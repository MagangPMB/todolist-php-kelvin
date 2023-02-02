<?php

$host ="localhost";
$username="root";
$pass="";
$db_name="to_do_list";

try{
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $pass);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  echo "Connection failed : ". $e->getMessage();
}