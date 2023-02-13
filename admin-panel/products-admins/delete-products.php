<?php require "../layouts/header.php" ; ?>
<?php require "../../config/config.php" ; ?>

<?php

     if(isset($_GET['id'])){
      $id = $_GET['id'];

      $select = $conn->query("SELECT * FROM products WHERE id='$id'");
      $select->execute();

      $images = $select->fetch(PDO::FETCH_OBJ);

      unlink("images/".$images->image."");

      $delete = $conn->query("DELETE FROM products WHERE id='$id'");
      $delete->execute();

      header("Location: ".ADMINURL."/products-admins/show-products.php"); 
      
     echo "ya";
     } else {

          header("Location: http://store.hr:8080/404.php");
     }


?>