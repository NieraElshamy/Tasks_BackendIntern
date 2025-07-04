<?php
include("dp.php");
$users = $conn->query("UPDATE `products` SET `amount` = '150' WHERE `products`.`id` = 2
");
$uSerS = $conn->query("SELECT * FROM `products`");
while ($row = $uSerS->fetch_assoc()) {
    echo"<br>".$row["id"]."<br>".$row["PRO_name"]." <br>".$row["amount"];
}
