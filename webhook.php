<?php
// Servidor webhook.php

// Configuración de logs para depurar solicitudes.
file_put_contents('webhook.log', date('Y-m-d H:i:s') . " - Webhook triggered\n", FILE_APPEND);

// Leer el contenido del cuerpo de la solicitud (JSON).
$body = file_get_contents('php://input');

// Registrar el contenido del cuerpo en un archivo de log para inspección.
file_put_contents('webhook.log', $body . "\n", FILE_APPEND);

// Decodificar el JSON recibido.
$data = json_decode($body, true);

// Responder según el contenido recibido.
if (isset($data['action']) && $data['action'] === 'test') {
    // Si el 'action' recibido es "test", responder con un mensaje específico.
    $response = [
        'status' => 'success',
        'message' => 'Test action received successfully!'
    ];
} else {
    // Responder con un mensaje genérico si no se reconoce la acción.
    $response = [
        'status' => 'error',
        'message' => 'Unrecognized action.'
    ];
}

// Enviar la respuesta como JSON
header('Content-Type: application/json');
echo json_encode($response);
?>

