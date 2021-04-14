<?php
session_start();
// require_once('apiHeader.php');

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = trim(file_get_contents("php://input"));
    $data = json_decode($data, true);
    
    $username = (isset($data['username'])) ? $data['username'] : '';
    $password = (isset($data['password'])) ? $data['password'] : '';
    $res = [
        'status' => 200,
        'token' => session_id(),
        'message' => 'successfully logged in',        
        'data' => $data
    ];
} else {
  $res = [
        'status' => 404,
        'message' => 'Invalid credentials'
    ];   
}


header('Content-Type: application/json');
http_response_code($res['status']);
echo json_encode($res);
