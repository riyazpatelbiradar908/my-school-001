<?php
session_start();
require_once('apiHeader.php');

$res = [
    'status' => 200,
    'token' => session_id(),
    'message' => 'successfully logged in',
    'server' => $_SERVER,
    'post' => $_POST
];

header('Content-Type: application/json');
http_response_code($res['status']);
echo json_encode($res);
