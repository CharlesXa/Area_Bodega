<?php
include_once 'Model_Data.php';

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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="Materialize/css/materialize.css">
        <script src="Materialize/js/materialize.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <title></title>
    </head>
    <body>
        <nav>
            <div class="nav-wrapper" style='background-color: #353535'>
                <a href="menuBodega.php" class="brand-logo center">Bodega SGV</a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="Controller/controllerLogOut.php">Cerrar Sesion</a></li>
                    <li><a href="badges.html">Buscar Equipaje</a></li>
                    <!-- Dropdown Trigger -->
                    <li><a class="dropdown-trigger" href="#" data-target="dropdown">&hairsp;Stock<i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
            </div>
        </nav>
        <ul id="dropdown" class="dropdown-content">
            <li><a href="ingresarStock.php">Ingresar Stock</a></li>
            <li><a href="#!">Actualizar Stock</a></li>
        </ul>
        <br>
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <form method="post" action="ControllerStock.php">
                        <div class="row">
                            <div class="col s12 m6">
                                <div class="row">
                                    <div class="col s12 title_input">Nombre:
                                        <input id="nombre" name="txt_nombre" type="text" class="validate" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 title_input">Area:
                                        <div class="input-field col s12">
                                            <select name="cbo_area" id="salud" required>
                                                <option value="">-- Seleccionar --</option>
                                                <?php
                                                $prevision = $data->getArea();

                                                foreach ($prevision as $key) {
                                                    echo '<option value="' . $key['id'] . '">' . $key['nombre'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6">
                                <div class="row">
                                    <div class="col s12 title_input">Cantidad:
                                        <input id="cantidad" name="txt_cantidad" type="number" class="validate" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 title_input">Descripcion:
                                        <textarea id="textarea2" class="materialize-textarea" data-length="120"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s6 offset-s3">
                                <button class="btn white-text indigo darken-3 col s12 m4 offset-m4" name="btn_Agregar"  type="submit" style=" height: 50px; margin-top: 40px; border-radius: 50px; font-weight: 600;">Agregar Stock</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                M.AutoInit();
            });
            $(document).ready(function () {
                $('textarea#textarea2').characterCounter();
            });
        </script>
    </body>
</html>
