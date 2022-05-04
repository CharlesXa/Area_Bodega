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
        <link rel="icon" href="img/iconoBodega.png"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <title>Menu Bodega</title>
    </head>
    <body>
        <!-- navbar -->
        <nav>
            <div class="nav-wrapper" style='background-color: #353535'>
                <a href="#" class="brand-logo center">Bodega SGV</a>
                <a class="brand-logo" style="margin-left: 10px; font-size: 20px">Bienvenido: <?php echo $rut; ?></a>
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
            <li><a href="">Ingresar Stock</a></li>
            <li><a href="">Actualizar Stock</a></li>
        </ul>
        <ul id="dropdown1" class="dropdown-content">
            <li><a href="#!">Ingresar Equipaje</a></li>
            <li><a href="#!">Buscar Equipaje</a></li>
        </ul>
        <div class="container">
            <style>table, th {text-align: center !important}</style>
            <table class="table" id="datos" border="1">
                <thead>
                    <tr>
                        <th colspan="4" style="font-size: 25px">Historial de Solicitudes</th>
                    </tr>
                    <tr>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Fecha y Hora</th>
                        <th>ID de la solicitud</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td></td>   
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>                   
                </tbody>
            </table>
        </div>
        <footer class="page-footer" style="background-color: #353535">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">SGV</h5>
                        <p class="grey-text text-lighten-4"></p>
                    </div>
                    <div class="col l2 s12">
                        <h5 class="white-text">Links</h5>
                        <ul>
                            <li><a class="grey-text text-lighten-1" href="#!">Link 1</a></li>
                            <li><a class="grey-text text-lighten-1" href="#!">Link 2</a></li>
                            <li><a class="grey-text text-lighten-1" href="#!">Link 3</a></li>
                            <li><a class="grey-text text-lighten-1" href="#!">Link 4</a></li>
                        </ul>
                    </div>
                    <div class="col l2 s12">
                        <h5 class="white-text">Links</h5>
                        <ul>
                            <li><a class="grey-text text-lighten-1" href="#!">Link 1</a></li>
                            <li><a class="grey-text text-lighten-1" href="#!">Link 2</a></li>
                            <li><a class="grey-text text-lighten-1" href="#!">Link 3</a></li>
                            <li><a class="grey-text text-lighten-1" href="#!">Link 4</a></li>
                        </ul>
                    </div>
                    <div class="col l2 s12">
                        <h5 class="white-text">Links</h5>
                        <ul>
                            <li><a class="grey-text text-lighten-1" href="#!">Link 1</a></li>
                            <li><a class="grey-text text-lighten-1" href="#!">Link 2</a></li>
                            <li><a class="grey-text text-lighten-1" href="#!">Link 3</a></li>
                            <li><a class="grey-text text-lighten-1" href="#!">Link 4</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright" style="background-color: #252525">
                <div class="container center">
                    Aerolíneas SGV © Derechos Reservados - 2022
                </div>
            </div>
        </footer>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                M.AutoInit();
            });
        </script>
    </body>
</html>
