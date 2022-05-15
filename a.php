<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

include_once './Model_Data.php';

$data = new Data();

$user =$data->getAllUsers();

foreach ($user as $key){
    echo '<tr>
        <td>'.$key['rut'].'</td>
        <td>'.$key['nombre'].'</td>
        <td>'.$key['apellido'].'</td>
        <td>'.$key['email'].'</td>
        <td>'.$key['telefono'].'</td>
        <td>'.$key['nombre'].'</td>
        <td>'.$key['nombre'].'</td>
        
    </tr>
    <br>';
}