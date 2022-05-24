<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"/>
    </head>
    <body style="background-image: url('../img/fondo.png')">
        <script>
            function ingreso() {
                swal({
                    title: "Ingresado",
                    text: "Usuario ingresado correctamente",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../menuAdmin.php';
                        });
            }
            function error() {
                swal({
                    title: "Error",
                    text: "Campos incompletos o usuario no ingresado",
                    type: "error",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../menuAdmin.php';
                        });
            }

        </script>
    </body>
</html>
<?php
include_once '../Model_Data.php';
$rut = $_POST['rut'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$area = $_POST['area'];
$tipo = $_POST['tipo'];
$passwT = $_POST['passwT'];

echo $rut . " " . $nombre . " " . $apellido . " " . $email . " " . $telefono . " " . $area . " " . $tipo;

$data = new Data();

if ($rut && $nombre && $apellido && $email && $telefono && $area && $tipo && $passwT){
    $data->addUser($rut, $nombre, $apellido, $email, $telefono, $area, $tipo, $passwT);
    echo'<script>ingreso();</script>';
}else{
    echo'<script>error();</script>';
}

?>
