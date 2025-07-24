<?php
header('Content-Type: application/json');
include("dp.php");
if (isset($_GET['Id'])) {
    $id = $_GET['Id'];
    $query = "DELETE FROM students WHERE Id = '$id'";
    $results = mysqli_query($conn, $query);
    if (!$results) {
        echo json_encode([
            "success" => false,
            "message" => "Failed to delete",
            "error" => mysqli_error($conn)
        ]);
    } else {
        echo json_encode([
            "success" => true,
            "message" => "Student with ID $id has been deleted"
        ]);
    }
} else {
    echo json_encode([
        "success" => false,
        "message" => "No ID provided"
]);
}
?>