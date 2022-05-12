<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

include_once '../Model_Data.php';
session_start();

$rut = $_SESSION['rut'];
$pass = isset($_POST["txt_pass"]) ? $_POST["txt_pass"] : null;
$pass2 = isset($_POST["txt_pass2"]) ? $_POST["txt_pass2"] : null;

$data = new Data();

if($pass && $pass2){
    if($pass == $pass2){
        $data->updatePass($rut, $pass, 0);
        echo '<script language="javascript">alert("Contraseña modificada con exito! debes iniciar sesion nuevamente");window.location.href="../index.php"</script>';
    }
    else{
        echo '<script language="javascript">alert("las contraseñas deben ser iguales");window.location.href="../menuBodega.php"</script>';
    }
}else{
    echo '<script language="javascript">alert("rellena ambos campos");window.location.href="../menuBodega.php"</script>';
}

