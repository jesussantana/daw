<?php
//CONEXION BASE DE DATOS

include_once('conectar.php');


session_start();

$stmt = $conn->prepare('SELECT ID,User,Nombre,Permisos FROM usuarios WHERE User=:user');
$stmt->execute(array(':user' => $_SESSION['username']));
$row=$stmt->fetch(PDO::FETCH_ASSOC);
$nombre=$row['Nombre'];
$permisos=$row['Permisos'];
$identificacion=$row['ID'];
$user=$row['User'];

if (!isset($nombre)){
    $conn=null;
    header('location: ../index.php');
}

?>