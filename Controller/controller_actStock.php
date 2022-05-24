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
            function update() {
                swal({
                    title: "Actualizado",
                    text: "Stock actualizado correctamente",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../vistas_stock/actualizarStock.php';
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
                            window.location.href = '../vistas_stock/actualizarStock.php';
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
$data=new Data();

$id = isset($_POST["txt_id"]) ? $_POST["txt_id"] : null;
$cantidad = isset($_POST["txt_cantidad"]) ? $_POST["txt_cantidad"] : null;

if($id && $cantidad){
    $data->updStock($id, $cantidad);
    echo '<script>update();</script>';
}else{
    echo '<script>error();</script>';
}


