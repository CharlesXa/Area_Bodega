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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="js/jquery.rut.js"></script>
        <title>LogIn</title>
    </head>
    <body>
        <div class="container">
            <div class="row" style="margin-top: 10%">
                <div class="col s6 offset-s3">
                    <div class="row">
                        <div class="col s12">
                            <form method="post" action="Controller/controller_login.php">
                                <div class="card" style="background-color: whitesmoke; border-radius: 10px">
                                    <div class="card-content">
                                        <span class="card-title" align="center">Iniciar Sesion</span>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <i class="material-icons prefix">account_circle</i>
                                                <input id="rut" name="txt_rut" type="text" class="validate" required>
                                                <label for="rut">R.U.T</label>
                                            </div>
                                            <div class="input-field col s12">
                                                <i class="material-icons prefix">lock_open</i>
                                                <input id="passwd" name="txt_pass" type="password" class="validate" required>
                                                <label for="passwd">Password</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-action" style="border-radius: 10px">
                                        <div class="row">
                                            <button class="btn waves-effect waves-light col s6 offset-s3" type="submit" name="action">Iniciar Sesion
                                                <i class="material-icons right">send</i>
                                            </button>
                                            <!--<input class="waves-effect waves-light btn col s12" style="background-color: #009688" type="submit" value="Ingresar">-->
                                        </div>      
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(function () {
                $("input#rut").rut({
                    formatOn: 'keyup',
                    minimumLength: 8, // validar largo mínimo; default: 2
                    validateOn: 'change' // si no se quiere validar, pasar null
                });
                var input = document.getElementById('rut');
                input.addEventListener('input', function () {
                    if (this.value.length >= 13)
                        this.value = this.value.slice(0, 12);
                })
            })
        </script>
    </body>
</html>
