<script>

    var segundos = 5;
    function contar(){
        if(segundos <= 0){
            document.getElementById('contador').innerHTML = 'Redireccionando ...';
            document.location = '../content/login1.php';
        } else {
            segundos--;
            document.getElementById('contador').innerHTML = 'Redirección automática en ' + segundos + ' segundos.';
        }

    }
    setInterval('contar()',1000);
</script>

<?php


                    if (isset($_POST['Registro']) ) {
                        if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['nom']) && !empty($_POST['nom'])&& isset($_POST['password']) && !empty($_POST['password'])) {

                            //evio variables submit
                            $username = $_POST['username'];
                            $nombre= $_POST['nom'];
                            $password = hash('md5', $_POST['password']);
                            $fechahora= date('ymdhms');




                            //CONEXION BASE DE DATOS

                            include_once('conectar.php');
                            $permiso='User';
                            $stmt = $conn->prepare('INSERT INTO usuarios (User,Password,Nombre,Permisos,Registro) VALUES (:user, :pass, :nom, :per, :reg)');
                            $data = $stmt->execute(array(':user' => $_POST['username'], ':pass' => $password, ':nom' => $_POST['nom'], ':per' => $permiso, ':reg' => $fechahora));

                            $stmt3= $conn->prepare('SELECT ID FROM usuarios ORDER BY ID DESC limit 0,1');
                            $stmt3->execute();
                            $data3 = $stmt3->fetch(PDO::FETCH_ASSOC);
                            $iden=$data3['ID'];

                            $stmt2 = $conn->prepare('INSERT INTO visitas (ID,Puntos,Realizadas,Recibidas) VALUES (:id, :pun, :real, :rec)');
                            $data2 = $stmt2->execute(array(':id'=>$iden, ':pun'=>'1000', ':real'=>'0', ':rec'=>'0'));
                            if (($data == 1) && $data2==1) {
                                print "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p>Usuario añadido correctamente</p>";
                                print "</div>";
                            }
                            else {
                                print "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p>Se ha producido un error...</p>";
                                print "</div>";
                            }
                            print"<div id='contador' align='center'>Redireccion automática en 5 segundos</div>";

                            $conn = null;
                        }
                    }
                    ?>


