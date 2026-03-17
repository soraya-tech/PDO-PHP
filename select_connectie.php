<?php
// nieuwe connectie maken met database 
$host="127.0.0.1:3306";
$user="root";
$db="select_db";
$pass="";
try{
    $conn=new pdo("mysql:host=$host;dbname=$db", $user, $pass);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
?>
