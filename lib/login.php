
<?php
SESSION_start();
$error='';

if (isset($_POST['login']) ) {
    if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {

        //evio variables submit
        $username = $_POST['username'];
        $password = hash('md5', $_POST['password']);


        //CONEXION BASE DE DATOS

        include_once('conectar.php');

        $stmt = $conn->prepare('SELECT User,Password FROM usuarios WHERE User=:user AND Password=:pass');
        $stmt->execute(array(':user' => $username, ':pass' => $password));
        if ($stmt->fetch(PDO::FETCH_ASSOC)) {
            $_SESSION['username'] = $username;// VARIABLE
            header('location: home.php');
        } else {
            $error = "usuario o password incorrecto";

        }

    } else {
        print "incorrecto";
    }
    $conn=null;
}


?>