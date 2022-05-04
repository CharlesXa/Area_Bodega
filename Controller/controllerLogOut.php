<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

session_start();
session_unset();
session_destroy();
echo '<script language="javascript">alert("Sesion cerrada correctamente");</script>';
echo "<script> window.location.replace('../index.php') </script>";
?>