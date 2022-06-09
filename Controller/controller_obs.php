<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Ingresando Reporte</title>
        <link rel="stylesheet" href="../Materialize/css/styleBody.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"/>
    </head>
    <body style="background-image: url('../img/imgLogin.png')">
        <script>
            function envioS() {
                swal({
                    title: "Enviado",
                    text: "Se ha generado el reporte",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../menuSeguridad.php';
                        });
            }
            
            function envioB() {
                swal({
                    title: "Enviado",
                    text: "Se ha generado el reporte",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../menuBodega.php';
                        });
            }
        </script>
    </body>
</html>
<?php
include_once '../Model_Data.php';
session_start();
$user = $_SESSION['id'];
$area = $_SESSION['area_usuario'];
$rut = isset($_POST['txt_rut']) ? $_POST['txt_rut'] : null;
$nombre = isset($_POST['txt_nombre']) ? $_POST['txt_nombre'] : null;
$apellido = isset($_POST['txt_apellido']) ? $_POST['txt_apellido'] : null;
$gravedad = isset($_POST['cbo_gravedad']) ? $_POST['cbo_gravedad'] : null;
$date = isset($_POST['txt_fecha']) ? $_POST['txt_fecha'] : null;
$hora = isset($_POST['txt_hora']) ? $_POST['txt_hora'] : null;
$obs = isset($_POST['area_obs']) ? $_POST['area_obs'] : null;

$txtGravedad;
$time = strtotime($date);
$newformat = date('Y-m-d', $time);

//traductor de variables

switch ($gravedad) {
    case 1:
        $txtGravedad = 'Leve';
        break;
    case 2:
        $txtGravedad = 'Media';
        break;
    case 3:
        $txtGravedad = 'Grave';
        break;
    default :
        break;
}

$data = new Data();
echo $rut . " " . $nombre . " " . $apellido . " " . $txtGravedad . " " . $newformat . " " . $hora . " " . $obs;
$data->addObs($user, $txtGravedad, $newformat, $hora, $obs, $area);

if($area == 1){
    echo '<script>envioB();</script>';
}else if($area == 2){
    echo '<script>envioS();</script>';
}
?>
