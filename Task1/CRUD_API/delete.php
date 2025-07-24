<?php
include("dp.php");
$uSerS = $conn->query("DELETE FROM `products` WHERE `products`.`id` = 3");
$uSerS = $conn->query("SELECT * FROM `products`");
while ($row = $uSerS->fetch_assoc()) {
    echo"<br>".$row["id"]."<br>".$row["PRO_name"]." <br>".$row["amount"];
}