<?php
$host="127.0.0.1:3306";
$user="root";
$pass="";
$db="winkel";
try{
    $pdo=new pdo("mysql:host=$host;dbname=$db",$user,$pass);
    echo"Connected to database ($db).";
}catch(PDOException $e){
    echo"error:".$e->getMessage();
}
?>