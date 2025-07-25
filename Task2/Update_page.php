<?php include("header.php");?>
<?php include("dp.php");?>
 <?php
if(isset($_GET['Id'])) {
    $Id = $_GET['Id'];
        $query = "SELECT * FROM `info` WHERE `Id` = $Id ";
        $results = mysqli_query($conn,$query);
        if(!$results){
            die("query faild".mysqli_error($conn));
        }
        else{
            $row=mysqli_fetch_assoc($results);
            
          }
        }         
          ?>
<form action="Update_page.php?id_new=<?php echo $Id ;?>" method="post" >
<div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo $row['name']?>">
          </div>
          <div class="form-group">
            <label for="age">Age</label>
            <input type="text" name="age" class="form-control" value="<?php echo $row['age']?>">
          </div>
          <input type="submit" class="btn btn-success" name="Update_students" value="Update">
</form>

<?php
if(isset($_POST["Update_students"])) {
  if(isset($_GET["id_new"])) {
    $idnew=$_GET["id_new"];
  }
  $name= $_POST['name'];
  $age= $_POST['age'];
  $query="UPDATE `info` SET `name` = '$name' , `age` = '$age'  WHERE `Id` = $idnew";
  $results = mysqli_query($conn,$query);
        if(!$results){
            die("query faild".mysqli_error($conn));
         }
        else{
          header('location:index.php?update_msg=You have successfully updated data ');
        }
      }
?>
<?php include("Foter.php");?>