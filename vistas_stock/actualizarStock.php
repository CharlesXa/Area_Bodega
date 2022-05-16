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
        <title></title>
    </head>
    <body style="background-color: #E4E9F7">
        <section>
            <nav class="nav-extended" style="background-color: #1d1b31;">
                <div class="nav-wrapper">
                    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons" style="font-size: 30px">menu</i></a>
                    <a href="../menuBodega.php">
                        <img src="../img/iconoBodega.png">
                        <span class="brand-logo">Menu Bodega</span>
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
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Stock<i class="material-icons right white-text" style="font-size: 30px;">arrow_drop_down</i></a></li>
                <ul id='dropdown1' class='dropdown-content' style="background-color: #1d1b31;">
                    <li><a href="ingresarStock.php">Ingreso</a></li>
                    <li><a href="#">Actualizar</a></li>
                    <li><a href="visualizarStock.php">Visualizar</a></li>
                </ul>
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown2">Equipaje<i class="material-icons right white-text" style="font-size: 30px;">arrow_drop_down</i></a></li>
                <ul id='dropdown2' class='dropdown-content' style="background-color: #1d1b31;">
                    <li><a href="#">Ingreso</a></li>
                    <li><a href="#">Busqueda</a></li>
                    <li><a href="#">Distribucion</a></li>
                </ul>
                <li><div class="divider"></div></li>
                <li><a href="Controller/controllerLogOut.php" class="waves-effect">Cerrar sesión<i class='bx bx-log-out white-text' style="font-size: 22px;"></i></a></li>
            </ul>  
            <div class="container" >
                <div class="row">
                    <div class="col s12">
                        <h2 align="center">Actualizacion de Stock</h2>
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
                        </form>
                        <div class="rows">
                            <div class="col s12">
                                <table class="table">
                                    <thead>
                                    <td>#</td>
                                    <td>Nombre</td>
                                    <td>Cantidad</td>
                                    <td>Descripcion</td>
                                    <td>Actualizar</td>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $selected = 0;
                                        $n = 0;
                                        if (isset($_POST['btn_cargar'])) {
                                            $selected = $_POST['cbo_area'];
                                            if ($selected == 0) {
                                                $stock_area = $data->getStock();
                                            } else {
                                                $stock_area = $data->getStockByArea($selected);
                                            }
                                            foreach ($stock_area as $key) {
                                                echo '
                                                            '
                                                ?>
                                            <form method="post" id="form<?php echo $key['id']; ?>" action="../Controller/controller_actStock.php">
                                                <tr>

                                                    <td><input type="number" name="txt_id" value="<?php echo $key['id']; ?>" style="width: 30px" readonly></td>
                                                    <td><?php echo $key['nombre']; ?></td>
                                                    <td><input type="number" name="txt_cantidad" value="<?php echo $key['cantidad_t']; ?>" style="width: 70px"></td>
                                                    <td><?php echo $key['descripcion']; ?></td>
                                                    <td><button class="btn white-text indigo darken-3" name="btn_actualizar" type="submit" style="height: 50px; border-radius: 50px; font-weight: 600;">Actualizar</button></td>

                                                </tr>
                                            </form>
                                            <?php
                                            '';
                                        }
                                    }
                                    ?>
                                    </form>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
