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
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="icon" href="../img/iconoBodega.png"/>
        <title>Actualizar Stock - Menu Bodega</title>

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.semanticui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css"/>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.semanticui.min.css"/>

    </head>
    <body style="background-color: #f5f7fb">
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
                <li><a href="../menuBodega.php" class="waves-effect" style="margin-left: -3px">Inicio<i class='bx bx-home white-text' style="font-size: 27px;"></i></a></li>
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header waves-effect"><i class='bx bx-box white-text' style="font-size: 27px;"></i>Stock<i class="material-icons right white-text" style="font-size: 30px;">arrow_drop_down</i></a>
                        <div class="collapsible-body" style="background-color: #1d1b31">
                            <ul>
                                <li><a href="ingresarStock.php"><i class='bx bx-upload white-text' style="font-size: 22px;"></i>Ingreso</a></li>
                                <li><a href="visualizarStock.php"><i class="uil uil-eye white-text" style="font-size: 22px;"></i>Visualizar</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header waves-effect"><i class='bx bx-briefcase-alt white-text' style="font-size: 27px;"></i>Equipaje<i class="material-icons right white-text" style="font-size: 30px;">arrow_drop_down</i></a>
                        <div class="collapsible-body" style="background-color: #1d1b31">
                            <ul>
                                <li><a href="../vistas_equipaje/distribucionEquipaje.php"><i class='bx bxs-plane-alt white-text' style="font-size: 22px;"></i>Distribucion</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <li><div class="divider"></div></li>
                <li><a href="../Controller/controllerLogOut.php" class="waves-effect">Cerrar sesión<i class='bx bx-log-out white-text' style="font-size: 27px;"></i></a></li>
            </ul>  
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <div class="row">
                            <div class="col s12">
                                <div class="card" style="margin: 40px auto; max-width: 1680px; width: 100%; border-radius: 10px;">
                                    <div class="card-content" style="margin: 40px 100px; padding: 40px 0">
                                        <h2 align="center" class="table_Tit" style="display: block; margin-bottom: 4%; margin-top: 1%">Actualizacion de Stock</h2>
                                        <table class="table centered responsive-table" id="act_stock">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nombre</th>
                                                    <th>Cantidad</th>
                                                    <th>Descripcion</th>
                                                    <th>Actualizar</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $stock_area = $data->getAllStock();
                                                foreach ($stock_area as $key) {
                                                    echo '
                                                            '
                                                    ?>
                                                <form method="post" id="form<?php echo $key['id']; ?>" action="../Controller/controller_actStock.php">
                                                    <tr>
                                                        <td><input type="number" name="txt_id" value="<?php echo $key['id']; ?>" style="width: 30px; border-bottom: none" readonly></td>
                                                        <td><?php echo $key['nombre']; ?></td>
                                                        <td><input type="number" name="txt_cantidad" value="<?php echo $key['cantidad_t']; ?>" style="width: 70px; border: 1px solid grey; border-radius: 5px; text-indent: 10px"></td>
                                                        <td><?php echo $key['descripcion']; ?></td>
                                                        <td><button class="btn white-text indigo darken-3" name="btn_actualizar" type="submit" style="height: auto; width: 130px; border-radius: 6px; font-weight: 500;">Actualizar</button></td>
                                                    </tr>
                                                </form>
                                                <?php
                                                '';
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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
            $(document).ready(function () {
                $('#act_stock').DataTable({
                    responsive: true,
                    autoWidth: false,
                    "language": {
                        "lengthMenu": "Mostrar " + '<select><option value="5">5</option><option value="10">10</option><option value="15">15</option><option value="20">20</option></select>' + " registros por página",
                        "zeroRecords": "No se han encontrado registros",
                        "info": "Mostrando la página _PAGE_ de _PAGES_",
                        "infoEmpty": "No hay registros disponibles",
                        "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                        "search": "Buscar:",
                        "paginate": {
                            'next': 'Siguiente',
                            'previous': 'Anterior',
                        },
                    }
                });

            });
        </script>
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
