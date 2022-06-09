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
        <link rel="icon" href="../img/iconAdmin.png"/>
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <title>Visualizar Tablas</title>

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
                    <a id="menu" href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons" style="font-size: 30px">menu</i></a>
                    <img src="../img/iconAdmin.png">
                    <span class="brand-logo">Menu Admin</span>
                </div>
            </nav>
            <ul id="slide-out" class="sidenav" style="background-color: #1d1b31;">
                <li><div class="user-view">
                        <div class="background" style="background-color: #1d1b31;">
                        </div>
                        <a href="../menuAdmin.php"><img class="circle" src="../img/iconPerfil.png"></a>
                        <a href="#name"><span class="white-text name" style="font-size: 20px"><?php echo $nombre . ' ' . $apellido ?></span></a>
                        <a href="#email"><span class="white-text email" style="font-size: 14px"><?php echo $correo ?></span></a>
                    </div></li>
                <li><div class="divider"></div></li>
                <li><a href="../menuAdmin.php" class="waves-effect" style="margin-left: -3px">Inicio<i class='bx bx-home white-text' style="font-size: 27px;"></i></a></li>
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header waves-effect"><i class='bx bx-data white-text' style="font-size: 27px;"></i>Base de datos<i class="material-icons right white-text" style="font-size: 30px;">arrow_drop_down</i></a>
                        <div class="collapsible-body" style="background-color: #1d1b31">
                            <ul>
                                <li><a href="../backup.php"><i class='bx bx-file white-text' style="font-size: 22px;"></i>Respaldo</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <li><div class="divider"></div></li>
                <li><a href="../Controller/controllerLogOut.php" class="waves-effect">Cerrar sesión<i class='bx bx-log-out white-text' style="font-size: 27px;"></i></a></li>
            </ul>

            <div class="row">
                <div class="col s12 m12 l12">
                    <div class="card" style="margin: 40px auto; max-width: 1680px; width: 100%; border-radius: 10px;">
                        <div class="card-content" style="margin: 20px 100px; padding: 40px 0">
                            <h2 class="table_Tit center" style="display: block; margin-bottom: 4%; margin-top: 1%">Tablas de la base de datos</h2>
                            <table class="table centered" id="registros">
                                <thead style="font-size: 20px; text-align: center">
                                    <tr>
                                        <th>Nombre</th>
                                        <th>N° de Registros</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $table = $data->getAllTables();
                                    $contador = 1;
                                    foreach ($table as $key) {
                                        $name = $key['table_name'];
                                        $registro = $data->getTable($name);
                                        foreach ($registro as $value) {
                                            echo
                                            ''
                                            ?>
                                        <form method="post" id="form<?php echo $contador; ?>">
                                            <tr>
                                                <td><?php echo $name; ?></td>
                                                <td><?php echo $value['registro']; ?></td>
                                                <td><button data-target="<?php echo $name; ?>" class="btn white-text waves-effect waves-light indigo darken-3 modal-trigger" style="height: 43px; border-radius: 6px; font-weight: 600;">Visualizar</button></td>
                                            </tr>
                                        </form>
                                        <?php
                                        '';
                                    }
                                    $contador = $contador + 1;
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modals BD -->
            <div>
                <div id="area_usuario" class="modal modal-fixed-footer">
                    <div class="modal-content">
                        <table class="table centered" id="datos" border="1">
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
                    <div class="modal-footer center">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Aceptar</a>
                    </div>
                </div>
                <div id="avion" class="modal modal-fixed-footer">
                    <div class="modal-content">
                        <table class="table centered" id="datos" border="1">
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
                    <div class="modal-footer center">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Aceptar</a>
                    </div>
                </div>
                <div id="boleto" class="modal modal-fixed-footer">
                    <div class="modal-content">
                        <table class="table centered" id="datos" border="1">
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
                    <div class="modal-footer center">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Aceptar</a>
                    </div>
                </div>
                <div id="tipo_clasificacion" class="modal modal-fixed-footer">
                    <div class="modal-content">
                        <table class="table centered" id="datos" border="1">
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
                    <div class="modal-footer center">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Aceptar</a>
                    </div>
                </div>
                <div id="carga" class="modal modal-fixed-footer">
                    <div class="modal-content">
                        <table class="table centered" id="datos" border="1">
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
                    <div class="modal-footer center">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Aceptar</a>
                    </div>
                </div>
                <div id="cliente" class="modal modal-fixed-footer">
                    <div class="modal-content">
                        <table class="table centered" id="datos" border="1">
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
                    <div class="modal-footer center">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Aceptar</a>
                    </div>
                </div>
                <div id="historial" class="modal modal-fixed-footer">
                    <div class="modal-content">
                        <table class="table centered" id="datos" border="1">
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
                    <div class="modal-footer center">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Aceptar</a>
                    </div>
                </div>
                <div id="reporte" class="modal modal-fixed-footer">
                    <div class="modal-content">
                        <table class="table centered" id="datos" border="1">
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
                    <div class="modal-footer center">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Aceptar</a>
                    </div>
                </div>
                <div id="solicitud" class="modal modal-fixed-footer">
                    <div class="modal-content">
                        <table class="table centered" id="datos" border="1">
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
                    <div class="modal-footer center">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Aceptar</a>
                    </div>
                </div>
                <div id="stock" class="modal modal-fixed-footer">
                    <div class="modal-content">
                        <table class="table centered" id="datos" border="1">
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
                    <div class="modal-footer center">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Aceptar</a>
                    </div>
                </div>
                <div id="tipo_carga" class="modal modal-fixed-footer">
                    <div class="modal-content">
                        <table class="table centered" id="datos" border="1">
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
                    <div class="modal-footer center">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Aceptar</a>
                    </div>
                </div>
                <div id="tipo_clasificacion" class="modal modal-fixed-footer">
                    <div class="modal-content">
                        <table class="table centered" id="datos" border="1">
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
                    <div class="modal-footer center">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Aceptar</a>
                    </div>
                </div>
                <div id="tipo_user" class="modal modal-fixed-footer">
                    <div class="modal-content">
                        <table class="table centered" id="datos" border="1">
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
                    <div class="modal-footer center">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat" >Aceptar</a>
                    </div>
                </div>
                <div id="usuario" class="modal modal-fixed-footer">
                    <div class="modal-content">
                        <table class="table centered" id="datos" border="1">
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
                    <div class="modal-footer center">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Aceptar</a>
                    </div>
                </div>
                <div id="vuelo" class="modal modal-fixed-footer">
                    <div class="modal-content">
                        <table class="table centered" id="datos" border="1">
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
                    <div class="modal-footer center">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Aceptar</a>
                    </div>
                </div>
                <!-- FIN Modals BD -->
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
                $('#registros').DataTable({
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
