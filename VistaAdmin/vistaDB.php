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
        <link rel="icon" href="../img/iconAdmin.png"/>
        <link rel="stylesheet" href="../Materialize/css/style.css">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <title>Visualizar Tablas</title>
    </head>
    <body style="background-color: #E4E9F7">
        <div class="sidebar active">
            <div class="logo-details">
                <a href="../menuAdmin.php" style="padding:15px; padding-top: 25px">
                    <img src="../img/iconAdmin.png" width="50px" height="50px"/>
                </a>
                <span class="logo_name">Admin S.G.V</span>
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
                            <span class="link_name">Database</span>
                        </a>
                        <i class='bx bxs-chevron-down arrow' ></i>
                    </div>
                    <ul class="sub-menu">
                        <li><a class="link_name" href="#">Stock</a></li>
                        <li><a href="../backup.php">Respaldo</a></li>
                        <li><a href="VistaAdmin/vistaDB.php">Visualizar tablas</a></li>
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
                        <h2 align="center">Visualizacion de tablas de base de datos</h2>
                        <div class="row">
                            <div class="col s12">
                                <table class="table centered">
                                    <thead style="font-size: 26px; text-align: center">
                                        <tr>
                                            <td>Nombre</td>
                                            <td>Cantidad de Registros</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $table = $data->getAllTables();
                                        $contador = 1;
                                        foreach ($table as $key) {
                                            echo
                                            ''
                                            ?>
                                        <form method="post" id="form<?php echo $contador; ?>">
                                            <tr>
                                                <td><?php echo $key['table_name']; ?></td>
                                                <td><?php echo $key['table_rows']; ?></td>
                                                <td><button data-target="<?php echo $key['table_name']; ?>" style="background-color:#1d1b31" class="btn modal-trigger">Visualizar</button></td>

                                            </tr>
                                        </form>
                                        <?php
                                        '';
                                        $contador = $contador + 1;
                                    }
                                    ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modals BD -->
            <div>
                <div id="area_usuario" class="modal modal-fixed-footer">
                    <div class="modal-content">
                        <table class="table responsive-table centered" id="datos" border="1">
                            <thead align="center">
                                <tr>
                                    <th colspan="4" style="font-size: 40px; text-align: center">Areas</th>
                                </tr>
                                <tr>
                                    <th>Nombre</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $area = $data->getAllAreas();
                                foreach ($area as $key) {
                                    echo ' 
                                <tr>
                                    <td>' . $key['nombre'] . '</td>
                                </tr>
                             ';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat" style="margin-left: 1100px">Aceptar</a>
                    </div>
                </div>
                <div id="avion" class="modal modal-fixed-footer">
                    <div class="modal-content">
                        <table class="table responsive-table centered" id="datos" border="1">
                            <thead align="center">
                                <tr>
                                    <th colspan="4" style="font-size: 40px; text-align: center">Aviones</th>
                                </tr>
                                <tr>
                                    <th>Patente</th>
                                    <th>Nombre</th>
                                    <th>Capacidad de pasajeros</th>
                                    <th>Volumen</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $avion = $data->getAvion();
                                foreach ($avion as $key) {
                                    echo ' 
                                <tr>
                                    <td>' . $key['patente'] . '</td>
                                    <td>' . $key['nombre'] . '</td>
                                    <td>' . $key['capacidad'] . '</td>
                                    <td>' . $key['volumen'] . '</td>
                                </tr>
                             ';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat" style="margin-left: 1100px">Aceptar</a>
                    </div>
                </div>
                <div id="boleto" class="modal modal-fixed-footer">
                    <div class="modal-content">
                        <table class="table responsive-table centered" id="datos" border="1">
                            <thead align="center">
                                <tr>
                                    <th colspan="4" style="font-size: 40px; text-align: center">Boletos</th>
                                </tr>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Nombre Cliente</th>
                                    <th>Apellido Cliente</th>
                                    <th>Codigo de vuelo</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $boleto = $data->getBoleto();
                                foreach ($boleto as $key) {
                                    echo ' 
                                <tr>
                                    <td>' . $key['codigo'] . '</td>
                                    <td>' . $key['Nombre cliente'] . '</td>
                                    <td>' . $key['Apellido cliente'] . '</td>
                                    <td>' . $key['Codigo de vuelo'] . '</td>
                                </tr>
                             ';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat" style="margin-left: 1100px">Aceptar</a>
                    </div>
                </div>
                <div id="tipo_clasificacion" class="modal modal-fixed-footer">
                    <div class="modal-content">
                        <table class="table responsive-table centered" id="datos" border="1">
                            <thead align="center">
                                <tr>
                                    <th colspan="4" style="font-size: 40px; text-align: center">Clasificaciones</th>
                                </tr>
                                <tr>
                                    <th>Nombre</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $clasi = $data->getClasificacion();
                                foreach ($clasi as $key) {
                                    echo ' 
                                <tr>
                                    <td>' . $key['nombre'] . '</td>
                                </tr>
                             ';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat" style="margin-left: 1100px">Aceptar</a>
                    </div>
                </div>
                <div id="carga" class="modal modal-fixed-footer">
                    <div class="modal-content">
                        <table class="table responsive-table centered" id="datos" border="1">
                            <thead align="center">
                                <tr>
                                    <th colspan="4" style="font-size: 40px; text-align: center">Registro de cargas</th>
                                </tr>
                                <tr>
                                    <th>Peso</th>
                                    <th>Descripcion</th>
                                    <th>Tipo Carga</th>
                                    <th>R.U.T Cliente</th>
                                    <th>Clasificacion</th>
                                    <th>Patente de avion</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $carga = $data->getCarga();
                                foreach ($carga as $key) {
                                    echo ' 
                                <tr>
                                    <td>' . $key['peso'] . '</td>
                                    <td>' . $key['descripcion'] . '</td>
                                    <td>' . $key['Tipo carga'] . '</td>
                                    <td>' . $key['R.U.T cliente'] . '</td>
                                    <td>' . $key['Clasificacion'] . '</td>
                                    <td>' . $key['Patente de avion'] . '</td>
                                </tr>
                             ';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat" style="margin-left: 1100px">Aceptar</a>
                    </div>
                </div>
                <div id="cliente" class="modal modal-fixed-footer">
                    <div class="modal-content">
                        <table class="table responsive-table centered" id="datos" border="1">
                            <thead align="center">
                                <tr>
                                    <th colspan="4" style="font-size: 40px; text-align: center">Clientes </th>
                                </tr>
                                <tr>
                                    <th>R.U.T</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Email</th>
                                    <th>Telefono</th>
                                    <th>Equipaje</th>
                                    <th>numeroEquipaje</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $cliente = $data->getCliente();
                                foreach ($cliente as $key) {
                                    echo ' 
                                <tr>
                                    <td>' . $key['rut'] . '</td>
                                    <td>' . $key['nombre'] . '</td>
                                    <td>' . $key['apellido'] . '</td>
                                    <td>' . $key['email'] . '</td>
                                    <td>' . $key['telefono'] . '</td>
                                    <td>' . $key['equipaje'] . '</td>
                                    <td>' . $key['numeroEquipaje'] . '</td>
                                </tr>
                             ';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat" style="margin-left: 1100px">Aceptar</a>
                    </div>
                </div>
                <div id="historial" class="modal modal-fixed-footer">
                    <div class="modal-content">
                        <table class="table responsive-table centered" id="datos" border="1">
                            <thead align="center">
                                <tr>
                                    <th colspan="4" style="font-size: 40px; text-align: center">Historial</th>
                                </tr>
                                <tr>
                                    <th>Cantidad</th>
                                    <th>Fecha-Hora Solicitud</th>
                                    <th>ID de solicitud</th>
                                    <th>Articulo</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $historial = $data->getHistorial();
                                foreach ($historial as $key) {
                                    echo ' 
                                <tr>
                                    <td>' . $key['cantidad'] . '</td>
                                    <td>' . $key['fecha y hora de solicitud'] . '</td>
                                    <td>' . $key['id de la solicitud'] . '</td>
                                    <td>' . $key['articulo'] . '</td>
                                </tr>
                             ';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat" style="margin-left: 1100px">Aceptar</a>
                    </div>
                </div>
                <div id="reporte" class="modal modal-fixed-footer">
                    <div class="modal-content">
                        <table class="table responsive-table centered" id="datos" border="1">
                            <thead align="center">
                                <tr>
                                    <th colspan="4" style="font-size: 40px; text-align: center">Reportes</th>
                                </tr>
                                <tr>
                                    <th>RUT usuario</th>
                                    <th>Gravedad</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Observacion</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $reporte = $data->getReporte();
                                foreach ($reporte as $key) {
                                    echo ' 
                                <tr>
                                    <td>' . $key['RUT usuario'] . '</td>
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
                    <div class="modal-footer">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat" style="margin-left: 1100px">Aceptar</a>
                    </div>
                </div>
                <div id="solicitud" class="modal modal-fixed-footer">
                    <div class="modal-content">
                        <table class="table responsive-table centered" id="datos" border="1">
                            <thead align="center">
                                <tr>
                                    <th colspan="4" style="font-size: 40px; text-align: center">Solicitudes</th>
                                </tr>
                                <tr>
                                    <th>Descripcion</th>
                                    <th>Fecha-Hora</th>
                                    <th>Estado</th>
                                    <th>RUT usuario</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $solicitud = $data->getSolicitud();
                                foreach ($solicitud as $key) {
                                    echo ' 
                                <tr>
                                    <td>' . $key['descripcion'] . '</td>
                                    <td>' . $key['fecha-hora'] . '</td>
                                    <td>' . $key['estado'] . '</td>
                                    <td>' . $key['RUT usuario'] . '</td>
                                </tr>
                             ';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat" style="margin-left: 1100px">Aceptar</a>
                    </div>
                </div>
                <div id="stock" class="modal modal-fixed-footer">
                    <div class="modal-content">
                        <table class="table responsive-table centered" id="datos" border="1">
                            <thead align="center">
                                <tr>
                                    <th colspan="4" style="font-size: 40px; text-align: center">Stock</th>
                                </tr>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Activo</th>
                                    <th>Cantidad</th>
                                    <th>Descripcion</th>
                                    <th>Area</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $stock = $data->getStock();
                                foreach ($stock as $key) {
                                    echo ' 
                                <tr>
                                    <td>' . $key['nombre'] . '</td>
                                    <td>' . $key['activo'] . '</td>
                                    <td>' . $key['cantidad'] . '</td>
                                    <td>' . $key['descripcion'] . '</td>
                                    <td>' . $key['area'] . '</td>
                                </tr>
                             ';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat" style="margin-left: 1100px">Aceptar</a>
                    </div>
                </div>
                <div id="tipo_carga" class="modal modal-fixed-footer">
                    <div class="modal-content">
                        <table class="table responsive-table centered" id="datos" border="1">
                            <thead align="center">
                                <tr>
                                    <th colspan="4" style="font-size: 40px; text-align: center">Tipos de Carga</th>
                                </tr>
                                <tr>
                                    <th>Nombre</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $carga = $data->getTCarga();
                                foreach ($carga as $key) {
                                    echo ' 
                                <tr>
                                    <td>' . $key['nombre'] . '</td>
                                </tr>
                             ';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat" style="margin-left: 1100px">Aceptar</a>
                    </div>
                </div>
                <div id="tipo_clasificacion" class="modal modal-fixed-footer">
                    <div class="modal-content">
                        <table class="table responsive-table centered" id="datos" border="1">
                            <thead align="center">
                                <tr>
                                    <th colspan="4" style="font-size: 40px; text-align: center">Tipos de Clasificacion</th>
                                </tr>
                                <tr>
                                    <th>Nombre</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $clasi = $data->getClasificacion();
                                foreach ($clasi as $key) {
                                    echo ' 
                                <tr>
                                    <td>' . $key['nombre'] . '</td>
                                </tr>
                             ';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat" style="margin-left: 1100px">Aceptar</a>
                    </div>
                </div>
                <div id="tipo_user" class="modal modal-fixed-footer">
                    <div class="modal-content">
                        <table class="table responsive-table centered" id="datos" border="1">
                            <thead align="center">
                                <tr>
                                    <th colspan="4" style="font-size: 40px; text-align: center">Tipos de Usuario</th>
                                </tr>
                                <tr>
                                    <th>Nombre</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $T_user = $data->getTipoUser();
                                foreach ($T_user as $key) {
                                    echo ' 
                                <tr>
                                    <td>' . $key['nombre'] . '</td>
                                </tr>
                             ';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat" style="margin-left: 1100px">Aceptar</a>
                    </div>
                </div>
                <div id="usuario" class="modal modal-fixed-footer">
                    <div class="modal-content">
                        <table class="table responsive-table centered" id="datos" border="1">
                            <thead align="center">
                                <tr>
                                    <th colspan="4" style="font-size: 25px; text-align: center">Usuarios</th>
                                </tr>
                                <tr>
                                    <th>R.U.T</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Email</th>
                                    <th>Telefono</th>
                                    <th>Area</th>
                                    <th>Tipo de usuario</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $users = $data->getAllusers();
                                foreach ($users as $key) {
                                    echo ' 
                                <tr>
                                    <td>' . $key['rut'] . '</td>
                                    <td>' . $key['nombre'] . '</td>
                                    <td>' . $key['apellido'] . '</td>
                                    <td>' . $key['email'] . '</td>
                                    <td>' . $key['telefono'] . '</td>
                                    <td>' . $key['area'] . '</td>
                                    <td>' . $key['tipo'] . '</td>
                                </tr>
                             ';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat" style="margin-left: 1100px">Aceptar</a>
                    </div>
                </div>
                <div id="vuelo" class="modal modal-fixed-footer">
                    <div class="modal-content">
                        <table class="table responsive-table centered" id="datos" border="1">
                            <thead align="center">
                                <tr>
                                    <th colspan="4" style="font-size: 40px; text-align: center">Vuelos</th>
                                </tr>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Fecha-Hora Salida</th>
                                    <th>Fecha-Hora Entrada</th>
                                    <th>Destino</th>
                                    <th>Escala</th>
                                    <th>Patente de avion</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $vuelo = $data->getVuelo();
                                foreach ($vuelo as $key) {
                                    echo ' 
                                <tr>
                                    <td>' . $key['codigo'] . '</td>
                                    <td>' . $key['fecha-hora salida'] . '</td>
                                    <td>' . $key['fecha-hora entrada'] . '</td>
                                    <td>' . $key['destino'] . '</td>
                                    <td>' . $key['escala'] . '</td>
                                    <td>' . $key['patente de avion'] . '</td>
                                </tr>
                             ';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat" style="margin-left: 1100px">Aceptar</a>
                    </div>
                </div>
                <!-- FIN Modals BD -->
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
