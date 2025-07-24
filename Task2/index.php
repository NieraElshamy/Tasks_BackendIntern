<?php include("header.php");?>
<?php include("dp.php");?>
<div class ="click">
    <h2> All Students </h2>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"> Add Student</button>
</div>
    <table class="table tble-hover table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM `info`";
        $results = mysqli_query($conn,$query);
        if(!$results){
            die("query faild".mysqli_error($conn));
        }
        else{
            while($row = mysqli_fetch_assoc($results)){
           ?>
           <tr>
            <td><?php echo $row["Id"];?></td>
            <td><?php echo $row["name"];?></td>
            <td><?php echo $row["age"];?></td>
            <td><a href="Update_page.php?Id=<?php echo $row["Id"];?>" class="btn btn-success">Update</a></td>
            <td><a href="Delete_page.php?Id=<?php echo $row["Id"];?>" class="btn btn-danger">Delete</a></td>
        </tr>
        <?php
        }
    }
        ?>

    </tbody>
   </table>

   <?php
   if(isset($_GET["message"])){
    echo"<h6>".$_GET["message"]."</h6>";
   }
   ?>
   <?php
   if(isset($_GET["insert_msg"])){
    echo"<h5>".$_GET["insert_msg"]."</h5>";
   }
   ?>
   <?php
   if(isset($_GET["update_msg"])){
    echo"<h5>".$_GET["update_msg"]."</h5>";
   }
   ?>
   <?php
   if(isset($_GET["delete_msg"])){
    echo"<h5>".$_GET["delete_msg"]."</h5>";
   }
   ?>
 <!-- Modal -->
  <form action="insert_data.php" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Students</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control">
          </div>
          <div class="form-group">
            <label for="age">Age</label>
            <input type="text" name="age" class="form-control">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="add_students" value="Submit">
      </div>
    </div>
  </div>
</div>
</form>
   <?php include("Foter.php");?>