<?php
include("dp.php");
$query = "SELECT * FROM students";
$result = mysqli_query($conn, $query);
if (!$result) {
    echo json_encode([
        "success" => false,
        "message" => "Query failed: " . mysqli_error($conn)
    ]);
    exit;
}
$students = [];// Array 
while ($row = mysqli_fetch_assoc($result)) {
    $students[] = [
        "id" => $row['Id'],
        "name" => $row['name'],
        "age" => $row['age']
    ];
}
echo json_encode([
    "success" => true,
    "students" => $students
]);

mysqli_close($conn);
?>
