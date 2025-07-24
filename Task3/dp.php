<?php
header('Content-Type: application/json'); 
$host = "localhost";
$user_name = "root";
$pass = "";
$dp_name = "students_db";

$conn = new mysqli($host, $user_name, $pass, $dp_name);
if ($conn->connect_error) {
    echo json_encode([
        "success" => false,
        "message" => "Database connection failed",
        "error" => $conn->connect_error
    ]);
    exit(); 
}
?>