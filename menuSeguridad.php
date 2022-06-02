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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="Materialize/css/materialize.css">
        <script src="Materialize/js/materialize.js"></script>
        <link rel="icon" href="img/favicon.png"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <title>Menu seguridad</title>
    </head>
    <body style="background-color: #E4E9F7">
        <!-- Modal de generar Reporte -->
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
        <div id="modal2" class="modal">
            <div class="modal-content" style="padding: 40px 0">
                <div class="row">
                    <span class="table_Tit center" style="display: block; margin-bottom: 40px">Listado de personal</span>
                    <table class="table centered responsive-table striped" id="datos">
                        <thead>
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
            </div>
            <div class="modal-footer" style="text-align: center; margin-bottom: 10px;">
                <a href="#!" class="modal-close waves-effect waves-light btn" style="background: #363771; width: 200px; border-radius: 3px; font-weight: 500; letter-spacing: 2px; font-size: 16px">Cerrar</a>
            </div>
        </div>

        <nav class="nav-extended" style="background-color: #1d1b31;">
            <div class="nav-wrapper">
                <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons" style="font-size: 35px">menu</i></a>
                <img src="img/favicon.png">
                <span class="brand-logo">Menu Seguridad</span>
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
            <li>
                <a class="modal-trigger waves-effect" href="#modal2">Listado de personal<i class='bx bx-user white-text' style="font-size: 22px;"></i>
                </a>
            </li>
            <li><div class="divider"></div></li>
            <li><a href="Controller/controllerLogOut.php" class="waves-effect">Cerrar sesión<i class='bx bx-log-out white-text' style="font-size: 22px;"></i></a></li>
        </ul>
        <section>
            <div class="container" style="background-color: white">
                <div class="row" style="margin: 0">
                    <div class="col s12" style="margin-top: 20px; margin-bottom: 40px">
                        <div class="col s12 m12 l12">
                            <div class="row center">
                                <span class="card-title titel_img" style="font-weight: 700; color: #505050; letter-spacing: 2px">Terminal T1</span>
                            </div>
                            <section style="width: auto; height: auto; border-radius: 20px; border: 1px solid #bdbdbd">   
                                <div class="row row_padd">
                                    <div class="col s12 m6 l4">
                                        <div class="card">
                                            <div class="card-image waves-effect waves-block waves-light">
                                                <img class="activator_nivel_1_t1" src="img/bg_card_nivel_1.jpg" height="180px">
                                            </div>
                                            <div class="card-content">
                                                <span class="card-title">Nivel 1</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col s12 m6 l4">
                                        <div class="card">
                                            <div class="card-image waves-effect waves-block waves-light">
                                                <img class="activator_nivel_2_t1" src="img/bg_card_nivel_2.jpg" height="180px">
                                            </div>
                                            <div class="card-content">
                                                <span class="card-title">Nivel 2</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col s12 m6 l4">
                                        <div class="card">
                                            <div class="card-image waves-effect waves-block waves-light">
                                                <img class="activator_nivel_3_t1" src="img/bg_card_nivel_3.jpg" height="180px">
                                            </div>
                                            <div class="card-content">
                                                <span class="card-title">Nivel 3</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col s12 m6 l4">
                                        <div class="card">
                                            <div class="card-image waves-effect waves-block waves-light">
                                                <img class="activator_nivel_4_t1" src="img/bg_card_nivel_4.jpg" height="180px">
                                            </div>
                                            <div class="card-content">
                                                <span class="card-title">Nivel 4</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col s12 m6 l4">
                                        <div class="card">
                                            <div class="card-image waves-effect waves-block waves-light">
                                                <img class="activator_services_t1" src="img/bg_card_services.jpg" height="180px">
                                            </div>
                                            <div class="card-content">
                                                <span class="card-title">Área de servicios</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="col s12 m12 l12">
                            <div class="row center" style="margin-top: 10px">
                                <span class="card-title titel_img" style="font-weight: 700; color: #505050; letter-spacing: 2px;">Terminal T2</span>
                            </div>
                            <section style="width: auto; height: auto; border-radius: 20px; border: 1px solid #bdbdbd">   
                                <div class="row" style="padding-left: 40px; padding-right: 40px; padding-top: 40px; padding-bottom: 12px">
                                    <div class="col s12 m12 l4">
                                        <div class="card">
                                            <div class="card-image waves-effect waves-block waves-light">
                                                <img class="activator_nivel_1_t2" src="img/bg_card_nivel_1.jpg" height="180px">
                                            </div>
                                            <div class="card-content">
                                                <span class="card-title">Nivel 1</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col s12 m12 l4">
                                        <div class="card">
                                            <div class="card-image waves-effect waves-block waves-light">
                                                <img class="activator_nivel_2_t2" src="img/bg_card_nivel_2.jpg" height="180px">
                                            </div>
                                            <div class="card-content">
                                                <span class="card-title">Nivel 2</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col s12 m12 l4">
                                        <div class="card">
                                            <div class="card-image waves-effect waves-block waves-light">
                                                <img class="activator_nivel_3_t2" src="img/bg_card_nivel_3.jpg" height="180px">
                                            </div>
                                            <div class="card-content">
                                                <span class="card-title">Nivel 3</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col s12 m12 l4">
                                        <div class="card">
                                            <div class="card-image waves-effect waves-block waves-light">
                                                <img class="activator_hotel" src="img/bg_card_hotel.jpg" height="180px">
                                            </div>
                                            <div class="card-content">
                                                <span class="card-title">Hotel</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col s12 m12 l4">
                                        <div class="card">
                                            <div class="card-image waves-effect waves-block waves-light">
                                                <img class="activator_services_t2" src="img/bg_card_services.jpg" height="180px">
                                            </div>
                                            <div class="card-content">
                                                <span class="card-title">Área de servicios</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="col s12 m12 l12">
                            <div class="row center" style="margin-top: 10px">
                                <span class="card-title titel_img" style="font-weight: 700; color: #505050; letter-spacing: 2px">Estacionamientos</span>
                            </div>
                            <section style="width: auto; height: auto; border-radius: 20px; border: 1px solid #bdbdbd">   
                                <div class="row" style="padding-left: 40px; padding-right: 40px; padding-top: 40px; padding-bottom: 12px">
                                    <div class="col s12 m12 l4">
                                        <div class="card">
                                            <div class="card-image waves-effect waves-block waves-light">
                                                <img class="activator_hangares" src="img/bg_card_hangares.jpg" height="180px">
                                            </div>
                                            <div class="card-content">
                                                <span class="card-title">Hangares</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col s12 m12 l4">
                                        <div class="card">
                                            <div class="card-image waves-effect waves-block waves-light">
                                                <img class="activator_esta_termi_t1" src="img/bg_card_esta_terminalt1.jpg" height="180px">
                                            </div>
                                            <div class="card-content">
                                                <span class="card-title">E. Terminal T1</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col s12 m12 l4">
                                        <div class="card">
                                            <div class="card-image waves-effect waves-block waves-light" >
                                                <img class="activator_esta_termi_t2" src="img/bg_card_esta_terminalt2.jpg" height="180px">
                                            </div>
                                            <div class="card-content">
                                                <span class="card-title">E. Terminal T2</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col s12 m12 l4">
                                        <div class="card">
                                            <div class="card-image waves-effect waves-block waves-light" >
                                                <img class="activator_aero_t1" src="img/bg_card_aerodromot1.jpg" height="180px">
                                            </div>
                                            <div class="card-content">
                                                <span class="card-title">Aeródromo T1</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col s12 m12 l4">
                                        <div class="card">
                                            <div class="card-image waves-effect waves-block waves-light" >
                                                <img class="activator_aero_t2" src="img/bg_card_aerodromot2.jpg" height="180px">
                                            </div>
                                            <div class="card-content">
                                                <span class="card-title">Aeródromo T2</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="col s12 m12 l12">
                            <div class="row center" style="margin-top: 10px">
                                <span class="card-title titel_img" style="font-weight: 700; color: #505050; letter-spacing: 2px">Área de Almacenamiento</span>
                            </div>
                            <section style="width: auto; height: auto; border-radius: 20px; border: 1px solid #bdbdbd">   
                                <div class="row" style="padding-left: 40px; padding-right: 40px; padding-top: 40px; padding-bottom: 12px">
                                    <div class="col s12 m12 l4">
                                        <div class="card">
                                            <div class="card-image waves-effect waves-block waves-light">
                                                <img target="_blank" class="activator_bodega_g" src="img/bg_card_bodega1.jpg" height="180px">
                                            </div>
                                            <div class="card-content">
                                                <span class="card-title">Bodega General</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col s12 m12 l4">
                                        <div class="card"> 
                                            <div class="card-image waves-effect waves-block waves-light">
                                                <img class="activator_bodega_mini" src="img/bg_card_bodega2.jpg" height="180px">
                                            </div>
                                            <div class="card-content">
                                                <span class="card-title">Mini Bodegas</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="page-footer" style="background-color: white">
            <div class="footer-copyright" style="background-color: #1d1b31">
                <div class="container center">
                    SGV © Derechos Reservados - 2022
                </div>
            </div>
        </footer>

        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function () {
                M.AutoInit();
            })
            const card1 = document.querySelector('.activator_nivel_1_t1');
            const card2 = document.querySelector('.activator_nivel_2_t1');
            const card3 = document.querySelector('.activator_nivel_3_t1');
            const card4 = document.querySelector('.activator_nivel_4_t1');
            const card5 = document.querySelector('.activator_services_t1');

            const card6 = document.querySelector('.activator_nivel_1_t2');
            const card7 = document.querySelector('.activator_nivel_2_t2');
            const card8 = document.querySelector('.activator_nivel_3_t2');
            const card9 = document.querySelector('.activator_hotel');
            const card10 = document.querySelector('.activator_services_t2');

            const card11 = document.querySelector('.activator_hangares');
            const card12 = document.querySelector('.activator_esta_termi_t1');
            const card13 = document.querySelector('.activator_esta_termi_t2');
            const card14 = document.querySelector('.activator_aero_t1');
            const card15 = document.querySelector('.activator_aero_t2');

            const card16 = document.querySelector('.activator_bodega_g');
            const card17 = document.querySelector('.activator_bodega_mini');

            card1.addEventListener("click", function () {
                window.open('menuV_Hangar.php', '_blank');
            });
            card2.addEventListener("click", function () {
                window.open('menuV_Hangar.php', '_blank');
            });
            card3.addEventListener("click", function () {
                window.open('menuV_Hangar.php', '_blank');
            });
            card4.addEventListener("click", function () {
                window.open('menuV_Hangar.php', '_blank');
            });
            card5.addEventListener("click", function () {
                window.open('menuV_Hangar.php', '_blank');
            });
            card6.addEventListener("click", function () {
                window.open('menuV_Hangar.php', '_blank');
            });
            card7.addEventListener("click", function () {
                window.open('menuV_Hangar.php', '_blank');
            });
            card8.addEventListener("click", function () {
                window.open('menuV_Hangar.php', '_blank');
            });
            card9.addEventListener("click", function () {
                window.open('menuV_Hangar.php', '_blank');
            });
            card10.addEventListener("click", function () {
                window.open('menuV_Hangar.php', '_blank');
            });
            card11.addEventListener("click", function () {
                window.open('menuV_Hangar.php', '_blank');
            });
            card12.addEventListener("click", function () {
                window.open('menuV_Hangar.php', '_blank');
            });
            card13.addEventListener("click", function () {
                window.open('menuV_Hangar.php', '_blank');
            });
            card14.addEventListener("click", function () {
                window.open('menuV_Hangar.php', '_blank');
            });
            card15.addEventListener("click", function () {
                window.open('menuV_Hangar.php', '_blank');
            });
            card16.addEventListener("click", function () {
                window.open('menuV_Hangar.php', '_blank');
            });
            card17.addEventListener("click", function () {
                window.open('menuV_Hangar.php', '_blank');
            });
        </script>
        <script src="js/script.js"></script>
    </body>
</html>
