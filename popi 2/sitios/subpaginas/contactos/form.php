<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = htmlspecialchars($_POST['name']);
    $apellido = htmlspecialchars($_POST['apellido']);
    $email = htmlspecialchars($_POST['email']);
    $mensaje = htmlspecialchars($_POST['comentario']);


    $destinatario = "sofitabarreyro@gmail.com";


    $asunto = "Nuevo mensaje de: $nombre";


    $contenido = "Has recibido un nuevo mensaje de tu formulario de contacto.\n\n";
    $contenido .= "Nombre: $nombre\n";
    $contenido .= "apellido: $apellido\n";
    $contenido .= "Correo Electrónico: $email\n";
    $contenido .= "Mensaje:\n$mensaje\n";


    $cabeceras = "From: $email" . "\r\n" .
                 "Reply-To: $email" . "\r\n" .
                 "X-Mailer: PHP/" . phpversion();


    if (mail($destinatario, $asunto, $contenido, $cabeceras)) {
        echo "Correo enviado con éxito.";
    } else {
        echo "Hubo un problema al enviar el correo.";
    }
} else {
    echo "Método no permitido.";
}
?>
