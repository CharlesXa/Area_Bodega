<?php
error_reporting(E_NOTICE ^ E_ALL);

include_once 'Model_Data.php';
session_start();
$rut = $_SESSION['rut'];
$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];
$passwd_t = $_SESSION['passwd_t'];
$correo = $_SESSION['email'];
$area = $_SESSION['area_usuario'];

$data = new Data();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta charset="UTF-8">
        <title>Menu General - Historial</title>
        <link rel="icon" href="img/iconGeneral.png"/>
        <link rel="stylesheet" href="Materialize/css/materialize.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="Materialize/js/materialize.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body style="background-color: #E4E9F7" >
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
                                    <label for="pass">Nueva contraseña</label>
                                </div>
                            </div>
                            <div class="row right">
                                <img style="width: 350px; height: 350px; margin-right: 100px; margin-top:-150px" src="img/iconPass.png"/>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <input name="txt_pass2" id="pass2" type="password" class="validate" required>
                                    <label for="pass">Confirmar nueva contraseña</label>
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
                    <img src="img/iconGeneral.png">
                    <span class="brand-logo">Menu General</span>
                </div>
            </nav>
            <ul id="slide-out" class="sidenav" style="background-color: #1d1b31;">
                <li><div class="user-view">
                        <div class="background" style="background-color: #1d1b31;">
                        </div>
                        <a href="menuGeneral.php"><img class="circle" src="img/iconPerfil.png"></a>
                        <a href="#name"><span class="white-text name" style="font-size: 20px"><?php echo $nombre . ' ' . $apellido ?></span></a>
                        <a href="#email"><span class="white-text email" style="font-size: 14px"><?php echo $correo ?></span></a>
                    </div></li>
                <li><div class="divider"></div></li>
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Solicitudes<i class="material-icons right white-text" style="font-size: 30px;">arrow_drop_down</i></a></li>
                <ul id='dropdown1' class='dropdown-content' style="background-color: #1d1b31;">
                    <li><a href="vistas_stock/ingresarStock.php">Ingresar</a></li>
                    <li><a href="vistas_stock/actualizarStock.php">Historial</a></li>
                </ul>
                <li><div class="divider"></div></li>
                <li><a href="Controller/controllerLogOut.php" class="waves-effect">Cerrar sesión<i class='bx bx-log-out white-text' style="font-size: 22px;"></i></a></li>
            </ul>
            <span class="table_Tit center" style="display: block; margin: 40px 0">Historial de solicitudes</span>
            <table class="table centered responsive-table container" id="datos" border="1">
                <thead align="center">
                    <tr>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Fecha-Hora</th>
                        <th>Descripcion</th>
                        <th>Estado</th>
                        <th>Area</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $historial = $data->getHistorialByArea($area);
                    if($historial){
                       foreach ($historial as $key) {
                        $estado = '';
                            switch ($key['estado']) {
                                case 1:
                                    $estado = 'Completado';
                                    break;
                                case 0:
                                    $estado = 'Pendiente';
                                default:
                                    break;
                            }

                            echo '
                                    <tr> 
                                        <td>' . $key['nombre'] . '</td>
                                        <td>' . $key['cantidad'] . '</td>
                                        <td>' . $key['fecha-hora'] . '</td>
                                        <td>' . $key['descripcion'] . '</td>
                                        <td>' . $estado . '</td>
                                        <td>' . $key['area'] . '</td> 

                                    </tr>
                                ';
                        }
                    }elseif (!$historial){
                        echo '
                                    <tr> 
                                        <td>No existe ningun registro para esta area aun</td>
                                    </tr>
                                ';
                    } 
                    ?>
                </tbody>
            </table>
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
