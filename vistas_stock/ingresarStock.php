<?php
include_once '../Model_Data.php';
session_start();
$rut = $_SESSION['rut'];
$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];
$correo = $_SESSION['email'];
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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../Materialize/css/materialize.css">
        <script src="../Materialize/js/materialize.js"></script>
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="icon" href="../img/iconoBodega.png"/>
        <title>Ingreso de Stock - Menu Bodega</title>
    </head>
    <body style="background-color: #f5f7fb">
        <section>
            <nav class="nav-extended" style="background-color: #1d1b31;">
                <div class="nav-wrapper">
                    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons" style="font-size: 30px">menu</i></a>
                    <a href="../menuBodega.php">
                        <img src="../img/iconoBodega.png">
                        <span class="brand-logo">Menu Bodegas</span>
                    </a>
                </div>
            </nav>
            <ul id="slide-out" class="sidenav" style="background-color: #1d1b31;">
                <li><div class="user-view">
                        <div class="background" style="background-color: #1d1b31;">
                        </div>
                        <a href="#user"><img class="circle" src="../img/iconPerfil.png"></a>
                        <a href="#name"><span class="white-text name" style="font-size: 20px"><?php echo $nombre . ' ' . $apellido ?></span></a>
                        <a href="#email"><span class="white-text email" style="font-size: 14px"><?php echo $correo ?></span></a>
                    </div></li>
                <li><div class="divider"></div></li>
                <li><a href="../menuBodega.php">Inicio</a></li>
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Stock<i class="material-icons right white-text" style="font-size: 30px;">arrow_drop_down</i></a></li>
                <ul id='dropdown1' class='dropdown-content' style="background-color: #1d1b31;">
                    <li><a href="#">Ingreso</a></li>
                    <li><a href="actualizarStock.php">Actualizar</a></li>
                    <li><a href="visualizarStock.php">Visualizar</a></li>
                </ul>
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown2">Equipaje<i class="material-icons right white-text" style="font-size: 30px;">arrow_drop_down</i></a></li>
                <ul id='dropdown2' class='dropdown-content' style="background-color: #1d1b31;">
                    <!--<li><a href="../vistas_equipaje/ingresarEquipaje.php">Ingreso</a></li>-->
                    <li><a href="../vistas_equipaje/busquedaEquipaje.php">Busqueda</a></li>
                    <li><a href="../vistas_Equipaje/distribucionEquipaje.php">Distribucion</a></li>
                </ul>
                <li><div class="divider"></div></li>
                <li><a href="../Controller/controllerLogOut.php" class="waves-effect">Cerrar sesión<i class='bx bx-log-out white-text' style="font-size: 22px;"></i></a></li>
            </ul>
            <div class="container" >
                <div class="row">
                    <div class="col s12">
                        <div class="card" style="margin: 40px auto; max-width: 1680px; width: 100%; border-radius: 10px;">
                            <div class="card-content" style="margin: 0 100px; padding: 40px 0">
                                <h2 align="center" class="tit_admin">Ingreso de Stock</h2>
                                <form method="post" action="../Controller/controller_ingStock.php">
                                    <div class="row">
                                        <div class="col s12 m6">
                                            <div class="row">
                                                <div class="col s12 title_input">Nombre:
                                                    <input id="nombre"  name="txt_nombre" type="text" style="border: 1px solid grey; border-radius: 6px; text-indent: 10px" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col s12 m6">
                                            <div class="row">
                                                <div class="col s12 title_input">Cantidad:
                                                    <input id="cantidad" name="txt_cantidad" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" type="number" style="border: 1px solid grey; border-radius: 6px; text-indent: 10px" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col s12 m6">
                                            <div class="row">
                                                <div class="col s12 title_input">Area:
                                                    <div class="input-field col s12" style="border: 1px solid grey; border-radius: 6px; text-indent: 10px">
                                                        <select name="cbo_area" id="salud" required>
                                                            <option value="">-- Seleccionar --</option>
                                                            <?php
                                                            $area = $data->getArea();

                                                            foreach ($area as $key) {
                                                                echo '<option value="' . $key['id'] . '">' . $key['nombre'] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col s12 m12">
                                            <div class="row">
                                                <div class="col s12 m12 l12 title_input">Descripción:
                                                    <input id="textarea2"  name="txt_descrip" type="text" style="border: 1px solid grey; border-radius: 6px; text-indent: 10px" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s6 offset-s3">
                                            <button class="btn white-text waves-effect waves-light indigo darken-3 col s12 m4 offset-m4" name="btn_ingresar" type="submit" style=" height: 50px; margin-top: 40px; border-radius: 6px; font-weight: 600;">Ingresar Stock</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="page-footer" style="background-color: transparent">
            <div class="footer-copyright" style="background-color: #1d1b31">
                <div class="container center">
                    SGV © Derechos Reservados - 2022
                </div>
            </div>
        </footer>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                M.AutoInit();
            });
            $(document).ready(function () {
                $('textarea#textarea2').characterCounter();
            });
        </script>
        <script src="../js/script.js"></script>
    </body>
</html>
