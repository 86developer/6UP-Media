<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Recibe los datos del formulario
  $name = $_POST["name"];
  $email = $_POST["email"];
  $subject = $_POST["subject"];
  $message = $_POST["message"];

  // Destinatario del correo electrónico
  $to = "nunezspinelli8@gmail.com";

  // Cuerpo del correo electrónico
  $body = "Nombre: $name\n";
  $body .= "Correo electrónico: $email\n";
  $body .= "Asunto: $subject\n";
  $body .= "Mensaje:\n$message";

  // Cabeceras del correo electrónico
  $headers = "From: $name <$email>";

  // Envía el correo electrónico
  if (mail($to, $subject, $body, $headers)) {
    // Si se envía correctamente, responde con un código de estado 200 y un mensaje JSON
    http_response_code(200);
    echo json_encode(["message" => "Email sent successfully"]);
  } else {
    // Si hay un error al enviar el correo electrónico, responde con un código de estado 500 y un mensaje JSON
    http_response_code(500);
    echo json_encode(["message" => "Error sending email"]);
  }
} else {
  // Si no es una solicitud POST, responde con un código de estado 200 y un mensaje JSON
  http_response_code(200);
  echo json_encode(["message" => "File available"]);
}
?>
