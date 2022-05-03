<?php
//error_reporting(0);
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
        $rs = $data->getUserbyRut($rut);
        foreach ($rs as $key){
            $_SESSION['Rut'] = $key['rut'];
            $_SESSION['tipo_usuario'] = $key['tipo_usuario_id_fk'];
        }
        
        
        switch ($_SESSION['tipo_usuario']){
            case 1:
                echo '<script language="javascript">alert("Bienvenido E. Bodega");window.location.href="../menuBodega.php"</script>';
                break;
            case 2:
                echo '<script language="javascript">alert("Bienvenido E. Seguridad");window.location.href="../menuSeguridad.php"</script>';
                break;
            default:
                header("location: ../index.php");
        }      
    } else if(!$valid){
        echo '<script language="javascript">alert("Error de autentificacion o El Usuario esta Inactivo");window.location.href="../index.php"</script>';
    }
} else {
    header("location: ../index.php");
}