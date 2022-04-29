<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="Materialize/css/materialize.css">
        <script src="Materialize/js/materialize.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>LogIn</title>
    </head>
    <body>
        <div class="container">
            <div class="row" style="margin-top: 15%">
                <div class="col s6 offset-s3">
                    <div class="row">
                        <div class="col s12">
                            <form action="action">
                                <div class="card" style="background-color: whitesmoke">
                                    <div class="card-content">
                                        <span class="card-title" align="center">Iniciar Sesion</span>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <i class="material-icons prefix">account_circle</i>
                                                <input id="txt_user" type="text">
                                                <label for="txt_user">Nombre usuario</label>
                                            </div>
                                            <div class="input-field col s12">
                                                <i class="material-icons prefix">lock_open</i>
                                                <input id="txt_pass" type="password">
                                                <label for="txt_pass">Password</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <div class="row">
                                            <input class="waves-effect waves-light btn col s12" style="background-color: #009688" type="submit" value="Ingresar">
                                        </div>      
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
