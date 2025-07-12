<?php
header('Content-Type: application/json');
include("dp.php");
$query = "SELECT * FROM students";
$results = mysqli_query($conn, $query);
if (!$results) {
    echo json_encode([
        "success" => false,
        "message" => "Query failed",
        "error" => mysqli_error($conn)
    ]);
    exit;
}
$data = []; //Array 
while ($row = mysqli_fetch_assoc($results)) {
    $data[] = [
        "id" => $row["Id"],// اسم ال col  "Id"
        "name" => $row["name"],
        "age" => $row["age"],
        "update_url" => "Update_page.php?Id=" . $row["Id"],
        "delete_url" => "Delete_page.php?Id=" . $row["Id"]
    ];
}
echo json_encode([
    "success" => true,
    "count" => count($data),
    "students"=>$data
]);
?>