<?php
//CONNEXIO A LA BASE DE DADES
try {
    $conn=new PDO('mysql:host=localhost;dbname=twister traffic;charset=UTF8','root','');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "ERROR: " . $e->getMessage();
}
?>