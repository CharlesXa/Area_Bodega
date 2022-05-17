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
            function UpdateCorrect() {
                swal({
                    title: "Contraseña reestablecida!",
                    text: "debes iniciar sesion nuevamente",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../index.php';
                        });
            }
            function errorpass() {
                swal({
                    title: "ERROR",
                    text: "las contraseñas no coinciden",
                    type: "error",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../menuBodega.php';
                        });
            }

            function Errorinput() {
                swal({
                    title: "ERROR",
                    text: "rellene los campos por favor",
                    type: "error",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../menuBodega.php';
                        });
            }


        </script>
    </body>
</html>


<?php
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

include_once '../Model_Data.php';
session_start();

$rut = $_SESSION['rut'];
$pass = isset($_POST["txt_pass"]) ? $_POST["txt_pass"] : null;
$pass2 = isset($_POST["txt_pass2"]) ? $_POST["txt_pass2"] : null;

$data = new Data();

if ($pass && $pass2) {
    if ($pass == $pass2) {
        $data->updatePass($rut, $pass, 0);
        session_start();
        session_unset();
        session_destroy();
        echo '<script>UpdateCorrect();</script>';
    } else {
        echo '<script>errorpass();</script>';
    }
} else {
    echo '<script>Errorinput();</script>';
}
