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
        <?php
        // put your code here
        ?>
    </body>
</html>
<?php
    include_once '../Model_Data.php';
    $rut=$_POST['rut'];
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $email=$_POST['email'];
    $telefono=$_POST['telefono'];
    $area=$_POST['area'];
    
    
    echo $rut." ".$nombre." ".$apellido." ".$email." ".$telefono." ".$area;
    
    $data=new Data();
    
    $data->updUser($email, $telefono, $area,$rut);
    
    echo true;
?>