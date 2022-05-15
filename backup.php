<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"/>
    </head>
    <body style="background-image: url('img/fondo.png')">
        <script>
            function Backup() {
                swal({
                    title: "Completado!",
                    text: "Se ha respaldado la base de datos",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = 'menuAdmin.php';
                        });
            }
            
        </script>
    </body>
</html>


<?php
include_once "Mysqldump.php";
$dump = new Ifsnop\Mysqldump\Mysqldump('mysql:host=localhost;dbname=areabodega_1', 'root', '');

$fecha = date("Ymd - His");
$dump->start('C:\xampp\htdocs\Area_Bodega\Area_Bodega\BackUps\BackUp' . $fecha . '.sql');

echo "<script>Backup();</script>";

?>
