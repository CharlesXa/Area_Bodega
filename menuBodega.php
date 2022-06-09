<?php
error_reporting(E_NOTICE ^ E_ALL);

include_once 'Model_Data.php';
session_start();
$rut = $_SESSION['rut'];
$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];
$passwd_t = $_SESSION['passwd_t'];
$correo = $_SESSION['email'];
$area_u = $_SESSION['area_usuario'];

if ($correo == null || "") {
    echo '<script language="javascript">alert("Acceso invalido");</script>';
    echo "<script> window.location.replace('index.php') </script>";
}


$data = new Data();
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this templateasd
-->

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="Materialize/css/materialize.css">
        <script src="Materialize/js/materialize.js"></script>
        <link rel="icon" href="img/iconoBodega.png"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <title>Menu Bodega</title>

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.semanticui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css"/>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.semanticui.min.css"/>

    </head>
    <body style="background-color: #f5f7fb; background-image: url(img/imgBodega.png); background-attachment: fixed; background-size: cover">
        <div id="modal1" class="modal">
            <form method="post" action="Controller/controller_obs.php">
                <div class="modal-content">
                    <h4 class="title_reporte">Reporte</h4>
                    <div class="row grey lighten-3 row_modal_1">
                        <div class="row">
                            <div class="col s12 m6 l6">
                                <div class="input-field">
                                    <input id="a" type="text" name="txt_rut" value="<?php echo $rut; ?>" readonly style="background-color: white; border-radius: 5px; border-bottom: none; text-indent: 18px;">
                                    <label for="a">R.U.T</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m6 l6">
                                <div class="input-field">
                                    <input id="c" type="text" name="txt_nombre" value="<?php echo $nombre; ?>" readonly style="background-color: white; border-radius: 5px; border-bottom: none; text-indent: 18px;">
                                    <label for="c">Nombre</label>
                                </div>
                            </div>
                            <div class="col s12 m6 l6">
                                <div class="input-field">
                                    <input id="b" type="text" name="txt_apellido" value="<?php echo $apellido; ?>" readonly style="background-color: white; border-radius: 5px; border-bottom: none; text-indent: 18px;">
                                    <label for="b">Apellido</label>
                                </div>                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m6 l4">
                                <div class="input-field" style="background-color: white; border-radius: 5px;">
                                    <select name="cbo_gravedad" required>
                                        <option value="0" disabled selected>--Gravedad--</option>
                                        <option value="1">Leve</option>
                                        <option value="2">Media</option>
                                        <option value="3">Grave</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m6 l3">                             
                                <div class="input-field" style="background-color: white; border-radius: 5px;">
                                    <input style="border-bottom: none; text-indent: 18px;" placeholder="" id="datepicker" name="txt_fecha" type="text" class="datepicker" required>
                                    <label for="datepicker">Fecha</label>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="input-field" style="background-color: white; border-radius: 5px;">
                                    <input style="border-bottom: none; text-indent: 18px;" placeholder="" id="timepicker" type="text" name="txt_hora" class="timepicker" required>
                                    <label for="timepicker" style="">Hora</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m12 l12">
                                <div class="input-field ">
                                    <!--<textarea id="textarea" class="materialize-textarea" name="area_obs" data-length="120" style="background-color: white; border-radius: 5px; border-bottom: none;; text-indent: 18px;" required></textarea>-->
                                    <input id="textarea" type="text" name="area_obs" style="background-color: white; border-radius: 5px; border-bottom: none; text-indent: 18px;" required>
                                    <label for="textarea" style="text-indent: 18px;">Observaciones</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="text-align: center">
                    <button class="waves-effect btn" name="btn_reporte" type="submit" style="background: #363771; width: 200px; border-radius: 3px; font-weight: 500; letter-spacing: 2px; font-size: 16px">Enviar</button>
                </div>
            </form>
        </div>
        <div id="modal_pass" class="modal" style="margin-top: 100px">
            <div class="modal-content">
                <form class="col s2" action="controller/controllerUpdatepass.php" method="post">
                    <div class="modal-content">
                        <h4 style="font-size: 50px">Cambiar contraseña</h4>
                        <p style="font: bold; font-size: 20px">Tu contraseña es temporal, reestablecela</p>
                        <div class="row">
                            <div class="row">
                                <div class="input-field col s6">
                                    <input name="txt_pass" id="pass" type="password" class="validate" required>
                                    <label for="txt_pass">Nueva contraseña</label>
                                </div>
                            </div>
                            <div class="row right">
                                <img style="width: 350px; height: 350px; margin-right: 100px; margin-top:-150px" src="img/iconPass.png"/>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <input name="txt_pass2" id="pass2" type="password" class="validate" required>
                                    <label for="txt_pass2">Confirmar nueva contraseña</label>
                                </div>
                            </div>
                            <div class="row">
                                <button class="btn waves-effect waves-light" type="submit" name="action" style="margin-left:170px; background-color: #1d1b31; width: 200px; height: 50px">Aceptar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <section>
            <nav class="nav-extended" style="background-color: #1d1b31;">
                <div class="nav-wrapper">
                    <a id="menu" href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons" style="font-size: 30px">menu</i></a>
                    <img src="img/iconoBodega.png">
                    <span class="brand-logo">Menu Bodega</span>
                </div>
            </nav>
            <ul id="slide-out" class="sidenav" style="background-color: #1d1b31;">
                <li><div class="user-view">
                        <div class="background" style="background-color: #1d1b31;">
                        </div>
                        <a href="#user"><img class="circle" src="img/iconPerfil.png"></a>
                        <a href="#name"><span class="white-text name" style="font-size: 20px"><?php echo $nombre . ' ' . $apellido ?></span></a>
                        <a href="#email"><span class="white-text email" style="font-size: 14px"><?php echo $correo ?></span></a>
                    </div></li>
                <li><div class="divider"></div></li>
                <li>
                    <a class="modal-trigger waves-effect" href="#modal1">Generar reporte<i class='bx bx-comment white-text' style="font-size: 22px;"></i>
                    </a>
                </li>
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header waves-effect"><i class='bx bx-box white-text' style="font-size: 27px;"></i>Stock<i class="material-icons right white-text" style="font-size: 30px;">arrow_drop_down</i></a>
                        <div class="collapsible-body" style="background-color: #1d1b31">
                            <ul>
                                <li><a href="vistas_stock/ingresarStock.php"><i class='bx bx-upload white-text' style="font-size: 22px;"></i>Ingreso</a></li>
                                <li><a href="vistas_stock/actualizarStock.php"><i class='bx bx-cloud-upload white-text' style="font-size: 22px;"></i>Actualizar</a></li>
                                <li><a href="vistas_stock/visualizarStock.php"><i class="uil uil-eye white-text" style="font-size: 22px;"></i>Visualizar</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header waves-effect"><i class='bx bx-briefcase-alt white-text' style="font-size: 27px;"></i>Equipaje<i class="material-icons right white-text" style="font-size: 30px;">arrow_drop_down</i></a>
                        <div class="collapsible-body" style="background-color: #1d1b31">
                            <ul>
                                <li><a href="vistas_equipaje/distribucionEquipaje.php"><i class='bx bxs-plane-alt white-text' style="font-size: 22px;"></i>Distribucion</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <li><div class="divider"></div></li>
                <li><a href="Controller/controllerLogOut.php" class="waves-effect">Cerrar sesión<i class='bx bx-log-out white-text' style="font-size: 27px;"></i></a></li>
            </ul>
            <div class="container_menu_seg">
                <div class="row">
                    <div class="col s12 m8 l8">
                        <div class="card" style="margin: 40px auto; max-width: 1680px; width: 100%; border-radius: 10px;">
                            <div class="card-content" style="margin: 40px 100px; padding: 5% 0">
                                <span class="table_Tit center" style="display: block; margin-bottom: 7%; margin-top: 1%">Registro de solicitudes</span>
                                <table class="table centered" id="datos">
                                    <thead>
                                        <!--<tr>
                                            <th colspan="4" text-align: center" class="table_Tit">Historial de Solicitudes</th>
                                        </tr>-->
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Cantidad</th>
                                            <th>Fecha y Hora</th>
                                            <th>ID de la solicitud</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $historial = $data->getHistorial();
                                        foreach ($historial as $key) {
                                            echo '
                                    <tr> 
                                        <td>' . $key['articulo'] . '</td>   
                                        <td>' . $key['cantidad'] . '</td>   
                                        <td>' . $key['fecha y hora de solicitud'] . '</td>   
                                        <td>' . $key['id de la solicitud'] . '</td>   
                                    </tr>
                                ';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m4 l4">
                        <div class="card" style="margin: 40px auto; max-width: 1680px; width: 100%; border-radius: 10px;">
                            <div class="card-content" style="margin: 4% 0; padding: 5% 0">
                                <span class="table_Tit center" style="display: block; margin: 6% 0">Historial de Reportes</span>
                                <table class="table centered container" id="datos">
                                    <thead>

                                        <tr>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Gravedad</th>
                                            <th>Fecha</th>
                                            <th>Hora</th>
                                            <th>Observacion</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $reportes = $data->getObsByArea($area_u);
                                        foreach ($reportes as $key) {
                                            echo '
                                    <tr>
                                        <td>' . $key['nombre'] . '</td>
                                        <td>' . $key['apellido'] . '</td>
                                        <td>' . $key['gravedad'] . '</td> 
                                        <td>' . $key['fecha'] . '</td>
                                        <td>' . $key['hora'] . '</td>
                                        <td>' . $key['observacion'] . '</td>
                                    </tr>
                                ';
                                        }
                                        ?>
                                    </tbody>
                                </table>
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
                $('#datos').DataTable({
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
            var temporal = "<?php echo $passwd_t ?>";

            if (temporal == 1) {
                showModal();
                console.log(temporal);
            } else {
                CloseModal();
            }
            function showModal() {
                document.getElementById('modal_pass').style.display = 'block';
                document.getElementById('menu').style.visibility = "hidden";
            }

            function CloseModal() {
                document.getElementById('modal_pass').style.display = 'none';
                document.getElementById('menu').style.visibility = "visible";

            }
        </script>
        <script src="js/script.js"></script>
        <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
        <!-- <script src="SweetAlerts/AlertLogBodega.js"></script>-->
    </body>
</html>
