<?Php include("dp.php");?>
<?Php
if(isset($_GET['Id'])){
    $Id=$_GET['Id'] ;
    $query="DELETE FROM info WHERE`Id` = '$Id'";
    $results= mysqli_query($conn, $query) ;
    if(!$results){
            die("query faild".mysqli_error($conn));
        }
        else{
             header('location:index.php?delete_msg=You have deletd data');
          }
}
?>
