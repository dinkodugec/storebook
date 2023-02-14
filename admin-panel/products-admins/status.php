<?php require "../layouts/header.php" ; ?>
<?php require "../../config/config.php" ; ?>

<?php 

      $id = $_GET['id'];
      $status= $_GET['status'];

    if(isset($_GET['id']) AND isset($_GET['status'])){
    

       if($status >0){
          $update = $conn->prepare("UPDATE products SET status = 0 WHERE id='$id'");
          $update->execute();
          header("Location: ".ADMINURL."/products-admins/show-products.php");
       } else {
        $update = $conn->prepare("UPDATE products SET status = 1 WHERE id='$id'");
          $update->execute();
          header("Location: ".ADMINURL."/products-admins/show-products.php");
       }
    }


?>