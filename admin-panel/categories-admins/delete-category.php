<?php require "../layouts/header.php" ; ?>
<?php require "../../config/config.php" ; ?>

<?php

     if(isset($_GET['id'])){
      $id = $_GET['id'];

      $delete = $conn->query("DELETE FROM categories WHERE id='$id'");
      $delete->execute();

      header("Location: ".ADMINURL."/categories-admins/show-categories.php"); 
      
     echo "ya";
     } else {

          header("Location: http://store.hr:8080/404.php");
     }


?>