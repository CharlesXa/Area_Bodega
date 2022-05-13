<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"/>
    </head>
    <body style="background-image: url('../img/fondo.png')">
        <script>
            function Salir() {
                swal({
                    title: "Cerrando Sesion",
                    text: "Has cerrado sesion correctamente",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../index.php';
                        });
            }
        </script>
    </body>
</html>

<?php
session_start();
session_unset();
session_destroy();
echo '<script>Salir();</script>';
?>
