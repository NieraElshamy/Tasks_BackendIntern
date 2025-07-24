<?php
header('Content-Type: application/json');
include("dp.php");
if (isset($_POST["name"]) && isset($_POST["age"])) {
    $name = $_POST["name"];
    $age = $_POST["age"];
    if (empty($name)) {
        echo json_encode([
            "success" => false,
            "message" => "You need to fill in the name!"
        ]);
        exit();
    }
    $query = "INSERT INTO students (Id,name,age) VALUES (NULL, '$name', '$age')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo json_encode([
            "success" => false,
            "message" => "Insert failed",
            "error" => mysqli_error($conn)
        ]);
    } else {
        echo json_encode([
            "success" => true,
            "message" => "Data added successfully",
            "inserted_id" => mysqli_insert_id($conn)
        ]);
    }
} else {
    echo json_encode([
        "success" => false,
        "message" => "Missing required fields"
]);
}
?>