<?php

use ContactApi\Controller\FrontController;


if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");
    exit;
}

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

require_once 'vendor/autoload.php';

$parameters = [
    'host' => 'host',
    'port' => 'port',
    'address' => 'address',
    'username' => 'username',
    'password' => 'password',
    'subject' => 'subject',
    'target' => 'target'
];

$app = new FrontController($parameters);
$app->handle();
