<?php

use ContactApi\Controller\FrontController;


ini_set("display_errors",1);
error_reporting(E_ALL);

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
