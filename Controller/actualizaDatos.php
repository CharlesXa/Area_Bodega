<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Actualizando Datos</title>
        <link rel="stylesheet" href="../Materialize/css/styleBody.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"/>
    </head>
    <body style="background-image: url('../img/imgLogin.png')">
        <script>
            function update() {
                swal({
                    title: "Datos actualizados",
                    text: "Se han actualizado los datos correctamente",
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
                    text: "Campos incompletos o datos no actualizados",
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

echo $rut . " " . $nombre . " " . $apellido . " " . $email . " " . $telefono . " " . $area;

$data = new Data();

if($rut && $nombre && $apellido && email && $telefono && $area){
    $data->updUser($email, $telefono, $area, $rut);
    echo'<script>update();</script>';
}else{
    echo'<script>error();</script>';
}



?>