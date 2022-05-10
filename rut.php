<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="js/validarut.js"></script>
    </head>
    <body>
        <form method="post" name="complemento3">
            <input type="text" name="txt_rut" id="rut" onchange="javascript:return Rut(document.complemento3.rut.value)">
            <input type="submit" name="btn_registrar" value="Registrar">
        </form>
    </body>
</html>
