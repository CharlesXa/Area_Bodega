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
            function SesionBodega() {
                swal({
                    title: "Bienvenido",
                    text: "Encargado de Bodega",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../menuBodega.php';
                        });
            }
            function SesionSeguridad() {
                swal({
                    title: "Bienvenido",
                    text: "Encargado de Seguridad",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../menuSeguridad.php';
                        });
            }
            
            function SesionRRHH() {
                swal({
                    title: "Bienvenido",
                    text: "Encargado de RRHH",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../menuGeneral.php';
                        });
            }
            function SesionZ_Espera() {
                swal({
                    title: "Bienvenido",
                    text: "Encargado de Zona de espera",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../menuGeneral.php';
                        });
            }
            
            
            function SesionG_Vuelos() {
                swal({
                    title: "Bienvenido",
                    text: "Encargado de Gestion de vuelos",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../menuGeneral.php';
                        });
            }
            
            function SesionAdmin() {
                swal({
                    title: "Bienvenido",
                    text: "Administrador",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../menuAdmin.php';
                        });
            }
            function ErrorLog() {
                swal({
                    title: "ERROR",
                    text: "El correo y/o contraseña no existe",
                    type: "error",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../index.php';
                        });
            }


        </script>
    </body>
</html>
<?php
//error_reporting(0);
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
include_once '../Model_Data.php';

session_start();

/** @var type $_POST */
$correo = isset($_POST["txt_correo"]) ? $_POST["txt_correo"] : null;
$pass = isset($_POST["txt_pass"]) ? $_POST["txt_pass"] : null;

$data = new Data();

if ($correo && $pass) {

    $valid = $data->isUserPassValid($correo, $pass);
    if ($valid) {
        $rs = $data->getUserbyRut($correo);
        foreach ($rs as $key) {
            $_SESSION['id'] = $key['id'];
            $_SESSION['rut'] = $key['rut'];
            $_SESSION['nombre'] = $key['nombre'];
            $_SESSION['apellido'] = $key['apellido'];
            $_SESSION['email'] = $key['email'];
            $_SESSION['telefono'] = $key['telefono'];
            $_SESSION['area_usuario'] = $key['area_usuario_id_fk'];
            $_SESSION['tipo_usuario'] = $key['tipo_user_id_fk'];
            $_SESSION['passwd_t'] = $key['passwd_t'];
        }


        switch ($_SESSION['tipo_usuario']) {
            case 1:
                echo '<script>SesionAdmin();</script>';
                break;
            case 2:
                switch ($_SESSION['area_usuario']) {
                    case 1:
                        echo '<script>SesionBodega();</script>';
                        break;
                    case 2:
                        echo '<script>SesionSeguridad();</script>';
                        break;
                    
                    case 3:
                        echo '<script>SesionRRHH();</script>';
                        break;
                    case 4:
                        echo '<script>SesionZ_Espera();</script>';
                        break;
                    case 5:
                        echo '<script>SesionG_Vuelos();</script>';
                        break;
                    default:
                        header("location: ../index.php");
                }
        }
    } else if (!$valid) {
        echo '<script>ErrorLog();</script>';
    }
} else {
    header("location: ../index.php");
}
?>


