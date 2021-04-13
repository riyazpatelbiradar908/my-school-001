<?php
session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $data = trim(file_get_contents("php://input"));
    $data = json_decode($data, true);
    
    $username = $data['username'];
    $password = $data['password'];
    if($username === 'admin' && $password === 'admin') {
        $res = [
            'status' => 200,
            'token' => session_id(),
            'message' => 'successfully logged in'
        ];
    } else {
        $res = [
            'status' => 404,
            'message' => 'Invalid credentials'
        ];
    }
    
} else {
    $res = [
        'status' => 404,
        'message' => 'Invalid credentials'
    ];
}

header('Content-Type: application/json');
http_response_code($res['status']);
echo json_encode($res);
