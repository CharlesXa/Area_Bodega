<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Ingresando Stock</title>
        <link rel="stylesheet" href="../Materialize/css/styleBody.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"/>
    </head>
    <body style="background-image: url('../img/imgLogin.png')">
        <script>
            function ingreso() {
                swal({
                    title: "Ingresado",
                    text: "Stock ingresado correctamente",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../vistas_stock/ingresarStock.php';
                        });
            }
            function error() {
                swal({
                    title: "Error",
                    text: "Campos incompletos o stock no ingresado",
                    type: "error",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../vistas_stock/ingresarStock.php';
                        });
            }

        </script>
    </body>
</html>

<?php
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

include_once '../Model_Data.php';
$data = new Data();

$nombre = isset($_POST["txt_nombre"]) ? $_POST["txt_nombre"] : null;
$cantidad = isset($_POST["txt_cantidad"]) ? $_POST["txt_cantidad"] : null;
$area = isset($_POST["cbo_area"]) ? $_POST["cbo_area"] : null;
$descripcion = isset($_POST["txt_descrip"]) ? $_POST["txt_descrip"] : null;

if($nombre && $cantidad && $area && $descripcion){
    $data->addStock($nombre, $cantidad, $descripcion, $area);
    echo '<script>ingreso();</script>';
}else{
    echo '<script>error();</script>';
}

//echo $nombre." ".$cantidad." ".$area." ".$descripcion;



