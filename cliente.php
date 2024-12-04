<?php
// URL del Webhook
$url = 'http://localhost:8000/webhook.php';

// Datos que deseas enviar
$data = [
    'action' => 'test'
];

// Inicializar una sesión cURL
$ch = curl_init($url);

// Configuración para la solicitud POST
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Obtener respuesta en lugar de imprimirla
curl_setopt($ch, CURLOPT_POST, true); // Solicitud POST
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); // Los datos a enviar (convertidos a JSON)
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json', // Especificamos que estamos enviando JSON
    'Content-Length: ' . strlen(json_encode($data)) // Longitud del cuerpo
]);

// Ejecutar la solicitud y obtener la respuesta
$response = curl_exec($ch);

// Verificar si hubo algún error
if ($response === false) {
    echo 'Error en la solicitud cURL: ' . curl_error($ch);
} else {
    // Mostrar la respuesta recibida desde el Webhook
    echo 'Respuesta del servidor Webhook: ' . $response;
}

// Cerrar la sesión cURL
curl_close($ch);
?>
