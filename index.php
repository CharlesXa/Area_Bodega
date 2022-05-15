<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="img/iconLogin.png"/>
        <link href="Materialize/css/styleLogin.css" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <title>Iniciar sesión</title>
    </head>
    <body>
        <header class="header">
            <div class="nav-cont logo-nav">
                <img src="img/iconoBodega.png" width="50px" height="50px">
                <a>Bodega/Seguridad</a>
                <img src="img/favicon.png" width="50px" height="50px">
            </div>
        </header>
        <div class="container">
            <div class="forms">
                <div class="form login">
                    <span class="titulo">Iniciar sesión</span>
                    <form name="login" action="Controller/controller_login.php" method="post">
                        <div class="input-field">
                            <input type="text" name="txt_correo" placeholder="Correo electronico" id="email" required>
                            <i class="uil uil-envelope icon"></i>
                        </div>
                        <span id="emailVal"></span>
                        <div class="input-field">
                            <input type="password" name="txt_pass" class="passwd" placeholder="Contraseña" required>
                            <i class="uil uil-lock icon"></i>
                            <i class="uil uil-eye-slash mostrarPass"></i>
                        </div>
                        <!--<div class="checkbox-text">
                            <div class="checkbox-content">
                                <input type="checkbox" id="remember">
                                <label for="rememberme" class="text">Recordarme</label>
                            </div>
                        </div>-->
                        <div class="input-field button">
                            <input type="submit" value="Iniciar sesión" required>
                        </div>
                    </form>
                    <div class="login-singup">
                        <span class="text">¿Olvidaste tu contraseña?
                            <a href="#" class="text signup-link">Restablécela</a>
                        </span>
                    </div>
                </div>
                <div class="form forgotpass">
                    <span class="titulo">Reestablecer Contraseña</span>
                    <form action="mail/enviar.php" method="post">
                        <div class="input-field">
                            <input type="text" name="mail" placeholder="Correo electronico" id="txt_email" required>
                            <i class="uil uil-envelope icon"></i>
                        </div>
                        <span id="emailVal2"></span>
                        <div class="input-field button">
                            <input type="submit" name="btn_enviar" value="Restablecer">
                        </div>
                    </form>
                    <div class="login-singup">
                        <span class="text">
                            <a href="#" class="text login-link">Cancelar</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <span>
                SGV © Derechos Reservados - 2022
            </span>
        </footer>
        <script>
            document.getElementById("email").focus();
            const container = document.querySelector(".container");
            passwdShowHide = document.querySelectorAll(".mostrarPass");
            passwdFields = document.querySelectorAll(".passwd");
            singUp = document.querySelector(".signup-link");
            login = document.querySelector(".login-link");

            passwdShowHide.forEach(eyeIcon => {
                eyeIcon.addEventListener("click", () => {
                    passwdFields.forEach(passwdFields => {
                        if (passwdFields.type === "password") {
                            passwdFields.type = "text";
                            passwdShowHide.forEach(icon => {
                                icon.classList.replace("uil-eye-slash", "uil-eye");
                            })
                        } else {
                            passwdFields.type = "password";
                            passwdShowHide.forEach(icon => {
                                icon.classList.replace("uil-eye", "uil-eye-slash");
                            })
                        }
                    })
                })
            })

            singUp.addEventListener("click", () => {
                container.classList.add("active");
            })
            login.addEventListener("click", () => {
                container.classList.remove("active");
            })
            document.getElementById('email').addEventListener('input', function () {
                campo = event.target;
                valido = document.getElementById('emailVal');
                emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
                //Se muestra un texto a modo de ejemplo, luego va a ser un icono

                if (emailRegex.test(campo.value)) {
                    valido.innerText = "El correo es válido";
                } else {
                    valido.innerText = "El correo no es válido";
                }
                if (campo.value === "") {
                    valido.innerText = "";
                }
            }
            );
            document.getElementById('txt_email').addEventListener('input', function () {
                campo = event.target;
                valido = document.getElementById('emailVal2');
                emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
                //Se muestra un texto a modo de ejemplo, luego va a ser un icono

                if (emailRegex.test(campo.value)) {
                    valido.innerText = "El correo es válido";
                } else {
                    valido.innerText = "El correo no es válido";
                }
                if (campo.value === "") {
                    valido.innerText = "";
                }
            }
            );
        </script>
    </body>
</html>
