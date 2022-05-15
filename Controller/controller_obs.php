<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    </body>
</html>
<?php
include_once '../Model_Data.php';
session_start();
$user = $_SESSION['id'];
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
$data->addObs($user, $txtGravedad, $newformat, $hora, $obs);

//Nick, falta alert de redireccion porfi
?>
