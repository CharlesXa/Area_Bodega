<?php
error_reporting(E_NOTICE ^ E_ALL);

include_once '../Model_Data.php';
session_start();
$rut = $_SESSION['rut'];
$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];
$passwd_t = $_SESSION['passwd_t'];
$correo = $_SESSION['email'];

if ($correo == null || "") {
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
        <link rel="stylesheet" href="../Materialize/css/materialize.css">
        <script src="../Materialize/js/materialize.js"></script>
        <link rel="icon" href="../img/iconoBodega.png"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <title>Menu Bodega - D. Equipaje</title>

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.semanticui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css"/>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.semanticui.min.css"/>

    </head>
    <body style="background-color: #f5f7fb" >
        <div id="modal_pass" class="modal" style="margin-top: 100px">
            <div class="modal-content">
                <form class="col s2" action="../controller/controllerUpdatepass.php" method="post">
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
                    <img src="../img/iconoBodega.png">
                    <span class="brand-logo">Menu Bodega</span>
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
                                <li><a href="../vistas_stock/ingresarStock.php"><i class='bx bx-upload white-text' style="font-size: 22px;"></i>Ingreso</a></li>
                                <li><a href="../vistas_stock/actualizarStock.php"><i class='bx bx-cloud-upload white-text' style="font-size: 22px;"></i>Actualizar</a></li>
                                <li><a href="../vistas_stock/visualizarStock.php"><i class="uil uil-eye white-text" style="font-size: 22px;"></i>Visualizar</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <li><div class="divider"></div></li>
                <li><a href="../Controller/controllerLogOut.php" class="waves-effect">Cerrar sesión<i class='bx bx-log-out white-text' style="font-size: 22px;"></i></a></li>
            </ul>
            <div class="row">
                <div class="col s12">
                    <div class="card" style="margin: 40px auto; max-width: 1680px; width: 100%; border-radius: 10px;">
                        <div class="card-content" style="margin: 40px 100px; padding: 3.5% 0">
                            <span class="table_Tit center" style="display: block; margin-bottom: 6%; margin-top: 1%">Distribucion de Equipaje</span>
                            <div class="row center">
                                <div class="col s12 m6 l6">
                                    <button data-target="ModalX" class="btn white-text waves-effect waves-light modal-trigger indigo darken-3" name="btn_ingresar" type="submit" style="height: 50px; margin-bottom: 6%; border-radius: 6px; font-weight: 600;">Cargar</button>
                                </div>
                                <div class="col s12 m6 l6">
                                    <button data-target="#" class="btn white-text waves-effect waves-light indigo darken-3" name="btn_ingresar" type="submit" style="height: 50px; margin-bottom: 6%; border-radius: 6px; font-weight: 600;">Cargar siguiente vuelo</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m12 l12">   
                                    <table class="table centered responsive-table" id="datos">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Descripcion</th>
                                                <th>Peso</th>
                                                <th>Vuelo</th>
                                                <th>Avion</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $destino = 'Rusia';
                                            $pesoCarga = 0;
                                            $volumenT = 0;
                                            $pesoArray = [];
                                            $cargas = $data->getCargaVuelo($destino);
                                            foreach ($cargas as $key) {

                                                echo '
                                    <tr> 
                                        <td>' . $key['Cliente'] . '</td>   
                                        <td>' . $key['descripcion'] . '</td>   
                                        <td>' . $key['Peso kg'] . '</td>   
                                        <td>' . $key['Vuelo'] . '</td>   
                                        <td>' . $key['Avion'] . '</td>   
                                    </tr>
                                ';
                                                $pesoCarga = $pesoCarga + $key['Peso kg'];
                                                array_push($pesoArray, $key['Peso kg']);
                                                $volumenT = $key['Volumen'];
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
            <div id="ModalX" class="modal">
                <div class="modal-content">
                    <h4>Modal Header</h4>
                    <p><?php echo $destino . " -- " . $pesoCarga . " -- " . $volumenT; ?></p>

                    <?php
                    $disponible = 75;
                    $cargaC = 0;
                    $int = 0;
                    $pendiente = [];
                    print_r($pesoArray);
                    foreach ($pesoArray as $value) {
                        if ($disponible >= 0) {
                            $disponible = $disponible - $value;
                            $cargaC = $cargaC + $value;

                            echo "<br>" . $value . " -- " . $cargaC . " -- " . $disponible . "<br>";
                            if ($disponible <= 0) {
                                echo 'No entro<br>';
                                $disponible = $disponible + $value;
                                $cargaC = $cargaC - $value;

                                array_push($pendiente, $value);
                                print_r($pesoArray);
                            } else if ($disponible > 0) {

                                unset($pesoArray[$int]);
                                $int = $int + 1;
                                print_r($pesoArray);
                                echo '<br>';
                            }
                        } else {
                            echo $value . "<br>";
                        }
                    }
                    echo '<br> pendiente';
                    print_r($pendiente);
                    /* $textos = array("Hola", "Chau", "Bien", "Mal");
                      print_r($textos);
                      echo "Borrando la palabra 'Chau' dentro del array:<br>";
                      if (($clave = array_search("Chau", $textos)) !== false) {
                      unset($textos[$clave]);
                      print_r($textos);
                      } */
                    ?>
                    <table>
                        <thead>

                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
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
