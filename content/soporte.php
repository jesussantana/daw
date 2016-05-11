<?php //CONEXION BASE DE DATOS
include_once('../lib/conectar.php');
?>
    <!DOCTYPE html>
    <html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TWISTER Traffic | Soporte</title>

    <link rel="shortcut icon" href="../images/TWISTER-FAVICON.ico">
    <!--<link href="navegador.css" rel="stylesheet">-->

    <!-- Bootstrap Core CSS -->
    <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">


    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->
</head>
<!-- Page Content -->
<style type="text/css">
    body {
        background: url(../images/trafico-web-gratis.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
</style>
<body>
<script>

    var segundos = 5;
    function contar(){
        if(segundos <= 0){
            document.getElementById('contador').innerHTML = 'Redireccionando ...';
            document.location = '../index.html';
        } else {
            segundos--;
            document.getElementById('contador').innerHTML = 'Redirección automática en ' + segundos + ' segundos.';
        }

    }
    setInterval('contar()',1000);
</script>";

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class=\"row\"><h2><div align='center'><a href="../index.html"><img alt='' src='../images/icons/loop.svg' style='height: 50px;''> <b>TWISTER</b> Traffic</a></div></h2>
            <div align="center"><h1 class="page-header"><i class='fa fa-info fa-fw'></i> Soporte</h1></div>
        </div>

        <?php

            print "<div class=\"col-lg-12\">";

                print "<div class=\"panel panel-yellow\">";

                print "<div class=\"panel-heading\"><i class='fa fa-envelope fa-fw'></i> Mensaje</div>";
                print "<div class=\"panel-body\">";
                    print "<div class=\"row\">";
                        print "<div class=\"col-lg-12\">";
                            print "<form action=\"\" method=\"post\" enctype=\"multipart/form-data\">";
                                print "<div class=\"form-group\">";
                                    print "<label>Tu nombre</label>";
                                    print "<input type=\"text\" name=\"a\" class=\"form-control\" placeholder=\"Introduce tu Nombre\" value=''>";
                                    print "</div>";
                                print "<div class=\"form-group\">";
                                    print "<label>Tu email</label>";
                                    print "<input type=\"email\" name=\"b\" class=\"form-control\" placeholder=\"Introduce tu email\" value=''>";
                                    print "</div>";
                                print "<div class=\"form-group\">";
                                    print "<label>Tu mensaje</label>";
                                    print "<textarea id=\"mytextarea\" name=\"c\" class=\"form-control\" rows=\"7\"></textarea>";
                                    print "</div>";
                                print "<button type=\"submit\" name=\"alta\" value=\"alta\" class=\"btn btn-success btn-circle btn-lg\"><i class=\"fa fa-check\"></i></button>";
                                print "<a href='../index.html' class=\"btn btn-danger btn-circle btn-lg\"><i class=\"fa fa-times\"></i></a>";
                                print "</form>";
                            print "</div>";
                        print "</div>";
                    print "</div>";
                print "</div>";
            print "</div>";
        print"<br><div align='center'><i class='fa fa-copyright fa-fw'></i>2016 <a href='http://www.esmarketingdigital.es'><b>esMarketingDigital</b></a></div>";
        print "</div>";

        if(isset($_POST['alta']) && !empty($_POST['alta'])) {


            $fechahora= date('ymdhms');



            $stmt = $conn->prepare('INSERT INTO mensajes (Fecha,Nombre,Email,Mensaje) VALUES (:fecha, :nom, :mail, :men)');
            $data = $stmt->execute(array(':fecha' => $fechahora, ':nom' => $_POST['a'], ':mail' => $_POST['b'], ':men' => $_POST['c']));


            if ($data == 1)  {
                print "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p>Mensaje enviado correctamente</p>";
                print "</div>";

            }
            else {
                print "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p>Se ha producido un error...</p>";
                print "</div>";
            }
            print"<div id='contador' align='center'>Redireccion automática en 5 segundos</div>";
        }
        ?>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
</body>
<!-- /.container-fluid -->
<!-- jQuery -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>

<!-- DataTables JavaScript -->
<script src="../bower_components/datatables/media/js/jquery.dataTables.js"></script>
<script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.js"></script>
<?php
$conn=null;
?>