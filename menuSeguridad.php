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
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <title>Menu seguridad</title>
    </head>
    <body style="background-color: #ffffff">
        <nav style="background-color: #353535">
            <div class="nav-wrapper">
                <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <a href="#" class="brand-logo" style="letter-spacing: 8px">SGV</a>
            </div>
            <a class='dropdown-trigger btn' href='#' data-target='dropdown1'>Drop Me!</a>

            <!-- Dropdown Structure -->
            <ul id='dropdown1' class='dropdown-content'>
                <li><a href="#!">one</a></li>
                <li><a href="#!">two</a></li>
                <li class="divider" tabindex="-1"></li>
                <li><a href="#!">three</a></li>
                <li><a href="#!"><i class="material-icons">view_module</i>four</a></li>
                <li><a href="#!"><i class="material-icons">cloud</i>five</a></li>
            </ul>
        </nav>
        <ul id="slide-out" class="sidenav">
            <li>
                <div class="user-view">
                    <div class="background">
                        <img src="img/sub-category-1.jpg">
                    </div>
                    <a href="#user"><img class="circle" src="img/02a477ee2d47e496ddf5340a3026da39.jpg"></a>
                    <a href="#name"><span class="white-text name">John Doe</span></a>
                    <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
                </div>
            </li>
            <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
            <li><a href="#!">Second Link</a></li>
            <li><div class="divider"></div></li>
            <li><a class="subheader">Subheader</a></li>
            <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
        </ul>
        <div class="row" style="padding: 20px 50px">
            <div class="col s12">
                <div class="col s12 m6 l16" style="">
                    <div class="row center" style="margin-top: 10px">
                        <span class="card-title" style="font-weight: 700; font-size: 23px; color: #505050">Área de Almacenamiento</span>
                    </div>
                    <section class="z-depth-2" style="border: 1px solid #505050; width: auto; height: auto; border-radius: 10px">   
                        <div class="row" style="padding: 20px">
                            <div class="col s12 m12 l4">
                                <div class="card">
                                    <div class="card-image">
                                        <img src="img/bg_card_bodega1.jpg" height="150px">
                                        <span class="card-title">Bodega General</span>
                                        <a href="menuV_Hangar.php" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">send</i></a>
                                    </div>
                                    <div class="card-content">
                                        <p>I am a very simple card.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m12 l4">
                                <div class="card"> 
                                    <div class="card-image">
                                        <img src="img/bg_card_bodega2.jpg" height="150px">
                                        <span class="card-title">Bodegas</span>
                                        <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">send</i></a>
                                    </div>
                                    <div class="card-content">
                                        <p>I am a very simple card.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col s12 m6 l16">
                    <div class="row center" style="margin-top: 10px">
                        <span class="card-title" style="font-weight: 700; font-size: 23px; color: #505050">Terminal T1</span>
                    </div>
                    <section class="z-depth-2" style="border: 1px solid #505050; width: auto; height: auto; border-radius: 10px">   
                        <div class="row" style="padding: 20px">
                            <div class="col s12 m12 l4">
                                <div class="card">
                                    <div class="card-image">
                                        <img src="img/sub-category-1.jpg" height="150px">
                                        <span class="card-title">asd</span>
                                        <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">send</i></a>
                                    </div>
                                    <div class="card-content">
                                        <p>I am a very simple card.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m12 l4">
                                <div class="card">
                                    <div class="card-image">
                                        <img src="img/sub-category-1.jpg" height="150px">
                                        <span class="card-title">asd</span>
                                        <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">send</i></a>
                                    </div>
                                    <div class="card-content">
                                        <p>I am a very simple card.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col s12 m6 l16">
                    <div class="row center" style="margin-top: 10px">
                        <span class="card-title" style="font-weight: 700; font-size: 23px; color: #505050;">Terminal T2</span>
                    </div>
                    <section class="z-depth-2" style="border: 1px solid #505050; width: auto; height: auto;  border-radius: 10px">   
                        <div class="row" style="padding: 20px">
                            <div class="col s12 m12 l4">
                                <div class="card">
                                    <div class="card-image">
                                        <img src="img/sub-category-1.jpg" height="150px">
                                        <span class="card-title">asd</span>
                                        <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">send</i></a>
                                    </div>
                                    <div class="card-content">
                                        <p>I am a very simple card.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m12 l4">
                                <div class="card">
                                    <div class="card-image">
                                        <img src="img/sub-category-1.jpg" height="150px">
                                        <span class="card-title">asd</span>
                                        <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">send</i></a>
                                    </div>
                                    <div class="card-content">
                                        <p>I am a very simple card.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col s12 m6 l16">
                    <div class="row center" style="margin-top: 10px">
                        <span class="card-title" style="font-weight: 700; font-size: 23px; color: #505050">Estacionamientos</span>
                    </div>
                    <section class="z-depth-2" style="border: 1px solid #505050; width: auto; height: auto; border-radius: 10px">   
                        <div class="row" style="padding: 20px">
                            <div class="col s12 m12 l4">
                                <div class="card">
                                    <div class="card-image">
                                        <img src="img/bg_card_hangares.jpg" height="150px">
                                        <span class="card-title">Hangares</span>
                                        <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">send</i></a>
                                    </div>
                                    <div class="card-content">
                                        <p>I am a very simple card.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m12 l4">
                                <div class="card">
                                    <div class="card-image">
                                        <img src="img/sub-category-1.jpg" height="150px">
                                        <span class="card-title">E. Terminal T1</span>
                                        <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">send</i></a>
                                    </div>
                                    <div class="card-content">
                                        <p>I am a very simple card.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m12 l4">
                                <div class="card">
                                    <div class="card-image">
                                        <img src="img/sub-category-1.jpg" height="150px">
                                        <span class="card-title">E. Terminal T2</span>
                                        <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">send</i></a>
                                    </div>
                                    <div class="card-content">
                                        <p>I am a very simple card.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <footer class="page-footer" style="background-color: #353535">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">SGV</h5>
                        <p class="grey-text text-lighten-4"></p>
                    </div>
                    <div class="col l2 s12">
                        <h5 class="white-text">Links</h5>
                        <ul>
                            <li><a class="grey-text text-lighten-1" href="#!">Link 1</a></li>
                            <li><a class="grey-text text-lighten-1" href="#!">Link 2</a></li>
                            <li><a class="grey-text text-lighten-1" href="#!">Link 3</a></li>
                            <li><a class="grey-text text-lighten-1" href="#!">Link 4</a></li>
                        </ul>
                    </div>
                    <div class="col l2 s12">
                        <h5 class="white-text">Links</h5>
                        <ul>
                            <li><a class="grey-text text-lighten-1" href="#!">Link 1</a></li>
                            <li><a class="grey-text text-lighten-1" href="#!">Link 2</a></li>
                            <li><a class="grey-text text-lighten-1" href="#!">Link 3</a></li>
                            <li><a class="grey-text text-lighten-1" href="#!">Link 4</a></li>
                        </ul>
                    </div>
                    <div class="col l2 s12">
                        <h5 class="white-text">Links</h5>
                        <ul>
                            <li><a class="grey-text text-lighten-1" href="#!">Link 1</a></li>
                            <li><a class="grey-text text-lighten-1" href="#!">Link 2</a></li>
                            <li><a class="grey-text text-lighten-1" href="#!">Link 3</a></li>
                            <li><a class="grey-text text-lighten-1" href="#!">Link 4</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright" style="background-color: #252525">
                <div class="container center">
                    Aerolíneas SGV © Derechos Reservados - 2022
                </div>
            </div>
        </footer>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                M.AutoInit();
            });
        </script>
    </body>
</html>
