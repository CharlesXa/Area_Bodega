<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

include_once '../Model_Data.php';
$data=new Data();

$nombre = isset($_POST["txt_nombre"]) ? $_POST["txt_nombre"] : null;
$cantidad = isset($_POST["txt_cantidad"]) ? $_POST["txt_cantidad"] : null;
$area = isset($_POST["cbo_area"]) ? $_POST["cbo_area"] : null;
$descripcion = isset($_POST["txt_descrip"]) ? $_POST["txt_descrip"] : null;

//echo $nombre." ".$cantidad." ".$area." ".$descripcion;
echo '<script language="javascript">alert("Ingreso Exitoso de '.$nombre.' ");window.location.href="../vistas_stock/ingresarStock.php"</script>';
$data->addStock($nombre, $cantidad, $descripcion, $area);

