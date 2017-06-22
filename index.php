<?php

require_once 'vendor/autoload.php';

$parameters = [
    'host' => 'host',
    'port' => 'port',
    'username' => 'username',
    'password' => 'password',
    'subject' => 'subject',
    'target' => 'target'
];

$app = new ContactApi($parameters);

try {
    $data = json_decode(file_get_contents('php://input'), true);
    $message = sprintf('%s -  %s', $data['body'], $data['from']);
    $result = $app->send($message);

    if ($result) {
        header('Content-Type: application/json');
        echo json_encode(['status' => 'Success']);
    } else {
        header('Content-Type: application/json');
        echo json_encode(['status' => 'Error']);
    }
} catch (Exception $e) {
    header('Content-Type: application/json');
    echo json_encode(['status' => 'Error']);
}
