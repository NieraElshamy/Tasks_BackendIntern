<?php
include("dp.php");
if ( isset( $_POST["add_students"] ) ) {
    $name = $_POST["name"];
    $age = $_POST["age"];
    if(empty($name)) {
        header("location:index.php?message=You need to fill in name !");
} else {
    $query="INSERT INTO `info` ( `Id`,`name`, `age`) VALUES (NULL, '$name', '$age')";
    $result=mysqli_query($conn ,  $query);
    if(!$result){
        die("Query Faild".mysqli_error($conn));
    }
    else{
        header("location:index.php?insert_msg=Your Data Added Successfully");
    }
}
}
?>