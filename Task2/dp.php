<?php
$host = "localhost";
$user_name = "root";
$pass ="";
$dp_name ="crud_api";
$conn =new mysqli($host, $user_name, $pass, $dp_name);
if ($conn->connect_error) {
    echo " connection field ". $conn->connect_error ;
}