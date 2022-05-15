<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"/>
    </head>
    <body style="background-image: url('../img/fondo.png')">
        <script>
            function Envio() {
                swal({
                    title: "Enviado",
                    text: "Correo enviado! \n Revisa tu bandeja de entrada",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../index.php';
                        }
                );
            }
        </script>
    </body>
</html>

<?php
require("class.phpmailer.php");
require("class.smtp.php");
include_once '../Model_Data.php';

$data = new Data();

$caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
$longitud = 10;
$clave_t = substr(str_shuffle($caracteres), 0, $longitud);

// Valores enviados desde el formulario
if ($_POST["btn_enviar"]) {
    $email = $_POST["mail"];
    $user = $data->getUserbyemail($email);
    $data->updatePass($user->getRut(), $clave_t, 1);

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
    $mail->FromName = $user->getNombre();
    $mail->AddAddress($email); // Esta es la dirección a donde enviamos los datos del formulario

    $mail->Subject = "Solitud para cambiar la contraseña"; // Este es el titulo del email.
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
                        <p style="font-weight: bold">Estimado ' . $user->getNombre() . ' ' . $user->getApellido() . '.</p>
                        <p style="margin: 2px; font-size: 15px">Has solicitado el cambio de tu contraseña. te hemos proporcionado una clave temporal para que inicies sesion, una vez iniciada la sesion podrás cambiar la contraseña a tu gusto.</p>
                        <p>Su clave temporal es: </p>
                        <p style="font-weight: bold; font-size: 40px" align="center">' . $clave_t . '</p>
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
        echo '<script>Envio();</script>';
    } else {
        echo "Ocurrió un error inesperado.";
    }
}
?>

