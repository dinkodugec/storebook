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

      $images = $select->fetch(PDO::FETCH_OBJ);

      unlink("images/".$images->image."");

      $delete = $conn->query("DELETE FROM categories WHERE id='$id'");
      $delete->execute();

      header("Location: ".ADMINURL."/categories-admins/show-categories.php"); 
      
     echo "ya";
     } else {

          header("Location: http://store.hr:8080/404.php");
     }


?>