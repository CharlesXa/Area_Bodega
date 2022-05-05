<?php
include_once '../Model_Data.php';
session_start();
$rut = $_SESSION['rut'];
$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];
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
        <link rel="stylesheet" href="../Materialize/css/style.css">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <title></title>
    </head>
    <body style="background-color: #E4E9F7">
        <div class="sidebar active">
            <div class="logo-details">
                <a href="../menuBodega.php" style="padding:15px; padding-top: 25px">
                    <img src="../img/iconoBodega.png" width="50px" height="50px"/>
                </a>
                <span class="logo_name">Bodega S.G.V</span>
            </div>
            <ul class="nav-links">
                <li>
                    <a href="#">
                        <span class="link_name"></span>
                    </a>
                </li>
                <li>
                    <div class="iocn-link">
                        <a href="#">
                            <i class='bx bx-collection' ></i>
                            <span class="link_name">Stock</span>
                        </a>
                        <i class='bx bxs-chevron-down arrow' ></i>
                    </div>
                    <ul class="sub-menu">
                        <li><a class="link_name" href="#">Stock</a></li>
                        <li><a href="ingresarStock.php">Ingreso</a></li>
                        <li><a href="actualizarStock.php">Actualizar</a></li>
                        <li><a href="visualizarStock.php">Visualizar</a></li>
                    </ul>
                </li>
                <li>
                    <div class="iocn-link">
                        <a href="#">
                            <i class='bx bx-book-alt' ></i>
                            <span class="link_name">Equipaje</span>
                        </a>
                        <i class='bx bxs-chevron-down arrow' ></i>
                    </div>
                    <ul class="sub-menu">
                        <li><a class="link_name" href="#">Equipaje</a></li>
                        <li><a href="#">Ingreso</a></li>
                        <li><a href="#">Busqueda</a></li>
                        <li><a href="#">Distribucion</a></li>
                    </ul>
                </li>
                <li>
                    <div class="profile-details">
                        <div class="profile-content">
                            <img src="../img/iconPerfil.png" alt="profileImg">
                        </div>
                        <div class="name-job">
                            <div class="profile_name">Bienvenido:</div>
                            <div class="job"><?php echo $nombre . ' ' . $apellido ?></div>
                        </div>
                        <a href="../Controller/controllerLogOut.php"><i class='bx bx-log-out'></i></a>
                    </div>
                </li>
            </ul>
        </div>
        <section class="home-section">
            <div class="home-content">
                <div class="navbar-fixed">
                    <nav  style="background-color: #1d1b31;">
                        <div class="nav-wrapper">
                            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="bx bx-menu white-text" ></i></a>
                        </div>
                    </nav>
                </div>
            </div> 
            <div class="container" >
                <div class="row">
                    <div class="col s12">
                        <h2 align="center">Visualizacion de Stock Aeropuerto</h2>
                        <form method="post">
                            <div class="row">
                                <div class="col s12 m6">
                                    <div class="row">
                                        <div class="col s12 title_input">Area:
                                            <div class="input-field col s12">
                                                <select name="cbo_area" id="area" required>
                                                    <option value="0">-- Seleccionar --</option>
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
                                <div class="col s12 m6">
                                    <div class="row">
                                        <div class="col s12 title_input">
                                            <button class="btn white-text indigo darken-3 col s12 m4 offset-m4" name="btn_cargar" type="submit" style=" height: 50px; margin-top: 40px; border-radius: 50px; font-weight: 600;">Cargar Stock</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="rows">
                                <div class="col s12">
                                    <table class="table centered">
                                        <thead >
                                        <td>#</td>
                                        <td>Nombre</td>
                                        <td>Cantidad</td>
                                        <td>Descripcion</td>
                                        <td>Actualizar</td>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $selected = 0;
                                            $stock_area = 0;
                                            if (isset($_POST['btn_cargar'])) {
                                                $selected = $_POST['cbo_area'];
                                                if ($selected == 0) {
                                                    $stock_area = $data->getStock();
                                                } else {
                                                    $stock_area = $data->getStockByArea($selected);
                                                }
                                                foreach ($stock_area as $key) {
                                                    echo '
                                                                    <tr>
                                                                        <td>' . $key['id'] . '</td>
                                                                        <td>' . $key['nombre'] . '</td>
                                                                        <td>' . $key['cantidad_t'] . '</td>
                                                                        <td>' . $key['descripcion'] . '</td>
                                                                        <td></td>
                                                                    </tr>
                                                                ';
                                                }
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </section>
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
