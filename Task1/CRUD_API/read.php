<?php
include ("dp.php");
$users = $conn->query("SELECT * FROM `users`");
while ($row = $users->fetch_assoc()) {
    echo"<br>".$row["id"]."<br>".$row["Fname"]." <br>".$row["Lname"]."<br>".$row["age"];
}