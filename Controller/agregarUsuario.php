<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Agregando usuario</title>
        <link rel="stylesheet" href="../Materialize/css/styleBody.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"/>
    </head>
    <body style="background-image: url('../img/imgLogin.png')">
        <script>
            function ingreso() {
                swal({
                    title: "Ingresado",
                    text: "Usuario ingresado correctamente",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../menuAdmin.php';
                        });
            }
            function error() {
                swal({
                    title: "Error",
                    text: "Campos incompletos o usuario no ingresado",
                    type: "error",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../menuAdmin.php';
                        });
            }

        </script>
    </body>
</html>
<?php
include_once '../Model_Data.php';
$data = new Data();
$rut = isset($_POST["txt_rut"]) ? $_POST["txt_rut"] : null;
$nombre = isset($_POST["txt_nombre"]) ? $_POST["txt_nombre"] : null;
$apellido = isset($_POST["txt_apellido"]) ? $_POST["txt_apellido"] : null;
$email_l = isset($_POST["txt_email"]) ? $_POST["txt_email"] : null;
$telefono = isset($_POST["txt_telefono"]) ? $_POST["txt_telefono"] : null;
$area = isset($_POST["cbo_area"]) ? $_POST["cbo_area"] : null;
$passwT = substr($rut, 0, 6) . substr($nombre, 0, 3);

echo $passwT;
/* if ($rut && $nombre && $apellido && $email && $telefono && $area && $passwT){
  $data->addUser($rut, $nombre, $apellido, $email, $telefono, $area, $passwT);
  echo'<script>ingreso();</script>';
  }else{
  echo'<script>error();</script>';
  } */

require("../mail/class.phpmailer.php");
require("../mail/class.smtp.php");
include_once '../Model_Data.php';

// Valores enviados desde el formulario
    $email = $email_l;

// Datos de la cuenta de correo utilizada para enviar vía SMTP
    $smtpHost = "smtp.gmail.com";  // Dominio alternativo brindado en el email de alta 
    $smtpUsuario = "areabodega.quokkas@gmail.com";  // Mi cuenta de correo
    $smtpClave = "quokkateam2022";  // Mi contraseña

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->Port = 587;
    $mail->IsHTML(true);
    $mail->CharSet = "utf-8";

// VALORES A MODIFICAR //
    $mail->Host = $smtpHost;
    $mail->Username = $smtpUsuario;
    $mail->Password = $smtpClave;

    $mail->From = $email; // Email desde donde envío el correo.
    $mail->FromName = "Quokka Team B&S";
    $mail->AddAddress($email); // Esta es la dirección a donde enviamos los datos del formulario

    $mail->Subject = "Bienvenido a " + $area; // Este es el titulo del email.
    //$mensajeHtml = nl2br($mensaje);
    $mail->Body = '
    <html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <!--Copia desde aquí-->
        <table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">
            <tr>
                <td style="background-color: #ecf0f1">
                    <div style="color: #34495e; margin: 4% 10% 2%; text-align: justify;font-family: sans-serif">
                        <h2 style="color: #e67e22; margin: 0 0 7px">Solicitud de cambio de contraseña</h2>
                        <p style="font-weight: bold">Estimado ' . $nombre . ' ' . $apellido . '.</p>
                        <p style="margin: 2px; font-size: 15px">Has solicitado el cambio de tu contraseña. te hemos proporcionado una clave temporal para que inicies sesion, una vez iniciada la sesion podrás cambiar la contraseña a tu gusto.</p>
                        <p>Su clave temporal es: </p>
                        <p style="font-weight: bold; font-size: 40px" align="center">' . $passwT . '</p>
                        <p style="color: #b3b3b3; font-size: 12px; text-align: center;margin: 30px 0 0">S.G.V © Derechos Reservados - 2022</p>
                    </div>
                </td>
            </tr>
        </table>
        <!--hasta aquí-->
    </body>

    </html>

    <br />'; // Texto del email en formato HTML
    //$mail->AltBody = "{$mensaje} \n\n "; // Texto sin formato HTML
    // FIN - VALORES A MODIFICAR //

    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    if ($mail->Send()) {
        echo '<script>ingreso();</script>';
        $data->addUser($rut, $nombre, $apellido, $email, $telefono, $area, $passwT);
    } else {
        echo '<script>error();</script>';
    }

?>
