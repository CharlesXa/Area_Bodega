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
        <link href="Materialize/css/styleLogin.css" rel="stylesheet">
        <title>LogIn</title>
    </head>
    <body>
        <div class="container">
            <input type="checkbox" id="flip">
            <div class="cover">
                <div class="front">
                  <!--<img src="images/frontImg.jpg" alt="">-->
                </div>
                <div class="back">
                  <!--<img class="backImg" src="images/backImg.jpg" alt="">-->
                </div>
            </div>
            <div class="forms">
                <div class="form-content">
                    <div class="login-form">
                        <div class="title">Iniciar Sesion</div>
                        <form name="login" action="Controller/controller_login.php" method="post">
                            <div class="input-boxes">
                                <div class="input-box">
                                    <i class="fas fa-envelope"></i>
                                    <input id="rut" name="txt_rut" type="text" placeholder="R.U.T" required>
                                </div>
                                <div class="input-box">
                                    <i class="fas fa-lock"></i>
                                    <input name="txt_pass" type="password" placeholder="Password" required>
                                </div>
                                <div class="button input-box">
                                    <input type="submit" value="Ingresar">
                                </div>
                                <div class="text sign-up-text">¿Olvidaste tu contraseña? <label for="flip">Reestablecela</label></div>
                            </div>
                        </form>
                    </div>
                    <div class="signup-form">
                        <div class="title">Reestablecer Contraseña</div>
                        <form action="mail/enviar.php" method="post">
                            <div class="input-boxes">
                                <div class="input-box">
                                    <i class="fas fa-envelope"></i>
                                    <input name="mail" id="txt_email" type="text" placeholder="Ingresa Tu Email" required>
                                </div>
                                <div class="button input-box">
                                    <input name="btn_enviar" type="submit" value="Reestablecer">
                                </div>
                                <div class="text sign-up-text"><label for="flip">Cancelar</label></div>
                            </div>
                        </form>
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
