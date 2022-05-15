<?php
error_reporting(E_NOTICE ^ E_ALL);

include_once 'Model_Data.php';
session_start();
$rut = $_SESSION['rut'];
$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];
$passwd_t = $_SESSION['passwd_t'];

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
        <link rel="stylesheet" href="Materialize/css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


        <title>Menu Bodega</title>

    </head>
    <body style="background-color: #E4E9F7" >
        <div id="modal1" class="modal">
            <div class="modal-content">
                <h4>Modal Header</h4>
                <p>A bunch of text</p>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
            </div>
        </div>

        <div class="sidebar active">
            <div class="logo-details">
                <a href="menuBodega.php" style="padding:15px; padding-top: 25px">
                    <img src="img/iconoBodega.png" width="50px" height="50px"/>
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
                        <li><a href="vistas_stock/ingresarStock.php">Ingreso</a></li>
                        <li><a href="vistas_stock/actualizarStock.php">Actualizar</a></li>
                        <li><a href="vistas_stock/visualizarStock.php">Visualizar</a></li>
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
                            <img src="img/iconPerfil.png" alt="profileImg">
                        </div>
                        <div class="name-job">
                            <div class="profile_name">Bienvenido:</div>
                            <div class="job"><?php echo $nombre . ' ' . $apellido ?></div>
                        </div>
                        <a href="Controller/controllerLogOut.php"><i class='bx bx-log-out'></i></a>
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
                <div>
                    <!-- Modal Structure -->
                    <div id="modal_1" class="modal" style="position: absolute; margin-top: 150px">
                        <form class="col s12" action="controller/controllerUpdatepass.php" method="post">
                            <div class="modal-content">
                                <h4>Cambiar contraseña</h4>
                                <p>Tu contraseña es temporal, reestablecela</p>
                                <div class="row">

                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input name="txt_pass" id="pass" type="password" class="validate" required>
                                            <label for="pass">Nueva contraseña</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input name="txt_pass2" id="pass2" type="password" class="validate" required>
                                            <label for="pass">Confirmar nueva contraseña</label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn waves-effect waves-light" type="submit" name="action">Aceptar
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <table class="table centered" id="datos" border="1">
            <thead align="center">
                <tr>
                    <th colspan="4" style="font-size: 25px; text-align: center">Historial de Solicitudes</th>
                </tr>
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
                                        <td>' . $key['id'] . '</td>   
                                        <td>' . $key['nombre'] . '</td>   
                                        <td>' . $key['cantidad'] . '</td>   
                                        <td>' . $key['fecha_hora'] . '</td>   
                                        <td>' . $key['solicitud_id_fk'] . '</td>   
                                    </tr>
                                ';
                }
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <footer class="page-footer" style="background-color: transparent">
            <div class="footer-copyright" style="background-color: #1d1b31">
                <div class="container center">
                    SGV © Derechos Reservados - 2022
                </div>
            </div>
        </footer>
    </section>
    <script>
        /*document.addEventListener('DOMContentLoaded', function () {
         M.AutoInit();
         }); */
        var temporal = "<?php echo $passwd_t ?>";

        if (temporal == 1) {
            showModal();
            console.log(temporal);
        } else {
            CloseModal();
        }
        function showModal() {
            document.getElementById('modal_1').style.display = 'block';
        }

        function CloseModal() {
            document.getElementById('modal_1').style.display = 'none';
        }
    </script>
    <script src="js/script.js"></script>
    <~<!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <!<!-- <script src="SweetAlerts/AlertLogBodega.js"></script>-->
</body>
</html>
