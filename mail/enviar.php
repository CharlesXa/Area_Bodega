<?php
require("class.phpmailer.php");
require("class.smtp.php");
include_once '../Model_Data.php';

$data = new Data();

// Valores enviados desde el formulario
if ($_POST["btn_enviar"]) {
    $email = $_POST["mail"];
    $user = $data->getUserbyemail($email);
    
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

    $mail->Subject = "Formulario desde el Sitio Web"; // Este es el titulo del email.
    $mensajeHtml = nl2br($mensaje);
    $mail->Body = "
    <html> 

    <body> 

    <h1>Recibiste un nuevo mensaje desde el formulario de contacto</h1>

    <p>Informacion enviada por el usuario de la web:</p>

    <p>nombre: {$user->getNombre()}</p>

    <p>telefono: {$user->getTelefono()}</p>

    <p>mensaje: {$mensaje}</p>

    </body> 

    </html>

    <br />"; // Texto del email en formato HTML
    $mail->AltBody = "{$mensaje} \n\n "; // Texto sin formato HTML
    // FIN - VALORES A MODIFICAR //

    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );


    if ($mail->Send()) {
        echo "El correo fue enviado correctamente.";
        header("location:../index.php");
    } else {
        echo "Ocurrió un error inesperado.";
    }
    
}
?>

