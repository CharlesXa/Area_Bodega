<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

include_once '../Model_Data.php';
$data=new Data();

$id = isset($_POST["txt_id"]) ? $_POST["txt_id"] : null;
$cantidad = isset($_POST["txt_cantidad"]) ? $_POST["txt_cantidad"] : null;

$data->updStock($id, $cantidad);
echo '<script language="javascript">alert("Actualizacion exitosa");window.location.href="../vistas_stock/actualizarStock.php"</script>';