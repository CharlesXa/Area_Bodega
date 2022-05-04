<?php
error_reporting(E_NOTICE ^ E_ALL);

include_once 'Model_Data.php';
session_start();
$rut = $_SESSION['Rut'];

if ($rut == null || "") {
    echo '<script language="javascript">alert("Acceso invalido");</script>';
    echo "<script> window.location.replace('index.php') </script>";
}

$data = new Data();
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="Materialize/css/materialize.css">
        <script src="Materialize/js/materialize.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <title>Menu Bodega</title>
    </head>
    <body>
        <!-- navbar -->
        <nav>
            <div class="nav-wrapper" style='background-color: #353535'>
                <a href="#" class="brand-logo center">Bodega SGV</a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="Controller/controllerLogOut.php">Cerrar Sesion</a></li>
                    <!-- Dropdown Trigger -->
                    <li><a class="dropdown-trigger" href="#" data-target="dropdown">Stock<i class="material-icons right">arrow_drop_down</i></a></li>
                    <li><a class="dropdown-trigger" href="#" data-target="dropdown1">Equipaje<i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
            </div>
        </nav>
        <!-- Dropdown Structure -->
        <ul id="dropdown" class="dropdown-content">
            <li><a href="#!">Ingresar Stock</a></li>
            <li><a href="#!">Actualizar Stock</a></li>
        </ul>
        <ul id="dropdown1" class="dropdown-content">
            <li><a href="#!">Ingresar Equipaje</a></li>
            <li><a href="#!">Buscar Equipaje</a></li>
        </ul>
        <div class="container-fluid">
            <div class="row">
                <div class="col s12">
                    <iframe src="https://www.santotomas.cl/" name="subhtml" width="1330" height="520" scrolling="auto" frameborder="1" style="overflow: hidden; align-content: center"></iframe>
                </div>

            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    M.AutoInit();
                });
            </script>       
    </body>
</html>
