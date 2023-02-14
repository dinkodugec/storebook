<?php require "../layouts/header.php" ; ?>
<?php require "../../config/config.php" ; ?>

<?php

      if(!isset($_SESSION['adminname'])){
        header("Location: http://store.hr:8080/admins/login-admins.php");
      }

     if(isset($_GET['id'])){
      $id = $_GET['id'];

      $select = $conn->query("SELECT * FROM categories WHERE id='$id'");
      $select->execute();

      $categories = $select->fetch(PDO::FETCH_OBJ);


      if(isset($_POST['submit'])){
        if(empty($_POST['name'] OR empty($_POST['description']))){
          echo "<script>alert('One or more inputs are empty')</script>";
          
      } else {
        unlink("images/".$categories->image."");
        $name = $_POST['name'];
        $description = $_POST['description'];
        $image= $_FILES['image']['name'];

        $dir = "images/" . basename($image);

        $update = $conn->prepare("UPDATE categories SET name=:name, description=:description, name=:image WHERE id='$id'"); 
                              
        $update->execute([
          ":name" => $name,
           ":description" => $description,
           ":image" => $image
        ]);

        if(move_uploaded_file($_FILES['image']['tmp_name'], $dir)){
           header("Location: ".ADMINURL."/categories-admins/show-categories.php"); 

            
          
        }
      }
   
    }

      

     } else {

          header("Location: http://store.hr:8080/404.php");
     }


?>

<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-5 d-inline">Update Categories</h5>
        <form method="POST" action="update-category.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
          <!-- Email input -->
          <div class="form-outline mb-4 mt-4">
            <input type="text" name="name" value="<?php echo $categories->name; ?>" id="form2Example1"
              class="form-control" placeholder="name" />

          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea name="description" placeholder="description" class="form-control" id="exampleFormControlTextarea1"
              rows="3">value="<?php echo $categories->description; ?>"</textarea>
          </div>


          <div class="form-outline mb-4 mt-4">
            <label></label>
            <img src="images/<?php echo $categories->image; ?>" alt="img" />
            <input type="file" name="image" id="form2Example1" class="form-control" placeholder="image" />
          </div>


          <!-- Submit button -->
          <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">update</button>


        </form>

      </div>
    </div>
  </div>
</div>
</div>

<?php require "../layouts/footer.php" ; ?>