<?php
error_reporting(E_NOTICE ^ E_ALL);

include_once 'Model_Data.php';
session_start();
$rut = $_SESSION['rut'];
$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];

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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="Materialize/css/materialize.css">
        <script src="Materialize/js/materialize.js"></script>
        <link rel="icon" href="img/favicon.png"/>
        <link rel="stylesheet" href="Materialize/css/style.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <title>Menu seguridad</title>
    </head>
    <body style="background-color: #E4E9F7">
        <div class="sidebar close">
            <div class="logo-details">
                <a href="menuSeguridad.php" style="padding: 30px 0 15px 18px">
                    <img src="img/favicon.png" width="40px" height="40px"/>
                </a>
                <span class="logo_name">Seguridad S.G.V</span>
            </div>
            <ul class="nav-links">
                <li>
                    <a href="#">
                        <span class="link_name"></span>
                    </a>
                </li>
                <li>
                    <div class="iocn-link">
                        <a class="modal-trigger" href="#modal1">
                            <i class='bx bx-comment' ></i>
                            <!--<a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a>-->
                            <span title="Generar reporte" class="link_name">Generar reporte</span>
                        </a>
                    </div>
                    <ul class="sub-menu">
                        <li><a class="modal-trigger" href="#modal1">Generar reporte</a></li>
                    </ul>
                </li>
                <li>
                    <div class="iocn-link">
                        <a class="modal-trigger" href="#modal2">
                            <i class='bx bx-user' ></i>
                            <span class="link_name">P. de Seguridad</span>
                        </a>
                    </div>
                    <ul class="sub-menu">
                        <li><a href="#modal2">Politicas de Seguridad</a></li>
                    </ul>
                </li>
                <li>
                    <div class="profile-details">
                        <div class="profile-content">
                            <a href="Controller/controllerLogOut.php"><img src="img/iconPerfil.png" alt="profileImg"></a>
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
        <!-- Modal de generar Reporte -->
        <div id="modal1" class="modal">
            <div class="modal-content">
                <h4 style="font-family: 'Poppins', sans-serif; font-weight: 500">Reporte</h4>
                <div class="row grey lighten-3">
                    <form class="col s12" style="padding: 30px">
                        <div class="row">
                            <div class="input-field col s12 m6 l6">
                                <input id="a" type="text" class="validate" style="background-color: white; border-radius: 5px; border-bottom: none; text-indent: 18px;">
                                <label for="a">R.U.T</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6 l6">
                                <input id="c" type="text" class="validate" style="background-color: white; border-radius: 5px; border-bottom: none; text-indent: 18px;">
                                <label for="c">Nombre</label>
                            </div>
                            <div class="input-field col s12 m6 l6">
                                <input id="b" type="text" class="validate" style="background-color: white; border-radius: 5px; border-bottom: none; text-indent: 18px;">
                                <label for="b">Apellido</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s10 m6 l4" style="background-color: white; border-radius: 5px; margin-left: 12px">
                                <select>
                                    <option value="" disabled selected>Gravedad</option>
                                    <option value="1">Leve</option>
                                    <option value="2">Media</option>
                                    <option value="3">Grave</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s10 m6 l3" style="background-color: white; border-radius: 5px; margin-left: 12px">
                                <input style="border-bottom: none" placeholder="" id="datepicker" type="text" class="datepicker">
                                <label style="transform: translate(-19px, -22px);" for="datepicker">Fecha</label>
                            </div>
                            <div class="input-field col s10 m6 l3" style="background-color: white; border-radius: 5px; margin-left: 12px">
                                <input style="border-bottom: none" placeholder="" id="timepicker" type="text" class="timepicker">
                                <label style="transform: translate(-19px, -22px);" for="timepicker" style="">Hora</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="textarea2" class="materialize-textarea" data-length="120" style="background-color: white; border-radius: 5px; border-bottom: none;; text-indent: 18px;"></textarea>
                                <label for="textarea2">Observaciones</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer" style="text-align: center; margin-bottom: 10px">
                <a href="#" class="modal-close waves-effect waves-light btn yellow darken-3">Cancelar</a>
                <a href="#" class="modal-close waves-effect waves-light btn" style="background: #1d1b31;">Aceptar</a>
            </div>
        </div>
        <div id="modal2" class="modal">
            <div class="modal-content">
                <h4 style="font-family: 'Poppins', sans-serif; font-weight: 500">Personal Autorizado</h4>
                <div class="row grey lighten-3">
                    <form class="col s12" style="padding: 30px">
                        <div class="row">
                            <div class="input-field col s12 m6 l6">
                                <input id="a" type="text" class="validate" style="background-color: white; border-radius: 5px; border-bottom: none; text-indent: 18px;">
                            </div>
                            <div class="input-field col s12 m6 l6">
                                <input id="a" type="text" class="validate" style="background-color: white; border-radius: 5px; border-bottom: none; text-indent: 18px;">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer" style="text-align: center; margin-bottom: 10px">
                <a href="#!" class="modal-close waves-effect waves-light btn indigo darken-4">Cerrar</a>
            </div>
        </div>
        <section class="home-section">
            <div class="nav-wrapper">
                <nav  style="background-color: #1d1b31;">
                    <div class="nav-wrapper">
                        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="bx bx-menu white-text" ></i></a>
                    </div>
                </nav>
            </div>
            <!--<div class="home-content">
            </div>-->
            <div class="row" style="padding: 20px 50px">
                <div class="col s12">
                    <div class="col s12 m6 l16">
                        <div class="row center" style="margin-top: 10px">
                            <span class="card-title" style="font-weight: 700; font-size: 23px; color: #505050; letter-spacing: 2px">Terminal T1</span>
                        </div>
                        <section class="z-depth-2" style="border: 0px solid #505050; width: auto; height: auto; border-radius: 10px; background-color: white">   
                            <div class="row" style="padding-left: 20px; padding-right: 20px; padding-top: 20px; padding-bottom: 12px">
                                <div class="col s12 m12 l4">
                                    <div class="card">
                                        <div class="card-image waves-effect waves-block waves-light">
                                            <img class="activator_nivel_1_t1" src="img/bg_card_nivel_1.jpg" height="130px">
                                        </div>
                                        <div class="card-content">
                                            <span class="card-title">Nivel 1</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m12 l4">
                                    <div class="card">
                                        <div class="card-image waves-effect waves-block waves-light">
                                            <img class="activator_nivel_2_t1" src="img/bg_card_nivel_2.jpg" height="130px">
                                        </div>
                                        <div class="card-content">
                                            <span class="card-title">Nivel 2</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m12 l4">
                                    <div class="card">
                                        <div class="card-image waves-effect waves-block waves-light">
                                            <img class="activator_nivel_3_t1" src="img/bg_card_nivel_3.jpg" height="130px">
                                        </div>
                                        <div class="card-content">
                                            <span class="card-title">Nivel 3</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m12 l4">
                                    <div class="card">
                                        <div class="card-image waves-effect waves-block waves-light">
                                            <img class="activator_nivel_4_t1" src="img/bg_card_nivel_4.jpg" height="130px">
                                        </div>
                                        <div class="card-content">
                                            <span class="card-title">Nivel 4</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m12 l4">
                                    <div class="card">
                                        <div class="card-image waves-effect waves-block waves-light">
                                            <img class="activator_services_t1" src="img/bg_card_services.jpg" height="130px">
                                        </div>
                                        <div class="card-content">
                                            <span class="card-title">Área de servicios</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col s12 m6 l16">
                        <div class="row center" style="margin-top: 10px">
                            <span class="card-title" style="font-weight: 700; font-size: 23px; color: #505050; letter-spacing: 2px;">Terminal T2</span>
                        </div>
                        <section class="z-depth-2" style="border: 0px solid #505050; width: auto; height: auto;  border-radius: 10px; background-color: white">   
                            <div class="row" style="padding-left: 20px; padding-right: 20px; padding-top: 20px; padding-bottom: 12px">
                                <div class="col s12 m12 l4">
                                    <div class="card">
                                        <div class="card-image waves-effect waves-block waves-light">
                                            <img class="activator_nivel_1_t2" src="img/bg_card_nivel_1.jpg" height="130px">
                                        </div>
                                        <div class="card-content">
                                            <span class="card-title">Nivel 1</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m12 l4">
                                    <div class="card">
                                        <div class="card-image waves-effect waves-block waves-light">
                                            <img class="activator_nivel_2_t2" src="img/bg_card_nivel_2.jpg" height="130px">
                                        </div>
                                        <div class="card-content">
                                            <span class="card-title">Nivel 2</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m12 l4">
                                    <div class="card">
                                        <div class="card-image waves-effect waves-block waves-light">
                                            <img class="activator_nivel_3_t2" src="img/bg_card_nivel_3.jpg" height="130px">
                                        </div>
                                        <div class="card-content">
                                            <span class="card-title">Nivel 3</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m12 l4">
                                    <div class="card">
                                        <div class="card-image waves-effect waves-block waves-light">
                                            <img class="activator_hotel" src="img/bg_card_hotel.jpg" height="130px">
                                        </div>
                                        <div class="card-content">
                                            <span class="card-title">Hotel</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m12 l4">
                                    <div class="card">
                                        <div class="card-image waves-effect waves-block waves-light">
                                            <img class="activator_services_t2" src="img/bg_card_services.jpg" height="130px">
                                        </div>
                                        <div class="card-content">
                                            <span class="card-title">Área de servicios</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col s12 m6 l16">
                        <div class="row center" style="margin-top: 10px">
                            <span class="card-title" style="font-weight: 700; font-size: 23px; color: #505050; letter-spacing: 2px">Estacionamientos</span>
                        </div>
                        <section class="z-depth-2" style="border: 0px solid #505050; width: auto; height: auto; border-radius: 10px; background-color: white">   
                            <div class="row" style="padding-left: 20px; padding-right: 20px; padding-top: 20px; padding-bottom: 12px">
                                <div class="col s12 m12 l4">
                                    <div class="card">
                                        <div class="card-image waves-effect waves-block waves-light">
                                            <img class="activator_hangares" src="img/bg_card_hangares.jpg" height="130px">
                                        </div>
                                        <div class="card-content">
                                            <span class="card-title">Hangares</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m12 l4">
                                    <div class="card">
                                        <div class="card-image waves-effect waves-block waves-light">
                                            <img class="activator_esta_termi_t1" src="img/bg_card_esta_terminalt1.jpg" height="130px">
                                        </div>
                                        <div class="card-content">
                                            <span class="card-title">E. Terminal T1</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m12 l4">
                                    <div class="card">
                                        <div class="card-image waves-effect waves-block waves-light" >
                                            <img class="activator_esta_termi_t2" src="img/bg_card_esta_terminalt2.jpg" height="130px">
                                        </div>
                                        <div class="card-content">
                                            <span class="card-title">E. Terminal T2</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m12 l4">
                                    <div class="card">
                                        <div class="card-image waves-effect waves-block waves-light" >
                                            <img class="activator_aero_t1" src="img/bg_card_aerodromot1.jpg" height="130px">
                                        </div>
                                        <div class="card-content">
                                            <span class="card-title">Aeródromo T1</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m12 l4">
                                    <div class="card">
                                        <div class="card-image waves-effect waves-block waves-light" >
                                            <img class="activator_aero_t2" src="img/bg_card_aerodromot2.jpg" height="130px">
                                        </div>
                                        <div class="card-content">
                                            <span class="card-title">Aeródromo T2</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col s12 m6 l16" style="">
                        <div class="row center" style="margin-top: 10px">
                            <span class="card-title" style="font-weight: 700; font-size: 23px; color: #505050; letter-spacing: 2px">Área de Almacenamiento</span>
                        </div>
                        <section class="z-depth-2" style="border: 0px solid #505050; width: auto; height: auto; border-radius: 10px; background-color: white">   
                            <div class="row" style="padding-left: 20px; padding-right: 20px; padding-top: 20px; padding-bottom: 12px">
                                <div class="col s12 m12 l4">
                                    <div class="card">
                                        <div class="card-image waves-effect waves-block waves-light">
                                            <img target="_blank" class="activator_bodega_g" src="img/bg_card_bodega1.jpg" height="130px">
                                        </div>
                                        <div class="card-content">
                                            <span class="card-title">Bodega General</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m12 l4">
                                    <div class="card"> 
                                        <div class="card-image waves-effect waves-block waves-light">
                                            <img class="activator_bodega_mini" src="img/bg_card_bodega2.jpg" height="130px">
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
            <footer class="page-footer" style="background-color: transparent">
                <div class="footer-copyright" style="background-color: #1d1b31">
                    <div class="container center">
                        SGV © Derechos Reservados - 2022
                    </div>
                </div>
            </footer>
        </section>

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
