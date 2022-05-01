<?php
error_reporting(0);
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

include_once '../Model_Data.php';

session_start();

/** @var type $_POST */
$rut = isset($_POST["txt_rut"]) ? $_POST["txt_rut"] : null;
$pass = isset($_POST["txt_pass"]) ? $_POST["txt_pass"] : null;


$data = new Data();

if ($rut && $pass) {
    
    $valid=$data->isUserPassValid($rut, $pass);
    if ($valid) {
        
        echo '<script language="javascript">alert("Hola");window.location.href="../Home.php"</script>';
    } else if(!$valid){
        echo '<script language="javascript">alert("Error de autentificacion o El Usuario esta Inactivo");window.location.href="../index.php"</script>';
    }
} else {
    header("location: ../index.php");
}