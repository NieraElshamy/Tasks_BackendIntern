<?php
header('Content-Type: application/json');
include("dp.php");
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['Id'])) {
    $id = $_GET['Id'];
    $query = "SELECT * FROM students WHERE Id = $id";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo json_encode([
            "success" => false,
            "message" => "Query failed",
            "error" => mysqli_error($conn)
        ]);
        exit;
    }
    if (mysqli_num_rows($result) === 0) {
        echo json_encode([
            "success" => false,
            "message" => "Student not found"
        ]);
        exit;
    }
    $row = mysqli_fetch_assoc($result);
    echo json_encode([
        "success" => true,
        "student" => [
            "id" => $row["Id"],
            "name" => $row["name"],
            "age" => $row["age"]
        ]
    ]);
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['Id'])) {
    $id = $_GET['Id'];
    $name = $_POST['name'] ?? null;
    $age = $_POST['age'] ?? null;
    if (!$name || !$age) {
        echo json_encode([
            "success" => false,
            "message" => "Name and age are required"
        ]);
        exit;
    }
    $query = "UPDATE students SET name = '$name', age = '$age' WHERE Id = $id";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo json_encode([
            "success" => false,
            "message" => "Update failed",
            "error" => mysqli_error($conn)
        ]);
    } else {
        echo json_encode([
            "success" => true,
            "message" => "Student updated successfully",
            "updated_id" => $id
        ]);
    }
    exit;
}
echo json_encode([
    "success" => false,
    "message" => "Invalid-request"
]);
?>